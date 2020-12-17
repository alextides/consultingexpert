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
      $data['step4_files'] = $this->get_step4_files();
      $data['get_step1_details_status'] = $this->get_step1_details_status();
      $data['get_step2_details_status'] = $this->get_step2_details_status();
      $data['get_step3_details_status'] = $this->get_step3_details_status();
      $data['get_step4_details_status'] = $this->get_step4_details_status();
      $this->load_page2('mydddapplicationform', $data, 'ul_footer.php', 'ul_header.php');
   }

   public function create_ddd_form()
   {
      $post = $this->input->post();
         $create_steps = array(
            'fk_user_id' => $post["fk_user_id"],
            'date_added' => date("Y-m-d H:i:s"),
            'status'     => 1
         );
         $res = $this->MY_Model->insert("ci_ddd_application", $create_steps);
      $this->session->set_userdata('swal', 'DDD Application Form Added Successfully.');
      redirect(base_url("mydddapplicationform"));
   }

   public function submit_step1($step1_id='')
   {
      // $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      // // $post = $this->input->post();
      // $select_services = $_POST['services'];
      // for ($i = 0; $i < count($select_services); $i++) {
      //    $this->db
      //       ->set('services', $select_services[$i])
      //       ->set('website', $_POST['user_website'])
      //       ->set('agency', $_POST['user_agency'])
      //       ->set('date_added', date("Y-m-d H:i:s"))
      //       ->set('step1_status', 1)
      //       ->where('fk_user_id', $fk_user_id)
      //       ->where('step1_id', $_POST['user_step1_id'])
      //       ->update('ci_formlist_step1');
      //    $this->session->set_userdata('swal', 'Step 1 Form Submitted Successfully.');
      //    redirect('mydddapplicationform');
      // }

      // $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      // $this->db->
      // set('website', $_POST['user_website'])->
      // set('agency', $_POST['user_agency'])->
      // where('step1_id', $_POST['user_step1_id'])->
      // where('fk_user_id', $fk_user_id)->
      // update('ci_formlist_step1');
      // // $uid = $this->db->insert_id();

      // $this->session->set_userdata('swal', 'Step 1 Form Submitted Successfully.');
      // redirect('mydddapplicationform');

      $post = $this->input->post();
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $select_services = $_POST['services'];
      $ddd_application_id = $_POST['ddd_application_id'];
      for ($i = 0; $i < count($select_services); $i++) {
         $step1 = array(
            'fk_user_id' => $fk_user_id,
            'fk_ddd_application_id' => $post["ddd_application_id"],
            'services' => $select_services[$i],
            'website' => $post["user_website"],
            'agency' => $post["user_agency"],
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
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      // $param["where"] = array("step1_id" => 16);
      $query = $this->MY_Model->getRows("ci_formlist_step1", $param);
      return $query;
   }

   public function get_step1_details_status()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      // $param["where"] = array("step1_id" => 16);
      $query = $this->MY_Model->getRows("ci_formlist_step1", $param);
      return $query;
   }

   public function get_step2_details_status()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $param["where"] = array("payment_id" => 5);
      $query = $this->MY_Model->getRows("ci_formlist_step2", $param);
      return $query;
   }

   public function get_step3_details_status()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step3_user", $param);
      return $query;
   }

   public function get_step4_details_status()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step4_user", $param);
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
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step3_user", $param);
      return $query;
   }

   public function get_step4_files()
   {
      $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
      $param["select"] = "*";
      $param["where"] = array("fk_user_id" => $fk_user_id);
      $query = $this->MY_Model->getRows("ci_formlist_step4_user", $param);
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
      $res =  $this->MY_Model->getRows("ci_formlist_step3_user", $param);
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
               'website_logo'          => $this->upload->data('file_name'),
               'agency_tax_year1'      => $this->upload->data('file_name'),
               'agency_tax_year2'      => $this->upload->data('file_name'),
               'agency_tax_year3'      => $this->upload->data('file_name'),
               'agency_resume'         => $this->upload->data('file_name'),
               'agency_bank_statement' => $this->upload->data('file_name'),
               'fk_user_id'            => $fk_user_id,
               'date_added'            => date("Y-m-d H:i:s"),
               'step3_status'          => 1,
            );
            $res = $this->MY_Model->insert('ci_formlist_step3_user', $step3);
         }
      }
      $this->session->set_userdata('swal', 'Step 3 Form Submitted Successfully!');
      redirect(base_url("mydddapplicationform"));
   }

   public function submit_step4()
   {
      $post = $this->input->post();
      $param = array(
         'select' => '*',
         'where' => array(
            'fingerprint_card'      => $_FILES['fingerprint_card']['name'],
            'criminal_disclosure'   => $_FILES['criminal_disclosure']['name'],
            'reference1'            => $_FILES['reference1']['name'],
            'reference2'            => $_FILES['reference2']['name'],
            'reference3'            => $_FILES['reference3']['name'],
         ),
      );
      $res =  $this->MY_Model->getRows("ci_formlist_step4_user", $param);
      if (!empty($res)) {
         $resmsg = array("err" => true, "msg" => "This file is already uploaded!");
         $this->session->set_flashdata('res_err', $resmsg);
      } else {
         $config['upload_path'] = './assets/uploads/';
         $config['allowed_types'] = 'gif|jpg|png|pdf|txt|docx|doc';
         $this->load->library('upload', $config);
         if (!$this->upload->do_upload('fingerprint_card', 'criminal_disclosure', 'reference1', 'reference2', 'reference3')) {
            $resmsg = array("err" => true, "msg" => $this->upload->display_errors());
            $this->session->set_flashdata('res_err', $resmsg);
         } else {
            $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];
            $step3 = array(
               'selected_prototype'    => $post["prototype"],
               'fingerprint_card'      => $this->upload->data('file_name'),
               'criminal_disclosure'   => $this->upload->data('file_name'),
               'reference1'            => $this->upload->data('file_name'),
               'reference2'            => $this->upload->data('file_name'),
               'reference3'            => $this->upload->data('file_name'),
               'fk_user_id'            => $fk_user_id,
               'date_added'            => date("Y-m-d H:i:s"),
               'step4_status'          => 1,
            );
            $res = $this->MY_Model->insert('ci_formlist_step4_user', $step3);
         }
      }
      $this->session->set_userdata('swal', 'Step 4 Form Submitted Successfully!');
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
         ->select('*')
         ->from('ci_ddd_application')
         ->where('ci_ddd_application.fk_user_id', $fk_user_id)
         ->join('ci_formlist_step1', 'ci_formlist_step1.fk_ddd_application_id = ci_ddd_application.ddd_application_id')
         ->join('ci_formlist_step2', 'ci_formlist_step2.fk_ddd_application_id = ci_ddd_application.ddd_application_id')
         ->join('ci_formlist_step3_user', 'ci_formlist_step3_user.fk_ddd_application_id = ci_ddd_application.ddd_application_id')
         // ->join('ci_formlist_step3_admin', 'ci_formlist_step3_admin.fk_stepform_id = ci_formlist.stepform_id')
         ->join('ci_userdata', 'ci_userdata.fk_user_id = ci_ddd_application.fk_user_id')
         ->get();


      $data = array();

      foreach ($files->result() as $r) {
         $action_btn = false;
         $action_btn .= "<a style='background-color: #1d95e9; border-color: #1d95e9' class='btn btn-info btn-xs step1' data-id=" . $r->ddd_application_id . " href='javascript:void(0)'>Step 1 <i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1065a2; border-color: #1065a2' class='btn btn-info btn-xs step1_details_btn' data-id=" . $r->step1_id . " href='javascript:void(0)'>Step 1 Details <i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1d95e9; border-color: #1d95e9' class='btn btn-info btn-xs step2' data-id=" . $r->step1_id . " href='javascript:void(0)'>Step 2<i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1065a2; border-color: #1065a2' class='btn btn-info btn-xs step2_details_btn' data-id=" . $r->payment_id . " href='javascript:void(0)'>Step 2 Details <i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1d95e9; border-color: #1d95e9' class='btn btn-info btn-xs step3' data-id=" . $r->payment_id . " href='javascript:void(0)'>Step 3 <i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1065a2; border-color: #1065a2' class='btn btn-info btn-xs step3_details_btn' data-id=" . $r->step3_id . " href='javascript:void(0)'>Step 3 Details <i class='fa fa-arrow-right'></i></a>";
         $action_btn .= "<a style='background-color: #1d95e9; border-color: #1d95e9' class='btn btn-info btn-xs step3' data-id=" . $r->step3_id . " href='javascript:void(0)'>Step 4 <i class='fa fa-arrow-right'></i></a>";
         // $action_btn .= "<a style='background-color: #1065a2; border-color: #1065a2' class='btn btn-success btn-xs step2' data-id=" . $r->step1_id . " href='javascript:void(0)'>Step 2 $r->step1_id<i class='fa fa-arrow-right'></i></a>";
         // $action_btn .= "<a style='background-color: #1d95e9; border-color: #1d95e9' class='btn btn-primary btn-xs step3' data-id=" . $r->step3_id . " href='javascript:void(0)'>Step 3 $r->step3_id<i class='fa fa-arrow-right'></i></a>";
         // $action_btn .= "<a style='background-color: #1065a2; border-color: #1065a2' class='btn btn-success btn-xs step4' data-id=" . $r->step4_id . " href='javascript:void(0)'>Step 4 $r->step4_id<i class='fa fa-arrow-right'></i></a>";
         
         // if ($r->step1_status == '1') {
         //    $status = "Processing";
         // } else {
         //    $status = "Completed";
         // }
         $data[] = array( //display data from database on Manage Files datatable
            $r->first_name .''. " " .''. $r->last_name,
            $r->date_added,
            $r->status,
            // $status,
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

   // public function get_step1details($id='')
   // {
   //    $draw = intval($this->input->post("draw"));
   //    $start = intval($this->input->post("start"));
   //    $length = intval($this->input->post("length"));
   //    $order = $this->input->post("order");
   //    $search = $this->input->post("search");
   //    $search = $search['value'];

   //    $col = 0;
   //    $dir = "";
   //    if (!empty($order)) {
   //       foreach ($order as $o) {
   //          $col = $o['column'];
   //          $dir = $o['dir'];
   //       }
   //    }

   //    if ($dir != "asc" && $dir != "desc") {
   //       $dir = "desc";
   //    }

   //    $valid_columns = array(
   //       1 => 'services',
   //       2 => 'website',
   //       3 => 'agency',
   //    );

   //    if (!isset($valid_columns[$col])) {
   //       $order = null;
   //    } else {
   //       $order = $valid_columns[$col];
   //    }
   //    if ($order != null) {
   //       $this->db->order_by($order, $dir);
   //    }

   //    $x = 0;
   //    if (!empty($search)) {
   //       $this->db->group_start();
   //       foreach ($valid_columns as $sterm) {
   //          if ($x == 0) {
   //             $this->db->like($sterm, $search);
   //          } else {
   //             $this->db->or_like($sterm, $search);
   //          }
   //          $x++;
   //       }
   //       $this->db->group_end();
   //    }

   //    $fk_user_id = $this->session->userdata('user_details')[0]['fk_user_id'];

   //    $step1details = $this->db
   //       ->select('*')
   //       ->from('ci_formlist_step1')
   //       ->where('step1_status', '1')
   //       ->where('fk_user_id', $fk_user_id)
   //       // ->where('step1_id', $id)
   //       ->get();


   //    $data = array();

   //    foreach ($step1details->result() as $r) {
   //       $action_btn = false;

   //       $data[] = array( //display data from database on Manage Files datatable
   //          $r->services,
   //          $r->website,
   //          $r->agency,
   //          $action_btn
   //       );
   //    }

   //    $output = array(
   //       "draw" => $draw,
   //       "recordsTotal" => $step1details->num_rows(),
   //       "recordsFiltered" => $step1details->num_rows(),
   //       "data" => $data
   //    );
   //    echo json_encode($output);
   //    exit();
   // }

   public function get_ddd_application($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_ddd_application')
         ->where('ddd_application_id', $id)
         ->get()
         ->result_array();
      echo json_encode($result);
      // echo '<pre>';
      // print_r($result);
      //  exit;
      exit();
   }

   public function get_step1_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step1')
         ->where('step1_id', $id)
         ->get()
         ->result_array();
      echo json_encode($result);
      // echo '<pre>';
      // print_r($result);
      //  exit;
      exit();
   }

   public function get_step2_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step2')
         // ->join('ci_formlist_step2', 'ci_formlist_step2.fk_user_id = ci_formlist_step1.fk_user_id')
         ->where('payment_id', $id)
         ->get()
         ->result_array();
      echo json_encode($result);
      // echo '<pre>';
      // print_r($result);
      //  exit;
      exit();
   }

   // public function get_step2_payment_details($id='') // get step1 details query
   // {
   //    $result = $this->db
   //       ->select('ci_formlist_step1.*, ci_formlist_step2.*')
   //       ->from('ci_formlist_step2')
   //       ->join('ci_formlist_step1', 'ci_formlist_step1.fk_user_id = ci_formlist_step2.fk_user_id')
   //       ->where('payment_id', $id)
   //       ->get()
   //       ->result_array();
   //    echo json_encode($result);
   //    exit();
   // }

   public function get_step3_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step3_user')
         ->where('step3_id', $id)
         ->get()
         ->result_array();
      echo json_encode($result);
      exit();
   }

   public function get_step4_details($id = '') // get step1 details query
   {
      $result = $this->db
         ->select('*')
         ->from('ci_formlist_step4_user')
         ->where('step4_id', $id)
         ->get()
         ->result_array();
      echo json_encode($result);
      exit();
   }
}
