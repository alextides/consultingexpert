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

			$res = $this->db->
			select('*')->
			from('ci_users')->
			where('username', $username)->
			where('password', $password)->
			join('ci_userdata', 'ci_userdata.fk_user_id = ci_users.user_id')->
			get()->result_array();

			if($res){
				$this->session->set_userdata('user_details', $res);
				redirect(base_url("dashboard"));
			}else{
					$this->session->set_flashdata('log_err','Incorrect Username or Password!');
					redirect(base_url("login"));
			}
		}
	}
}
?>
