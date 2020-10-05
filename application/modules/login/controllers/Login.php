<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data["title"] = "Login Account";
		$this->load_login_page("index", $data);
	}

	public function login_account(){
		$post = $this->input->post();
		if(!empty($post)){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$params["select"] ="*";
			$params["where"] = array("username" => $username, "password" => $password);
			$params["join"] = array("cons_user_details" => "cons_users.user_id = cons_user_details.user_id");
			$res = $this->MY_Model->getRows("cons_users", $params);			
			if($res){		
				$userdata = array(
					"user_id" => $res[0]["user_id"],
					"first_name" => $res[0]["first_name"],
					"last_name" => $res[0]["last_name"],
					"username" => $res[0]["username"],
					"gender" => $res[0]["gender"],
					"user_type" => $res[0]["user_type"],
					"user_status" => $res[0]["user_status"],
					"password" => $res[0]["password"],
					"email_address" => $res[0]["email_address"],
					"address" => $res[0]["address"],
					"user_id" => $res[0]["user_id"],
					"logged_in" => 1
				);
				$set = array("logged_in" => 1);
				$where = array("user_id" => $res[0]["user_id"]);
				if($this->MY_Model->update("cons_users", $set, $where)){
					$this->session->set_userdata($userdata);
					redirect(base_url(""));
				}
			}else{
					$this->session->set_flashdata('log_err','Incorrect Username or Password!');
					redirect(base_url("login"));
			}
		}
	}
}
?>
