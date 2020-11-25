<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manageorderawebsite extends MY_Controller
{


   public function index()
   {
      $data['title'] = 'Manage Subscription';
      $data['users'] = $this->getusers();
      $this->load_page2('manageorderawebsite', $data, 'moaw_footer.php', 'moaw_header.php');
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

   public function getorderawebsite()
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
         1 => 'fk_user_id',
         2 => 'transaction_id',
         3 => 'paid_amount',
         4 => 'date_paid',
         5 => 'company_name', 
         6 => 'website_link', 
         7 => 'company_info',
         8 => 'orderawebsite_status',
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

      $oaw = $this->db
         ->select('*')
         ->from('ci_orderawebsite')
         ->where('orderawebsite_status', '1')
         // ->where('delete_status', '0')
         ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_orderawebsite.fk_user_id')
         ->get();

      $data = array();

      foreach ($oaw->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a class='btn btn-success btn-xs edit_file' data-id=" . $r->orderawebsite_id . " href='javascript:void(0)'>View Details</a>";
         // $action_btn .= "<a class='btn btn-danger btn-xs delete_file' href='" . base_url('managefiles/delete_file/' . $r->orderawebsite_id) . "'>Delete</a>";

         $data[] = array( //display data from database on Manage Files datatable
            $r->fk_user_id,
            $r->transaction_id,
            $r->paid_amount, 
            // $r->payment_for,
            $r->date_paid, 
            $r->company_name, 
            "<a class='btn btn-danger btn-xs' href='$r->website_link' target='_blank'>$r->website_link</a>",
            $r->company_info,
            $r->orderawebsite_status,
            $action_btn
         );
      }

      $output = array(
         "draw" => $draw,
         "recordsTotal" => $oaw->num_rows(),
         "recordsFiltered" => $oaw->num_rows(),
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
