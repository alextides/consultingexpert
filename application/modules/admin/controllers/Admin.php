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
		// $data['files'] = $this->getfiles();
		$this->load_page('managefiles', $data, 'mf_footer.php', 'mf_header.php');
	}

	public function getfiles() {
		// Datatables Variables
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];

		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}

		$valid_columns = array(
			1=> 'file_name',
			2=> 'date_uploaded',
			3=> 'first_name',
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null
		) {
			$this->db->order_by($order, $dir);
		}

		$x = 0;
		if (!empty($search)) {
			$this->db->group_start();
			foreach ($valid_columns as $sterm) {
				if ($x == 0) {
					$this->db->like($sterm, $search);
				} else {
					$this->db->or_like($sterm, $search);
				}
				$x++;
			}
			$this->db->group_end();
		}

		$files = $this->db->
            select('*')->
            from('ci_filelist')->
            where('file_status', '1')->
            join('ci_userdata', 'ci_userdata.userdata_id = ci_filelist.fk_user_id')->
			get();

		$data = array();

		foreach ($files->result() as $r) {
			$action_btn = 1;
			$action_btn .= "<a class='btn btn-success btn-xs edit_user' data-id=" . $r->file_id . " href='javascript:void(0)'>Edit</a>";
			$action_btn .= "<a class='btn btn-danger btn-xs delete_user' href='" . base_url('admin/delete_file/' . $r->file_id) . "'>Delete</a>";

			$data[] = array(
				$r->file_name,
				$r->date_uploaded,
				$r->first_name,
				$action_btn
			);
			}

			$output = array(
				"draw" => $draw,
				"recordsTotal" => $files->num_rows(),
				"recordsFiltered" => $files->num_rows(),
				"data" => $data
			);
			echo json_encode($output);
			exit();
		}


		// $param["select"] = "file_name, date_uploaded, file_id, ci_userdata.first_name";
		// $param["where"] = array("file_status" => 1);
		// $param["join"] = array("ci_userdata" => "ci_userdata.userdata_id = ci_filelist.fk_user_id");
		// $res =  $this->MY_Model->getRows("ci_filelist", $param);
		// return $res;
	

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
