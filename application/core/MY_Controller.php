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
}
