<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydddapplicationform extends MY_Controller
{


   public function index()
   {
      // $data['technicianlist'] = 1;
      $data['title'] = 'Manage Files';
      $data['quote'] = $this->getquote();
      $data['paid_invoice'] = $this->get_paid_invoice();
      $data['step3_files'] = $this->get_step3_files();
      $this->load_page2('mydddapplicationform', $data, 'ul_footer.php', 'ul_header.php');
   }

   public function submit_step1()
   {
      $post = $this->input->post();
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $select_services = $_POST['services'];
      for ($i = 0; $i < count($select_services); $i++) {
         $step1 = array(
            'fk_user_id' => $fk_user_id,
            'services' => $select_services[$i],
            'website' => $post["website"],
            'agency' => $post["agency"],
            'date_added' => date("Y-m-d H:i:s"),
            'step1_status' => 1,
         );
         $res = $this->MY_Model->insert('ci_formlist_step1', $step1);
         if ($res) {
            $this->session->set_userdata('swal', 'Step 1 Successfully Submitted.');
         }
      }

      redirect(base_url("mydddapplicationform"));
   }

   public function getquote()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "website_quote, agency_quote, agency_invoice, website_invoice";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      // $param["where"] = array("step1_status" => 1);
      $query = $this->MY_Model->getRows("ci_formlist_step1", $param);
      // echo '<pre>';
      // print_r($query);
      //  exit;
      return $query;
   }

   public function get_paid_invoice()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "upload_paid_invoice";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step2", $param);
      return $query;
   }

   public function get_step3_files()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "website_questionnaire, website_logo, agency_tax_year1, agency_tax_year2, agency_tax_year3, agency_resume, agency_bank_statement ";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step3", $param);
      return $query;
   }

   public function step1_details($id = '')
   {
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

   public function submit_step3()
   {
      $post = $this->input->post();
      $param = array(
         'select' => '*',
         'where' => array(
            'website_questionnaire' => $_FILES['website_questionnaire']['name'],
            'website_logo'          => $_FILES['website_logo']['name'],
            'agency_tax_year1'      => $_FILES['agency_tax_year1']['name'],
            'agency_tax_year2'      => $_FILES['agency_tax_year2']['name'],
            'agency_tax_year3'      => $_FILES['agency_tax_year3']['name'],
            'agency_resume'         => $_FILES['agency_resume']['name'],
            'agency_bank_statement' => $_FILES['agency_bank_statement']['name']
         ),
      );
      $res =  $this->MY_Model->getRows("ci_formlist_step3", $param);
      if (!empty($res)) {
         $resmsg = array("err" => true, "msg" => "This file is already uploaded!");
         $this->session->set_flashdata('res_err', $resmsg);
      } else {
         $config['upload_path'] = './assets/uploads/';
         $config['allowed_types'] = 'gif|jpg|png|pdf|txt|docx|doc';
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload('website_questionnaire', 'website_logo', 'agency_tax_year1', 'agency_tax_year2', 'agency_tax_year3', 'agency_resume', 'agency_bank_statement')) {
            $resmsg = array("err" => true, "msg" => $this->upload->display_errors());
            $this->session->set_flashdata('res_err', $resmsg);
         } else {
            $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
            $step3 = array(
               'agency_first_name1'    => $post["agency_first_name1"],
               'agency_last_name1'     => $post["agency_last_name1"],
               'agency_first_name2'    => $post["agency_first_name2"],
               'agency_last_name2'     => $post["agency_last_name2"],
               'agency_name1'          => $post["agency_name1"],
               'agency_name2'          => $post["agency_name2"],
               'agency_name3'          => $post["agency_name3"],
               'agency_address1'       => $post["agency_address1"],
               'agency_address2'       => $post["agency_address2"],
               'agency_city'           => $post["agency_city"],
               'agency_state'          => $post["agency_state"],
               'agency_zip'            => $post["agency_zip"],
               'website_questionnaire' => $this->upload->data('file_name'),
               'website_logo'          => $this->upload->data('website_logo'),
               'agency_tax_year1'      => $this->upload->data('file_name2'),
               'agency_tax_year2'      => $this->upload->data('file_name3'),
               'agency_tax_year3'      => $this->upload->data('file_name4'),
               'agency_resume'         => $this->upload->data('file_name5'),
               'agency_bank_statement' => $this->upload->data('file_name6'),
               'fk_user_id'            => $fk_user_id,
               'date_added'            => date("Y-m-d H:i:s"),
               'step3_status'          => 1,
            );
            $res = $this->MY_Model->insert('ci_formlist_step3', $step3);
            if ($res) {
               $this->errmsg = "";
               $resmsg = array("err" => false, "msg" => "Uploaded Successfully!");
               $this->session->set_flashdata('res_err', $resmsg);
            }
         }
      }
      redirect(base_url("mydddapplicationform"));
   }
   
   public function get_dddapplication()
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

      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];

      $files = $this->db
         ->select('ci_formlist_step1.*, ci_formlist_step2.*, ci_formlist_step3.*')
         ->from('ci_formlist_step1')
         ->where('step1_status', '1')
         ->where('ci_formlist_step1.fk_user_id', $fk_user_id)
         ->join('ci_formlist_step2', 'ci_formlist_step2.fk_user_id = ci_formlist_step1.fk_user_id')
         ->join('ci_formlist_step3', 'ci_formlist_step3.fk_user_id = ci_formlist_step1.fk_user_id')
         // ->join('ci_formlist_step4', 'ci_formlist_step4.fk_user_id = ci_formlist_step1.fk_user_id')
         ->get();

      $data = array();

      foreach ($files->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a class='btn btn-info btn-xs step1_details' data-id=" . $r->step1_id . " href='javascript:void(0)'>Step 1 Details</a>";
         $action_btn .= "<a class='btn btn-warning btn-xs step2_details' data-id=" . $r->payment_id . " href='javascript:void(0)'>Step 2 Details</a>";
         $action_btn .= "<a class='btn btn-info btn-xs step3_details' data-id=" . $r->step3_id . " href='javascript:void(0)'>Step 3 Details</a>";
         // $action_btn .= "<a class='btn btn-info btn-xs step4_details' data-id=" . $r->step1_id . " href='javascript:void(0)'>Step 4 Details</a>";
         // $action_btn .= "<a class='btn btn-info btn-xs delete_file' href='" . base_url('managefiles/delete_file/' . $r->step1_id) . "'>Delete</a>";

         $data[] = array( //display data from database on Manage Files datatable
            $r->fk_user_id,
            $r->date_added,
            $r->step1_status,
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

   public function get_step1_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step1')
         ->where('step1_id', $id)
         // ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_formlist_step1.fk_user_id')
         ->get()
         ->result_array();
      echo json_encode($result);
      exit();
   }

   public function get_step2_details($id='') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step2')
         ->where('payment_id', $id)
         // ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_formlist_step1.fk_user_id')
         ->get()
         ->result_array();
      echo json_encode($result);
      exit();
   }

   public function get_step3_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step3')
         ->where('step3_id', $id)
         // ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_formlist_step1.fk_user_id')
         ->get()
         ->result_array();
      echo json_encode($result);
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
