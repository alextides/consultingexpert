<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// $parameters['select'] = 'fullname,username';
		// $parameters['search_like'] = 'da';
		// $parameters['column_order'] = array('fullname','username');
		// $data = getrow('tbl_users',$parameters,'array',true);
		// json($data,false);
		$data["title"] ="User";
		$data["pagename"] ="User";
		$this->load_user_page("index", $data, "footer_index");
	}
		public function profile(){
		$data["title"] = "User Profile";
		$data["pagename"] = "Profile";
		$data['user_info'] = $this->get_user_info();
		$this->load_page("profile", $data, "footer_profile");
	}
	public function get_user_info() {
		$param["select"] = "ci_userdata.first_name, ci_userdata.last_name, ci_users.username, ci_users.password, ci_users.email, ci_userdata.city, ci_userdata.state, ci_userdata.contact_number, ci_userdata.zip_code, ci_userdata.gender";
		$userdata["where"] = array("user_id" => $this->session->userdata('user_id'));
		$param["join"] = array("ci_userdata" => "ci_userdata.fk_user_id = ci_users.user_id");
		$res =  $this->MY_Model->getRows("ci_users", $param);
		return $res;
	}
	public function update_profile(){
	$post = $this->input->post();

		if ($this->validated_user2($post, "update")) {
			if (!empty($post)) {
				$set = array(
					'username' => $post["username"],
					'password' => $post["password"],
					"email" => $post["email"]
				);
				$where = array("user_id" => $post["user_id"]);
				$res = $this->MY_Model->update("ci_users", $set, $where);
				if ($res) {
					$set = array(
						'first_name' => $post["first_name"],
						'last_name' => $post["last_name"],
						"city" => $post["city"],
						"state" => $post["state"],
						"phone" => $post["phone"],
						"zip_code" => $post["zip_code"],
						"gender" => $post["gender"]
					);
					$res = $this->MY_Model->update("ci_userdata", $set, $where);
					if ($res) {
						$this->errmsg = "";
						$resmsg = array("err" => false, "msg" => "Updated Successfully!");
						$this->session->set_flashdata('res_err', $resmsg);

						if (!empty($post["is_admin"])) {
							$userdata = array(
								"user_id" => $post["user_id"],
								"username" => $post["username"],
								"first_name" => $post["first_name"],
								"last_name" => $post["last_name"],
								"gender" => $post["gender"],
								"user_type" => 1,
								"user_status" => 1,
								"password" => $post["password"],
								"email_address" => $post["email_address"],
								"city" => $post["city"],
								"state" => $post["state"],
								"phone" => $post["phone"],
								"zip_code" => $post["zip_code"],
								"logged_in" => 1
							);
							$this->session->set_userdata($userdata);
						}
					} else {
						$resmsg = array("err" => true, "msg" => "Updating user failed!");
						$this->session->set_flashdata('res_err', $resmsg);
					}
				}
			}
		} else {
			$resmsg = array("err" => true, "msg" => $this->errmsg);
			$this->session->set_flashdata('res_err', $resmsg);
		}
		redirect(base_url("user/profile"));
	}

	private function validated_user2($user, $opt = "")
	{
		$param["select"] = "ci_users.user_id";
		if (empty($opt)) {
			$param["where"] = array("first_name" => $user["first_name"], "last_name" => $user["last_name"]);
			$res =  $this->MY_Model->getRows("ci_users", $param);
			if ($res) {
				$this->errmsg = "This fullname is already exists!";
				return false;
			}
			$param["where"] = array("username" => $user["username"], "password" => $user["password"]);
			$param["or_where"] = array("email_address" => $user["email_address"]);
		} else {
			$param["where"] = array("username" => $user["username"], "password" => $user["password"], "ci_users.user_id !=" => $user["user_id"]);
			$res =  $this->MY_Model->getRows("ci_users", $param);
			if ($res) {
				$this->errmsg = "username and password is already exists;";
				return false;
			}
			$param["where"] = array("email_address" => $user["email_address"],  "ci_users.user_id !=" => $user["user_id"]);
		}
		$param["join"] = array("ci_userdata" => "ci_users.user_id = ci_userdata.fk_user_id");
		$res =  $this->MY_Model->getRows("ci_users", $param);
		if ($res) {
			$this->errmsg = "Email / username and password is already exists;";
			return false;
		}
		return true;
	}
}
