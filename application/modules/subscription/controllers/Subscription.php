<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscription extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$data["title"] = "Register Account";
		$this->load->view("subscription", $data);
	}

	public function ajax_payment($paypal = '')
	{
		global $required;
		if (!empty($_POST)) {
			if (!$this->validateData($_POST, $required)) {
				echo json_encode(message('danger', '<b><i class="fas fa-times-circle"></i></b> Please fill in the required fields.', null, 'has_errors'));
				exit;
			} else {
				if (($paypal == 'direct') || TEST_EMAIL) {
					$gRecaptchaResponse = $_POST['g-recaptcha-response']; //google captcha post data
					if ($gRecaptchaResponse == "") {
						echo json_encode(message('danger', '<b><i class="fas fa-times-circle"></i></b> reCAPTCHA not verified.', null, 'has_errors'));;
						exit;
					}
				}
			}

			if (!TEST_EMAIL) {
				switch ($_POST['gateway']) {
					case 'paypal':
						if ($paypal == 'direct')
							echo json_encode($this->paypaldirect());
						else
							echo json_encode($this->paypalreturn());
						break;
					case 'authorize':
						echo json_encode($this->authorizepayment());
						break;
					case 'payeezy':
						echo json_encode($this->payeezypayment());
						break;
					case 'stripe':
						if (isset($_POST['stripe_token']))
							echo json_encode($this->stripepayment());
						else
							echo json_encode($this->message('info', '<b><i class="fas fa-spinner fa-spin"></i></b> Processing Payment...', 'token'));
						break;
					case 'square':
						if (isset($_POST['square_token']))
							echo json_encode($this->squarepayment());
						else
							echo json_encode($this->message('info', '<b><i class="fas fa-spinner fa-spin"></i></b> Processing Payment...', 'token'));
						break;
					default:
						echo json_encode($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No Payment Gateway Selected.'));
						exit;
						break;
				}
			} else {
				echo json_encode(sendtestemail());
			}
			exit;
		}
	}

	public function validateData($data, $required)
	{
		array_push($required, 'Amount');
		if ($data['gateway'] == 'authorize' || $data['gateway'] == 'payeezy') {
			array_push($required, "number", "fname", "lname", "expiry", "cvc");
		}
		foreach ($data as $key => $value) {
			if (!in_array($key, $required)) continue;
			if (empty($value)) {
				return false;
			}
		}
		return true;
	}

	function sendtestemail()
	{
		$this->sendemail($_POST, 'TESTING');
		return ($this->message('success', '<b>Success:</b> Payment successful.'));
	}

	function paypaldirect()
	{
		require './payment-assets/classes/paypal.php';
		$_SESSION['formdata'] = $_POST;
		$paypal = new Paypal();
		$params = array(
			'total' 		=> $_SESSION['formdata']['Amount'],
			'currency' 		=> 'USD',
			'localecode' 	=> 'US',
			'customeremail' => $_SESSION['formdata']['Email'],
			'itemname' 		=> COMPANY_NAME . ' - ' . FORM_NAME,
			'itemamt' 		=> $_SESSION['formdata']['Amount'],
			'itemqty' 		=> 1,
			'recurring' 	=> isset($_SESSION['formdata']['Recurring']) ? $_SESSION['formdata']['Recurring'] : false,
			'recurring_freq' => isset($_SESSION['formdata']['Recurring_Frequency']) ? $_SESSION['formdata']['Recurring_Frequency'] : '',
		);

		$result = $paypal->SetExpressCheckout($params);
		if (is_array($result) and !isset($result[0])) {
			if (strtoupper($result['ACK']) == 'SUCCESS') {
				if (isset($result['TOKEN'])) {
					$resultget = $paypal->GetExpressCheckoutDetails($result['TOKEN']);
					$_SESSION['paypal_token'] = strval($resultget['TOKEN']);
					return ($this->message('primary', '<b><i class="fas fa-spinner fa-pulse"></i></b> Processing payment...', $resultget['TOKEN']));
				} else
					return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No token received from PayPal'));
			} else
				return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> ' . $result['L_LONGMESSAGE0']));
		} else {
			return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No Response from PayPal'));
		}
	}


	function paypalreturn()
	{
		require './payment-assets/classes/paypal.php';
		$paypal = new Paypal();
		$params = array(
			'total' 		=> $_SESSION['formdata']['Amount'],
			'currency' 		=> 'USD',
			'localecode'	=> 'US',
			'customeremail' => $_SESSION['formdata']['Email'],
			'itemname' 		=> COMPANY_NAME . ' - ' . FORM_NAME,
			'itemamt' 		=> $_SESSION['formdata']['Amount'],
			'itemqty' 		=> 1,
			'recurring' 	=> isset($_SESSION['formdata']['Recurring']) ? $_SESSION['formdata']['Recurring'] : false,
			'recurring_freq' => isset($_SESSION['formdata']['Recurring_Frequency']) ? $_SESSION['formdata']['Recurring_Frequency'] : '',
		);

		$result_paypal_success = $paypal->DoExpressCheckoutPayment($params, $_SESSION['paypal_token'], $_POST['payerID']);
		if (is_array($result_paypal_success) and !isset($result_paypal_success[0])) {
			if (strtoupper($result_paypal_success['ACK']) == 'SUCCESS') {
				if (isset($_SESSION['formdata']['Recurring_Frequency']) && $_SESSION['formdata']['Recurring']) {
					$result_paypal_recurr = $paypal->CreateRecurringPaymentsProfile($params, $_SESSION['paypal_token']);
					if (is_array($result_paypal_success) and !isset($result_paypal_success[0])) {
						if (strtoupper($result_paypal_success['ACK']) == 'SUCCESS') {
							$trans = $this->sendemail($_SESSION['formdata']);
							return ($this->message('success', '<b>Success:</b> Payment successful. Recurring payment is now active.', $trans));
						} else {
							unset($_SESSION['formdata']['Recurring']);
							unset($_SESSION['formdata']['Recurring_Frequency']);
							$trans = $this->sendemail($_SESSION['formdata']);
							return ($this->message('danger', '<b>Warning:</b> Payment is successful but failed to set up recurring payments. ' . $result_paypal_recurr['L_LONGMESSAGE0']));
						}
					} else {
						unset($_SESSION['formdata']['Recurring']);
						unset($_SESSION['formdata']['Recurring_Frequency']);
						$trans = $this->sendemail($_SESSION['formdata']);
						return ($this->message('danger', '<b>Warning:</b> Payment is successful but failed to set up recurring payments. No Response from PayPal.'));
					}
				} else {
					$trans = $this->sendemail($_SESSION['formdata']);
					return ($this->message('success', '<b>Success:</b> Payment successful.', $trans));
				}
			} else {
				return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> ' . $result_paypal_success['L_LONGMESSAGE0']));
			}
		} else {
			return ($this->message('danger', '<b><i class="fas fa-times-circle"></i></b> No Response from PayPal.'));
		}
	}

	function authorizepayment()
	{
		require './payment-assets/classes/authorize.php';
		$authorize = new Authorize();
		$response = $authorize->makePayment();
		if ($response[0] == 1) {
			$trans = $this->sendemail($_POST);
			return $this->message('success', '<b>Success: </b>' . $response[3], $trans);
		} else {
			return $this->message('danger', '<b>Error: </b>' . $response[3]);
		}
	}

	function payeezypayment()
	{
		require './payment-assets/classes/payeezy.php';
		$payeezy = new Payeezy();
		$response = $payeezy->makePayment();
		if ($response['status'] == 201) {
			if ($response['result']->transaction_approved == '1') {
				$trans = $this->sendemail($_POST);
				return $this->message('success', '<b>Success: </b> Transaction Successful.', $trans);
			} else {
				return $this->message('danger', '<b>Error: </b> ' . $response['result']->bank_message);
			}
		} else {
			return $this->message('danger', '<b>Error: </b> Something is wrong with your provided information, please recheck.');
		}
	}

	function stripepayment()
	{
		require './payment-assets/classes/stripe.php';
		$stripe = new Stripe();
		$response = $stripe->makePayment();
		if (isset($response)) {
			if (isset($response->error)) {
				return $this->message('danger', '<b>Error: </b> ' . $response->error->message);
			} elseif ($response->status != 'succeeded') {
				return $this->message('danger', '<b>Error: </b> ' . $response->outcome->seller_message);
			} else {
				$trans = $this->sendemail($_POST);
				return $this->message('success', '<b>Success: </b> ' . $response->outcome->seller_message, $trans);
			}
		} else {
			return $this->message('danger', '<b>Error: </b> No Response from Stripe server.');
		}
	}

	function squarepayment()
	{
		require 'payment-assets/classes/square.php';
		$square = new Square();
		$response = $square->makePayment();
		if (isset($response)) {
			if (isset($response->errors)) {
				return $this->message('danger', '<b>Error: </b> ' . $response->errors[0]->detail);
			} else {
				$trans = $this->sendemail($_POST);
				return $this->message('success', '<b>Success: </b> Transaction successful', $trans);
			}
		} else {
			return $this->message('danger', '<b>Error: </b> No Response from Square server.');
		}
	}


	function message($status, $message, $link = '', $validate = '')
	{
		return array(
			'status' 	=> $status,
			'response' 	=> $message,
			'link' 		=> $link,
			'validate' 	=> $validate
		);
	}

	function sendemail($data, $status = 'SUCCESS')
	{
		$initials = $data['First_Name'][0] . $data['Last_Name'][0];
		$trans = strtoupper(uniqid($initials));
		$date_subscribed = date('Y-m-d');
		$fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];

		$data2 = array(
			'fk_user_id'		=> $fk_user_id,
			'transaction_id'	=> $trans,
			'paid_amount' 		=> $data['Amount'],
			'payment_for' 		=> $data['Payment_For'],
			'gateway' 			=> $data['gateway'],
			'date_subscribed'   => $date_subscribed,
			'membership_status' => 1 //paid
		);
		$this->MY_Model->insert('ci_subscription', $data2);

		if ($status = 'SUCCESS') {
			$name = $data['First_Name'] . " " . $data['Last_Name'];
			$email_address = $data['Email'];
			$email_from = 'Consulting Experts LLC';
			$email_subject = 'Subscription';

			$message = '<html><head>'; //customer email notification
			$message .= '<style>
                        p {font-family: Verdana;}
                        .content_con{padding:15px;border-style: outset;}
                        </style></head><body>';
			$message .= "<table border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
							<tbody>
								<tr>
									<td style='padding: 40px 0 30px 0; color: #fff; font-family: Verdana; font-size: 30px; font-weight: bold;' align='center' bgcolor='#0b593c'>Subscription</td>
								</tr>
								<tr>
									<td class='content_con'>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'>Hi, " . $name . ".</span></span></p>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'> Thank you for subscribing Consulting Experts LLC. This is to inform you that you are now subscribed (reference#:" . $trans . "). Thank You!</span></span></p>
										<p style='padding-top:20px'><span style='color: #00000a;'><span style='font-size: small;'><span lang='en-US'>Sincerely,</span></span></span></p>
										<p><span style='color: #000000;'><span style='font-size: small;'><span lang='en-US'>Consulting Experts LLC</span></span></span></p>
									</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>";
			$message .= '</body></html>';

			$message_client = '<html><head>'; //client email notification
			$message_client .= '<style>
                        p {font-family: Verdana;}
                        .content_con{padding:15px;border-style: outset;}
                        </style></head><body>';
			$message_client .= "<table border='0' width='600' cellspacing='0' cellpadding='0' align='center'>
							<tbody>
								<tr>
									<td style='padding: 40px 0 30px 0; color: #fff; font-family: Verdana; font-size: 30px; font-weight: bold;' align='center' bgcolor='#0b593c'>New Subscription</td>
								</tr>
								<tr>
									<td class='content_con'>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'>Transaction Status: " . $status . "</span></span></p>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'>Transaction ID: " . $trans . "</span></span></p>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'>Amount: " . $data['Amount'] . "</span></span></p>
										<p><span style='font-size: small;'><span lang='en-US' style='white-space: pre-line;'>Payment For: " . $data['Payment_For'] . "</span></span></p>
									</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>";
			$message_client .= '</body></html>';
			$result = $this->sendmail($email_address, $email_from, $email_subject, $message, true);

			$client_email = "prospteam@gmail.com"; // to client
			$email_from = "Message From Your Site";
			$client_message = "
				Hi Admin, <br><br>
				You have a new email notification.
				$message_client
			";
			$this->sendmail($client_email, $email_from, $email_subject, $client_message, false);
		}
		return $trans;
	}
}
