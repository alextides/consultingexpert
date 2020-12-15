<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

	public function __construct(){
		$route = $this->router->fetch_class();
		if($route == 'login' ||  $route == 'register'){
			if(!empty($this->session->userdata('user_details'))){
				redirect(base_url("dashboard"));
			}
		}else{
			if(empty($this->session->userdata('user_details'))){
					redirect(base_url("login"));
			}
		}
	}

	public function load_page($page, $data = array(), $footer){

		$this->load->view('includes/head',$data);
		$this->load->view('includes/sidebar',$data);
      	$this->load->view($page,$data);
      $this->load->view('includes/footer',$data);

	}

	 public function load_user_page($page, $data = array(), $footer){
		$this->load->view('includes/head',$data);
		$this->load->view('includes/admin/header',$data);
		$this->load->view('includes/user/sidebar',$data);
      	$this->load->view($page,$data);
      	$this->load->view($footer,$data);

	 }

	public function load_login_page($page, $data = array()){
      	$this->load->view('includes/login_head',$data);
      	$this->load->view($page,$data);
      	$this->load->view('includes/login_footer',$data);
    }

	public function load_register_page($page, $data = array()){
      	$this->load->view('includes/login_head',$data);
      	$this->load->view($page,$data);
      	$this->load->view('includes/login_footer',$data);
    }

	 public function load_page2($page,$data = array(), $add_to_footer="",$add_to_header=""){
 		// $data['navigation'] = $this->getNavigation();

 		if (!empty($add_to_footer)) {
 			$data["add_to_footer"]=$add_to_footer;
 		}
 		if (!empty($add_to_header)) {
 			$data["add_to_header"]=$add_to_header;
 		}
 		$this->load->view('includes/head',$data);
 		$this->load->view('includes/sidebar',$data);
 		$this->load->view($page);
 		$this->load->view('includes/footer');
 	}

	public function setSwal($icon='warning',$msg=''){
		$load = array('icon' => $icon, 'content' => $msg);
		$this->session->set_flashdata('swals', $load);
	}

	public function send_notification($to_id='',$title='',$desc='',$notif_type='')
	{
		if (empty($to_id)) {
			$to_id=1;
		}
		$this->db
		->set('fk_user_id',$to_id)
		->set('title',$title)
		->set('description',$desc)
		->set('status','unread')
		->set('notif_type',$notif_type)
		->insert('ci_notiflist');
	}

	public function sendmail1($to_email='prospteam@gmail.com',$from_name='Consulting Experts LLC',$subject='Email Notification',$message='Sample Message Here',$use_html_template=true){
		$this->load->library('email');
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'secure.emailsrvr.com',
			'smtp_port' => 587,
			'smtp_user' => 'form_online020@proweaver.net',
			'smtp_pass' => 'r_KUwne2c@S_forMW@',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->to($to_email);
		$this->email->from('noreply@consultingexperts.com',$from_name);
		$this->email->subject($subject);

		if ($use_html_template) {
			$messageData['title'] =$subject;
			$messageData['content'] =$message;
			$message = $this->load->view('mail_template',$messageData,true);
			$this->email->message($message);
		}else{
			$this->email->message($message);
		}

		return $this->email->send();
   }
	//send email
	function sendmail($to_email = 'prospteam@gmail.com', $from_name = 'Consulting Experts LLC', $subject = 'Email Notification', $message = '', $use_html_template = false, $cc = "")
	{

		$config = array(
			'protocol'    => 'SMTP',
			'smtp_host'   => 'secure.emailsrvr.com',
			'smtp_port'   => 587,
			'smtp_user'   => 'onlineform6@proweaver.net',
			'smtp_pass'   => '#@pPzT1mGw@F0',
			'mailtype'    => 'html',
			'charset'     => 'iso-8859-1',
			'wordwrap'    => TRUE,
			'set_newline' => "\r\n"
		);
		$this->load->library('email');
		$this->email->initialize($config);
		if ($use_html_template) {
			$this->email->set_mailtype("html");
		}
		$this->email->set_newline("\r\n");
		$this->email->to($to_email);
		!empty($cc) ? $this->email->cc($cc) : "";
		$this->email->from('prospteam@gmail.com', $from_name);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {
			return false;
		}
	}
}
