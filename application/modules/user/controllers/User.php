<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["title"] = "User";
		$data["pagename"] = "User";
		$this->load_user_page("index", $data, "footer_index");
	}
	public function profile()
	{
		$data["title"] = "User Profile";
		$data["pagename"] = "Profile";
		$data['user_info'] = $this->get_user_info();
		$this->load_page("profile", $data, "footer_profile");
	}
	public function get_user_info()
	{
		$fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
		$post = $this->input->post();
		$param["select"] = "ci_userdata.first_name, ci_userdata.last_name, ci_users.username, ci_users.password, ci_users.email, ci_userdata.city, ci_userdata.state, ci_userdata.contact_number, ci_userdata.zip_code, ci_userdata.gender, ci_userdata.profile_picture";
		// $userdata["where"] = array("user_id" => $post["user_id"]);
		// $param["where"] = array("user_type" => 1);
		$param["where"] = array("fk_user_id" => $fk_user_id);
		$param["join"] = array("ci_userdata" => "ci_userdata.fk_user_id = ci_users.user_id");
		$res =  $this->MY_Model->getRows("ci_users", $param);
		// echo '<pre>';
		// print_r($res);
		//  exit;
		return $res;
	}

	public function update_profile()
	{
		// if ($_FILES['file_upload']['name'] != "") {
		// 	$config['upload_path'] = './assets/uploads/profile/';
		// 	$config['allowed_types'] = 'gif|jpg|png|pdf|txt|docx|doc';
		// 	$this->load->library('upload', $config);
		// 	if (!$this->upload->do_upload('file')) {
		// 		$error = array('error' => $this->upload->display_errors());
		// 	} else {
		// 		$upload_data = $this->upload->data();
		// 		$profile_picture = $upload_data['file_name'];
		// 	}
		// } else {
		// 	$profile_picture = $this->input->post('profile_picture');
		// }

		$files2 = $_FILES['profile_picture']['name'];

		$folder2 = 'assets/uploads/profile/';
		$name2 = $_FILES['profile_picture']['tmp_name'];
		$othername2 = $_FILES['profile_picture']['name'];
		move_uploaded_file($name2, $folder2.time().'_'.$othername2);

		$files2 = $_FILES['profile_picture']['name'];
		$filename2 = time().'_'.$files2;


		$fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
		$users = $this->db
			->set('email', $_POST['email'])
			->set('username', $_POST['username'])
			->set('password', $_POST['password'])
			->where('user_id', $fk_user_id)
			->update('ci_users');
		if($users){
			$fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
			$this->db
			->set('first_name', $_POST['first_name']) 
			->set('last_name', $_POST['last_name'])
			->set('contact_number', $_POST['contact_number'])
			->set('address', $_POST['address'])
			->set('profile_picture', $filename2)
			->where('fk_user_id', $fk_user_id)
			->update('ci_userdata');
		}
		$this->session->set_userdata('swal', 'Profile record has been updated.');
		redirect('user/profile');
	}
}
