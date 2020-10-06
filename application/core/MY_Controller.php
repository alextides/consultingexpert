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
		$this->load->view('includes/admin/header',$data);
		$this->load->view('includes/admin/sidebar',$data);
      	$this->load->view($page,$data);
      	$this->load->view($footer,$data);

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
}
