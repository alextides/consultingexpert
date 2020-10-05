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
}
?>
