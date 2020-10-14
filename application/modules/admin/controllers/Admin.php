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
		$data["pagename"] = "Admin";
		$this->load_page("index", $data, "admin_footer");
	}

	public function managefiles()
	{
		$data["title"] = "Admin Manage Files";
		$data["pagename"] = "Manage Files";
		$data['files'] = $this->getfiles();
		$this->load_page('managefiles', $data, 'mf_footer.php', 'mf_header.php');
	}

	public function getfiles() {
		$param["select"] = "file_name, date_uploaded, file_id, ci_userdata.first_name";
		$param["where"] = array("file_status" => 1);
		$param["join"] = array("ci_userdata" => "ci_userdata.userdata_id = ci_filelist.fk_user_id");
		$res =  $this->MY_Model->getRows("ci_filelist", $param);
		return $res;
		}

	public function upload_file() {
		$param = array(
			'select' => '*',
			'where' => array('file_name' => $_FILES['file_upload']['name']),
		);
		$res =  $this->MY_Model->getRows("ci_filelist", $param);
		if (!empty($res)) {
			$resmsg = array("err" => true, "msg" => "This file is already uploaded!");
			$this->session->set_flashdata('res_err', $resmsg);
		} else {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png|pdf|txt|docx|doc';
			// $config['max_size'] = 2000;
			// $config['max_width'] = 1500;
			// $config['max_height'] = 1500;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file_upload')) {
				$resmsg = array("err" => true, "msg" => $this->upload->display_errors());
				$this->session->set_flashdata('res_err', $resmsg);
			} else {
				$file = array(
					'file_name' => $this->upload->data('file_name'),
					'fk_user_id' => 1,
					'date_uploaded' => date("Y-m-d H:i:s"),
					'file_status' => 1,
				);
				$res = $this->MY_Model->insert('ci_filelist', $file);
				if ($res) {
					$this->errmsg = "";
					$resmsg = array("err" => false, "msg" => "Uploaded Successfully!");
					$this->session->set_flashdata('res_err', $resmsg);
				}
			}
		}
		redirect(base_url("admin/managefiles"));
	}

	public function delete_file($file_id)
	{
		$this->managefiles($file_id);
	}
}
