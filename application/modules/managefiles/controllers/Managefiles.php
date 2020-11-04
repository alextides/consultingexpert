<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managefiles extends MY_Controller
{


   public function index()
   {
      // $data['technicianlist'] = 1;
      $data['title'] = 'Manage Files';
      $data['users'] = $this->getusers();
      $this->load_page2('managefiles', $data, 'ul_footer.php', 'ul_header.php');
   }

   public function upload_file()
   {
      $post = $this->input->post();
      $param = array(
         'select' => '*',
         'where' => array('file' => $_FILES['file_upload']['name']),
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
               'file_title' => $post["add_file_title"],
               'file' => $this->upload->data('file_name'),
               'uploaded_by' => 1,
               'fk_user_id' => $post["assign_file"],
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
      redirect(base_url("managefiles"));
   }

   public function getusers()
   {
      $param["select"] = "user_id, ci_userdata.first_name, ci_userdata.last_name";
      // $userdata["where"] = array("user_id" => $this->session->userdata("user_id"));
      $param["where"] = array("user_type" => 2);
      $param["join"] = array("ci_userdata" => "ci_userdata.fk_user_id = ci_users.user_id");
      $query = $this->MY_Model->getRows("ci_users", $param);
      return $query;
   }

   public function edit_file($id = ''){
      $result = $this->db
      ->select('*')
      ->from('ci_filelist')
      ->where('file_id', $id)
      ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_filelist.fk_user_id')
      ->get()
      ->result_array();

      echo json_encode($result);
      exit();
   }

   public function update_file()
   {
      $this->db->
      set('file_title', $_POST['file_title'])->
      set('file', $_POST['update_file'])->
      where('file_id', $_POST['file_id'])->
      update('ci_filelist');
      $uid = $this->db->insert_id();

      $this->session->set_userdata('swal', 'File record has been updated.');
      redirect('managefiles');
   }

   public function getfiles()
   {
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
         1 => 'file',
         2 => 'date_uploaded',
         3 => 'first_name',
      );

      if (!isset($valid_columns[$col])) {
         $order = null;
      } else {
         $order = $valid_columns[$col];
      }
      if ($order != null) {
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

      $files = $this->db
         ->select('*')
         ->from('ci_filelist')
         ->where('file_status', '1')
         ->where('delete_status', '0')
         ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_filelist.fk_user_id')
         ->get();

      $data = array();

      foreach ($files->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a class='btn btn-success btn-xs edit_file' data-id=" . $r->file_id . " href='javascript:void(0)'>Edit</a>";
         $action_btn .= "<a class='btn btn-danger btn-xs delete_file' href='" . base_url('managefiles/delete_file/' . $r->file_id) . "'>Delete</a>";

         $data[] = array( //display data from database on Manage Files datatable
            $r->file_title,
            $r->file,
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

   public function delete_file($id = '')
   {
      $this->db
         ->set('delete_status', '1')
         ->where('file_id', $id)
         ->update('ci_filelist');
      $this->session->set_userdata('swal', 'File deleted successfully.');
      redirect('managefiles');
   }

   public function activate_user($id = '')
   {
      $res = $this->db
         ->set('activity_status', '1')
         ->where('user_id', $id)
         ->update('ci_users');

      $this->session->set_userdata('swal', 'User activated successfully.');
      redirect('userlist');
   }
   public function deactivate_user($id = '')
   {
      $res = $this->db
         ->set('activity_status', '0')
         ->where('user_id', $id)
         ->update('ci_users');

      $this->session->set_userdata('swal', 'User deactivated successfully.');
      redirect('userlist');
   }

   public function verify_username()
   {

      if (!empty($_POST['id'])) {
         $check_username = $this->db->select('*')->from('ci_users')->where('username', $_POST['username'])->where('user_id !=', $_POST['id'])->count_all_results();

         if ($check_username > 0) {
            echo "taken";
         } else {
            echo 'not_taken';
         }
         exit();
      } else {
         $check_username = $this->db->select('*')->from('ci_users')->where('username', $_POST['username'])->count_all_results();

         if ($check_username > 0) {
            echo "taken";
         } else {
            echo 'not_taken';
         }
         exit();
      }
   }

   public function verify_email()
   {
      if (!empty($_POST['id'])) {
         $check_email = $this->db->select('*')->from('ci_users')->where('email', $_POST['email'])->where('user_id !=', $_POST['id'])->count_all_results();

         if ($check_email > 0) {
            echo "taken";
         } else {
            echo 'not_taken';
         }
         exit();
      } else {

         $check_email = $this->db->select('*')->from('ci_users')->where('email', $_POST['email'])->count_all_results();

         if ($check_email > 0) {
            echo "taken";
         } else {
            echo 'not_taken';
         }
         exit();
      }
   }


   public function add_user()
   {

      $check_un = $_POST['username'];
      $check_email = $_POST['email'];

      $result_un = $this->db->select('*')->from('ci_users')->where('username', $check_un)->get()->result();

      $result_email = $this->db->select('*')->from('ci_users')->where('email', $check_email)->get()->result();

      if ($result_un) {
         $this->session->set_userdata('swal', 'Username already exists.');
         redirect('userlist');
      } else if ($result_email) {
         $this->session->set_userdata('swal', 'Email already exists.');
         redirect('userlist');
      } else {
         // $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

         $result = $this->db->set('username', $_POST['username'])->set('password', $_POST['password'])->
            // set('user_type', $_POST['user_type'])->
            set('user_type', 'technician')->set('email', $_POST['email'])->set('activity_status', '1')->
            // set('other_password', $_POST['password'])->
            set('delete_status', '0')->insert('ci_users');
         $uid = $this->db->insert_id();

         $result2 = $this->db->set('fk_user_id', $uid)->set('first_name', $_POST['fname'])->set('last_name', $_POST['lname'])->set('contact_number', $_POST['contact'])->set('address', $_POST['address'])->set('profile_picture', 'user.png')->insert('ci_userdata');

         $this->session->set_userdata('swal', 'New User has been added on the list.');
         redirect('userlist');
      }
   }
}
