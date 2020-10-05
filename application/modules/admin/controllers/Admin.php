<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	private $errmsg = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["title"] = "Admin Dashboard";
		$data["pagename"] = "dashboard";
		$this->load_page("index", $data, "admin_footer");
	}
}
