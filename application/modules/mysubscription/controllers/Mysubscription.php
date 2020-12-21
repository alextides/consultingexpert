<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mysubscription extends MY_Controller
{


   public function index()
   {
      $data['title'] = 'Manage Subscription';
      $data['users'] = $this->getusers();
      $this->load_page2('mysubscription', $data, 'ms_footer.php', 'ms_header.php');
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

      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $subs = $this->db
         ->select('*')
         ->from('ci_subscription')
         ->where('ci_subscription.fk_user_id', $fk_user_id)
         ->where('ci_subscription.membership_status', '1')
         ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_subscription.fk_user_id')
         ->get();

      $data = array();

      foreach ($subs->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a class='btn btn-success btn-xs view_subs' data-id=" . $r->membership_id . " href='javascript:void(0)'>View Details</a>";
         // $action_btn .= "<a class='btn btn-danger btn-xs delete_file' href='" . base_url('managefiles/delete_file/' . $r->membership_id) . "'>Disable</a>";

         if ($r->membership_status == 1) {
            $membership_status = "Paid";
         } else {
            $membership_status = "";
         }

         $data[] = array( //display data from database on Manage Files datatable
            $r->first_name . '' . ' ' . '' . $r->last_name,
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

   public function get_subscription($id='')
   {
      $result = $this->db->
      select('*')->
      from('ci_subscription')->
      where('membership_id', $id)->
      get()->result_array();

      echo json_encode($result);
      exit();
   }
}
