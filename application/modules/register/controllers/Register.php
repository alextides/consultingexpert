<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
    public function index(){
		$data["title"] = "Register Account";
		$this->load_register_page("register", $data);
	}

    public function register_account(){
		$post = $this->input->post();
		if($this->validated_user($post)){
			if(!empty($post)){
				$userdata = array(
					'username' =>$post["username"],
					'password' =>$post["password"],
					"email_address" => $post["email_address"],
					'user_type' =>2,
					'user_status' =>1,
					'logged_in' =>0,
				);
				$res=$this->MY_Model->insert("ci_users", $userdata);
				if($res){
					$userdata = array(
						"fk_user_id" => $res,
						'first_name' => $post["first_name"],
						'last_name' => $post["last_name"],
						"city" => $post["city"],
						"state" => $post["state"],
						"phone" => $post["phone"],
						"zip_code" => $post["zip_code"],
						"gender" => $post["gender"],
					);
					$res=$this->MY_Model->insert("ci_userdata", $userdata);
					if($res){
						$this->errmsg = "";
						$resmsg=array("err"=>false, "msg"=>"Added Successfully!");
						$this->session->set_flashdata('res_err',$resmsg);
					}
				}
			}
		}else{
			$resmsg=array("err"=>true, "msg"=>$this->errmsg);
			$this->session->set_flashdata('res_err',$resmsg);
		}
		redirect(base_url("register"));
    }

	private function validated_user($user, $opt = ""){
		$param["select"]="ci_userdata.userdata_id";
		if(empty($opt)){
			$param["where"]=array( "first_name"=> $user["first_name"], "last_name"=> $user["last_name"] );
			$res =  $this->MY_Model->getRows("ci_users", $param);
			if($res){
				$this->errmsg = "This fullname is already exists!";
				return false;
			}
			$param["where"]=array( "username"=> $user["username"], "password"=> $user["password"] );
			$param["or_where"]=array( "email_address"=> $user["email_address"] );
		}else{
			$param["where"]=array( "username"=> $user["username"], "password"=> $user["password"], "ci_users.user_id !="=> $user["user_id"] );
			$res =  $this->MY_Model->getRows("ci_users", $param);
			if($res){
				$this->errmsg = "username and password is already exists;";
				return false;
			}
			$param["where"]=array("email_address"=> $user["email_address"],  "ci_users.user_id !="=> $user["user_id"] );

		}
		$param["join"]=array("ci_userdata"=> "ci_users.user_id = ci_userdata.fk_user_id");
		$res =  $this->MY_Model->getRows("ci_users", $param);
		if($res){
			$this->errmsg = "Email / username and password is already exists;";
			return false;
		}
		return true;
	}
}
