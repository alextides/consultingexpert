<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Managesubscription extends MY_Controller
{


   public function index()
   {
      $data['title'] = 'Manage Subscription';
      $data['users'] = $this->getusers();
      $this->load_page2('managesubscription', $data, 'ms_footer.php', 'ms_header.php');
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

   public function getsubscription()
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
         4 => 'date_subscribed',
         5 => 'membership_status',
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

      $subs = $this->db
         ->select('*')
         ->from('ci_subscription')
         // ->where('membership_status', '1')
         // ->where('delete_status', '0')
         ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_subscription.fk_user_id')
         ->get();

      $data = array();

      foreach ($subs->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a class='btn btn-success btn-xs' data-id=" . $r->membership_id . " href='".base_url('managesubscription/enable_subs/'.$r->membership_id) . "'>Enable</a>";
         $action_btn .= "<a class='btn btn-danger btn-xs' data-id=" . $r->membership_id . " href='".base_url('managesubscription/disable_subs/'.$r->membership_id) . "'>Disable</a>";

         if($r->membership_status == 1){
            $membership_status = "Paid";
         }elseif($r->membership_status == 2){
            $membership_status = "Enabled";
         }elseif($r->membership_status == 3) {
            $membership_status = "Disabled";
         }else{
            $membership_status = "";
         }

         $data[] = array( //display data from database on Manage Files datatable
            $r->first_name.''. ' ' .''.$r->last_name,
            $r->transaction_id,
            // $r->transaction_id,
            $r->paid_amount,
            $r->date_subscribed,
            $membership_status,
            $action_btn
         );
      }

      $output = array(
         "draw" => $draw,
         "recordsTotal" => $subs->num_rows(),
         "recordsFiltered" => $subs->num_rows(),
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

   public function enable_subs($id = '') {
      $res = $this->db
         ->set('membership_status', '2')
         ->where('membership_id', $id)
         ->update('ci_subscription');
      $this->session->set_userdata('swal', 'Subscription enabled successfully.');
      redirect('managesubscription');
   }

   public function disable_subs($id = '') {
      $res = $this->db
         ->set('membership_status', '3')
         ->where('membership_id', $id)
         ->update('ci_subscription');

      $this->session->set_userdata('swal', 'Subscription disabled successfully.');
      redirect('managesubscription');
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
