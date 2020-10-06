<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	private $errmsg = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		// echo "<pre>";print_r($this->session->userdata());exit;
		$data["title"] = "Dashboard | Consulting Experts LLC";
		$data["pagename"] = "Dashboard";
		$this->load_page("index", $data, "i_footer.php");
	}
}
