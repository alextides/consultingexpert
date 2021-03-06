<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formlist extends MY_Controller {


   public function index(){

      // echo "<pre>"; print_r($this->session->userdata('user_details')[0]['user_type']); exit;

         $data['formlist'] = 1;
         $data['title'] = 'DDD Application Form List';

         // echo "<pre>";
         // print_r($result);
         // exit;


         $this->load_page2('index',$data,'fl_footer.php','fl_header.php');
      	// $this->load_page('index', $data);
   }

	public function view_forms()
	{
      // Datatables Variables
         $draw = intval($this->input->post("draw"));
         $start = intval($this->input->post("start"));
         $length = intval($this->input->post("length"));
         $order = $this->input->post("order");
         $search = $this->input->post("search");
   		$search = $search['value'];

         $col = 0;
         $dir = "";
         if(!empty($order))
         {
            foreach($order as $o)
            {
               $col = $o['column'];
               $dir= $o['dir'];
            }
         }

         if($dir != "asc" && $dir != "desc")
         {
               $dir = "desc";
         }

         $valid_columns = array(
   			1=>'first_name',
   			2=>'last_name',
   			3=>'date_added',
   			4=>'status',
   		);

         if(!isset($valid_columns[$col]))
         {
            $order = null;
         }
         else
         {
            $order = $valid_columns[$col];
         }
         if($order !=null)
         {
            $this->db->order_by($order, $dir);
         }

   		$x=0;
   		if(!empty($search))
   		{
   			$this->db->group_start();
   			foreach($valid_columns as $sterm)
   			{
   				if($x==0)
   				{
   					$this->db->like($sterm,$search);
   				}
   				else
   				{
   					$this->db->or_like($sterm,$search);
   				}
   				$x++;
   			}
   			$this->db->group_end();
   		}

            $users = $this->db->
            select('*')->
            from('ci_formlist')->
            where('delete_status', '0')->
            where('user_type !=', '1')->
            join('ci_userdata', 'ci_userdata.fk_user_id = ci_formlist.fk_user_id')->
            join('ci_users', 'ci_users.user_id = ci_formlist.fk_user_id')->
            join('ci_ddd_application', 'ci_ddd_application.ddd_application_id = ci_formlist.fk_dddform_id')->
            get();
         // }

          $data = array();

          foreach($users->result() as $r) {
            // if($this->session->userdata('type') != 'admin'){
                // if ($r->activity_status == "1") {
      				//    $action_btn = "<a class='btn btn-warning btn-xs status_user' href='".base_url('formlist/deactivate_user/'.$r->user_id)."'>Deactivate</a>";
           			// }else{
           			// 	$action_btn = "<a class='btn btn-primary btn-xs status_user' href='".base_url('formlistactivate_user/'.$r->user_id)."'>Activate</a>";
           			// }
           			// $action_btn .= "<a class='btn btn-success btn-xs edit_user' data-id=".$r->user_id." href='javascript:void(0)'>Edit</a>";
           			// $action_btn .= "<a class='btn btn-danger btn-xs delete_user' href='".base_url('formlistdelete_user/'.$r->user_id)."'>Delete</a>";

                  $explode_steps = explode(",", $r->form_array);

                  $user_explode_steps = explode(",", $r->ddd_form_array);

                  $payment_id = $this->db->
                  select('fk_payment_id')->
                  where('step1_id', $explode_steps[0])->
                  from('ci_formlist_step1')->
                  get()->result();


                  if (!empty($explode_steps[0])) {
                    $action_btn = "<a class='btn btn-primary btn-xs status_user step_1 blue-btn' data-id=".$r->user_id." data-sid=".$explode_steps[0]." data-fid=".$r->fk_stepform_id." href='javascript:void(0)'>Step 1 <i class='fa fa-arrow-right'></i></a>";
                  }
                  if(!empty($payment_id[0]->fk_payment_id)){
                     $action_btn .= "<a class='btn btn-primary btn-xs status_user step_2 blue-btn' data-id=".$r->user_id." data-sid=".$explode_steps[1]." data-fid=".$r->fk_stepform_id." href='javascript:void(0)'>Step 2 <i class='fa fa-arrow-right'></i></a>";
                  }
                  if (!empty($explode_steps[2])) {
                     $action_btn .= "<a class='btn btn-primary btn-xs status_user step_3 blue-btn' data-id=".$r->user_id." data-sid=".$explode_steps[2]." data-userformid=".$user_explode_steps[2]." data-fid=".$r->fk_stepform_id." href='javascript:void(0)'>Step 3 <i class='fa fa-arrow-right'></i></a>";
                  }
                  if (!empty($explode_steps[3])) {
                     $action_btn .= "<a class='btn btn-primary blue-btn btn-xs status_user step_4' data-id=".$r->user_id." data-sid=".$explode_steps[3]." data-userformid=".$user_explode_steps[3]." data-fid=".$r->fk_stepform_id."  href='javascript:void(0)'>Step 4</a>";
                  }

            if($r->activity_status == '1'){
               $status = "Active";
            }else{
               $status = "Inactive";
            }

            $name =  $r->first_name ." ".$r->last_name;

              $data[] = array(
                $name,
                $r->form_date_added,
                $r->form_status,
                $action_btn
              );
            // }
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $users->num_rows(),
                 "recordsFiltered" => $users->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
	}

   public function view_stepform($form_type=""){

      if($form_type == '1'){
         $form_id = 'step1_id';
         $table = 'ci_formlist_step1';
      }else if($form_type == '2'){
         $form_id = 'payment_id';
         $table = 'ci_formlist_step2';
      }else if($form_type == '3'){
         $form_id = 'step3_id';
         $table = 'ci_formlist_step3_admin';
      }else if($form_type == '4'){
         $form_id = 'step4_id';
         $table = 'ci_formlist_step4_admin';
      }else if($form_type == '5'){
           $form_id = 'step3_id';
           $table = 'ci_formlist_step3_user';
      }else if($form_type == '6'){
           $form_id = 'step4_id';
           $table = 'ci_formlist_step4_user';
      }

      if(($form_type != '5') && ($form_type != '6')){
        $result = $this->db->
        select('*')->
        where('fk_user_id', $_POST['user_id'])->
        where($form_id, $_POST['step_id'])->
        from($table)->
        get()->result();
      }else{
        $result = $this->db->
        select('*')->
        where($form_id, $_POST['form_id'])->
        from($table)->
        get()->result();
      }

      echo json_encode($result);
      exit;
   }

   public function admin_step1(){

     // $user_form = $this->db->
     // select('ddd_form_array')->
     // where('fk_stepform_id', $_POST['form_id'])->
     // from('ci_ddd_application')->
     // get()->result();
     //
     // $new_form_array = array();
     // array_push($new_form_array, $user_form[0]->ddd_form_array);
     // array_push($new_form_array, '1');
     //
     // $new_form_array = implode(', ', $new_form_array);
     //
     // echo "<pre>";print_r($new_form_array);exit;

      $files1 = $_FILES['ws_invoice']['name'];

      $folder1 = 'assets/uploads/documents/';
      $name1 = $_FILES['ws_invoice']['tmp_name'];
      $othername1 = $_FILES['ws_invoice']['name'];
      move_uploaded_file($name1, $folder1.time().'_'.$othername1);

      $files1 = $_FILES['ws_invoice']['name'];
      $filename1 = time().'_'.$files1;

      $files2 = $_FILES['a_invoice']['name'];

      $folder2 = 'assets/uploads/documents/';
      $name2 = $_FILES['a_invoice']['tmp_name'];
      $othername2 = $_FILES['a_invoice']['name'];
      move_uploaded_file($name2, $folder2.time().'_'.$othername2);

      $files2 = $_FILES['a_invoice']['name'];
      $filename2 = time().'_'.$files2;

		$result2 = $this->db->
		set('website_quote', $_POST['ws_qprice'])->
		set('agency_quote', $_POST['a_qprice'])->
		set('step1_status', '1')->
		set('website_invoice', $filename1)->
		set('agency_invoice', $filename2)->
		where('fk_user_id', $_POST['user_id'])->
		where('step1_id', $_POST['step_id'])->
    update('ci_formlist_step1');

    $forstep2 = $this->db->
    set('fk_user_id', $_POST['user_id'])->
    set('step2_status', '0')->
    insert('ci_formlist_step2');

    $step2_id = $this->db->insert_id();

    $user_form = $this->db->
    select('ddd_form_array')->
    where('fk_stepform_id', $_POST['form_id'])->
    from('ci_ddd_application')->
    get()->result();

    $new_form_array = array();
    array_push($new_form_array, $user_form[0]->ddd_form_array);
    array_push($new_form_array, $step2_id);

    $new_form_array = implode(', ', $new_form_array);

    $this->db->
    set('ddd_form_array', $new_form_array)->
    set('status', 'Proceed to Step 2')->
    where('fk_stepform_id', $_POST['form_id'])->
    update('ci_ddd_application');

    $this->db->
    set('form_array', $new_form_array)->
    set('form_status', 'Awaiting Step 2')->
    where('stepform_id', $_POST['form_id'])->
    update('ci_formlist');

		$this->session->set_userdata('swal', 'Step 1 has been updated.');

    $uemail = $this->db->
    select('email')->
    where('user_id', $_POST['user_id'])->
    from('ci_users')->
    get()->result();

    $message = "<h1>DDD Forms - Step 1 has been updated.</h1>";
    $message .= "<h3>Proceed now to Step 2 on DDD Forms.</h3>";
    $message .= "<h3>For more information, please visit the website: <a href='https://localhost/Projects/ConsultingExperts/consultingexpert/login'>Consulting Experts LLC</a></h3>";
    $this->sendmail1($uemail[0]->email, null, 'Notification - DDD Forms', $message, true);
    $this->send_notification($_POST['user_id'],'Notification: DDD Forms','Proceed to Step 2 now. ',5);
		redirect('formlist');
	}


   public function admin_step2(){

      // $files1 = $_FILES['upwinvoice']['name'];
      //
      // $folder1 = 'assets/uploads/documents/';
      // $name1 = $_FILES['upwinvoice']['tmp_name'];
      // $othername1 = $_FILES['upwinvoice']['name'];
      // move_uploaded_file($name1, $folder1.time().'_'.$othername1);
      //
      // $files1 = $_FILES['upwinvoice']['name'];
      // $filename1 = time().'_'.$files1;

      $files2 = $_FILES['upainvoice']['name'];

      $folder2 = 'assets/uploads/documents/';
      $name2 = $_FILES['upainvoice']['tmp_name'];
      $othername2 = $_FILES['upainvoice']['name'];
      move_uploaded_file($name2, $folder2.time().'_'.$othername2);

      $files2 = $_FILES['upainvoice']['name'];
      $filename2 = time().'_'.$files2;

		$result2 = $this->db->
		// set('website_uinvoice', $filename1)->
		set('upload_paid_invoice', $filename2)->
		set('step2_status', '1')->
		where('fk_user_id', $_POST['user_id'])->
		where('payment_id', $_POST['step_id'])->
    update('ci_formlist_step2');

    $forstep3 = $this->db->
    set('fk_user_id', $_POST['user_id'])->
    set('step3_status', '0')->
    insert('ci_formlist_step3_user');

    $step3_id = $this->db->insert_id();

    $user_form = $this->db->
    select('ddd_form_array')->
    where('fk_stepform_id', $_POST['form_id'])->
    from('ci_ddd_application')->
    get()->result();

    $new_form_array = array();
    array_push($new_form_array, $user_form[0]->ddd_form_array);
    array_push($new_form_array, $step3_id);

    $new_form_array = implode(', ', $new_form_array);

    $this->db->
    set('ddd_form_array', $new_form_array)->
    set('status', 'Proceed to Step 3')->
    where('fk_stepform_id', $_POST['form_id'])->
    update('ci_ddd_application');

    $this->db->
    set('form_status', 'Awaiting Step 3')->
    where('stepform_id', $_POST['form_id'])->
    update('ci_formlist');

    $uemail = $this->db->
    select('email')->
    where('user_id', $_POST['user_id'])->
    from('ci_users')->
    get()->result();

    $message = "<h1>DDD Forms - Step 2 has been updated.:</h1>";
    $message .= "<h3>Proceed now to Step 3 on DDD Forms.</h3>";
    $message .= "<h3>For more information, please visit the website: <a href='https://localhost/Projects/ConsultingExperts/consultingexpert/login'>Consulting Experts LLC</a></h3>";
    $this->sendmail1($uemail[0]->email, null, 'Notification - DDD Forms', $message, true);
    $this->send_notification($_POST['user_id'],'Notification: DDD Forms','Proceed to Step 3 now. ',5);
		$this->session->set_userdata('swal', 'Step 2 has been updated.');
		redirect('formlist');
	}


   public function admin_step3_wa(){

      $files1 = $_FILES['irs-ein-file']['name'];

      $folder1 = 'assets/uploads/documents/';
      $name1 = $_FILES['irs-ein-file']['tmp_name'];
      $othername1 = $_FILES['irs-ein-file']['name'];
      move_uploaded_file($name1, $folder1.time().'_'.$othername1);

      $files1 = $_FILES['irs-ein-file']['name'];
      $irseinfile = time().'_'.$files1;

      $files2 = $_FILES['nia-file']['name'];

      $folder2 = 'assets/uploads/documents/';
      $name2 = $_FILES['nia-file']['tmp_name'];
      $othername2 = $_FILES['nia-file']['name'];
      move_uploaded_file($name2, $folder2.time().'_'.$othername2);

      $files2 = $_FILES['nia-file']['name'];
      $niafile = time().'_'.$files2;

      $files3 = $_FILES['nia-app-denial']['name'];

      $folder3 = 'assets/uploads/documents/';
      $name3 = $_FILES['nia-app-denial']['tmp_name'];
      $othername3 = $_FILES['nia-app-denial']['name'];
      move_uploaded_file($name3, $folder3.time().'_'.$othername3);

      $files3 = $_FILES['nia-app-denial']['name'];
      $appdenialfile = time().'_'.$files3;

      $files4 = $_FILES['nca-file']['name'];

      $folder4 = 'assets/uploads/documents/';
      $name4 = $_FILES['nca-file']['tmp_name'];
      $othername4 = $_FILES['nca-file']['name'];
      move_uploaded_file($name4, $folder4.time().'_'.$othername4);

      $files4 = $_FILES['nca-file']['name'];
      $ncafile = time().'_'.$files4;

      $files5 = $_FILES['npa-file']['name'];

      $folder5 = 'assets/uploads/documents/';
      $name5 = $_FILES['npa-file']['tmp_name'];
      $othername5 = $_FILES['npa-file']['name'];
      move_uploaded_file($name5, $folder5.time().'_'.$othername5);

      $files5 = $_FILES['npa-file']['name'];
      $npafile = time().'_'.$files5;

      $files6 = $_FILES['na-file']['name'];

      $folder6 = 'assets/uploads/documents/';
      $name6 = $_FILES['na-file']['tmp_name'];
      $othername6 = $_FILES['na-file']['name'];
      move_uploaded_file($name6, $folder6.time().'_'.$othername6);

      $files6 = $_FILES['na-file']['name'];
      $nafile = time().'_'.$files6;

		$result = $this->db->
		set('step3_status', '0')->
		set('ws_url1', $_POST['prototype1'])->
		set('ws_url2', $_POST['prototype2'])->
		set('ws_url3', $_POST['prototype3'])->
		set('irs_ein', $_POST['irs-ein'])->
		set('irs_ein_file', $irseinfile)->
		set('irs_submitted', $_POST['irs-submitted'])->
		set('irs_mailed', $_POST['irs-mailed'])->
		set('irs_rdate', $_POST['irs-rdate'])->
		set('irs_cspecialist', $_POST['irs-cspecialist'])->
		set('nia_file', $niafile)->
		set('nia_ddate', $_POST['nia-ddate'])->
		set('nia_bplan', $_POST['nia-bplan'])->
		set('nia_cplan', $_POST['nia-cplan'])->
    set('app_denial_file', $appdenialfile)->
		set('ad_rdate', $_POST['ad-rdate'])->
		set('ad_rfocus', $_POST['ad-rfocus'])->
		set('ad_mdate', $_POST['ad-mdate'])->
    set('nca_file', $ncafile)->
    set('npa_file', $npafile)->
		set('padate', $_POST['padate'])->
		set('na_file', $nafile)->
		where('fk_user_id', $_POST['user_id_step3'])->
    update('ci_formlist_step3');

    $forstep4 = $this->db->
    set('fk_user_id', $_POST['user_id'])->
    set('step4_status', '0')->
    insert('ci_formlist_step4_user');

    $step4_id = $this->db->insert_id();

    $user_form = $this->db->
    select('ddd_form_array')->
    where('fk_stepform_id', $_POST['form_id'])->
    from('ci_ddd_application')->
    get()->result();

    $new_form_array = array();
    array_push($new_form_array, $user_form[0]->ddd_form_array);
    array_push($new_form_array, $step3_id);

    $new_form_array = implode(', ', $new_form_array);

    $this->db->
    set('ddd_form_array', $new_form_array)->
    set('status', 'Proceed to Step 3')->
    where('fk_stepform_id', $_POST['form_id'])->
    update('ci_ddd_application');

    $this->db->
    set('form_status', 'Awaiting Step 3')->
    where('stepform_id', $_POST['form_id'])->
    update('ci_formlist');

    $uemail = $this->db->
    select('email')->
    where('user_id', $_POST['user_id'])->
    from('ci_users')->
    get()->result();

    $message = "<h1>DDD Forms - Step 3 has been updated.:</h1>";
    $message .= "<h3>Proceed now to Step 4 on DDD Forms.</h3>";
    $message .= "<h3>For more information, please visit the website: <a href='https://localhost/Projects/ConsultingExperts/consultingexpert/login'>Consulting Experts LLC</a></h3>";
    $this->sendmail1($uemail[0]->email, null, 'Notification - DDD Forms', $message, true);
    $this->send_notification($_POST['user_id'],'Notification: DDD Forms','Proceed to Step 3 now. ',5);
		$this->session->set_userdata('swal', 'Step 3 has been updated.');
		redirect('formlist');
	}

  //  public function admin_step3_na(){
  //
  //     $files2 = $_FILES['nia-file']['name'];
  //
  //     $folder2 = 'assets/uploads/documents/';
  //     $name2 = $_FILES['nia-file']['tmp_name'];
  //     $othername2 = $_FILES['nia-file']['name'];
  //     move_uploaded_file($name2, $folder2.time().'_'.$othername2);
  //
  //     $files2 = $_FILES['nia-file']['name'];
  //     $niafile = time().'_'.$files2;
  //
  //     $files3 = $_FILES['nia-app-denial']['name'];
  //
  //     $folder3 = 'assets/uploads/documents/';
  //     $name3 = $_FILES['nia-app-denial']['tmp_name'];
  //     $othername3 = $_FILES['nia-app-denial']['name'];
  //     move_uploaded_file($name3, $folder3.time().'_'.$othername3);
  //
  //     $files3 = $_FILES['nia-app-denial']['name'];
  //     $appdenialfile = time().'_'.$files3;
  //
  //     $files4 = $_FILES['nca-file']['name'];
  //
  //     $folder4 = 'assets/uploads/documents/';
  //     $name4 = $_FILES['nca-file']['tmp_name'];
  //     $othername4 = $_FILES['nca-file']['name'];
  //     move_uploaded_file($name4, $folder4.time().'_'.$othername4);
  //
  //     $files4 = $_FILES['nca-file']['name'];
  //     $ncafile = time().'_'.$files4;
  //
  //     $files5 = $_FILES['npa-file']['name'];
  //
  //     $folder5 = 'assets/uploads/documents/';
  //     $name5 = $_FILES['npa-file']['tmp_name'];
  //     $othername5 = $_FILES['npa-file']['name'];
  //     move_uploaded_file($name5, $folder5.time().'_'.$othername5);
  //
  //     $files5 = $_FILES['npa-file']['name'];
  //     $npafile = time().'_'.$files5;
  //
  //     $files6 = $_FILES['na-file']['name'];
  //
  //     $folder6 = 'assets/uploads/documents/';
  //     $name6 = $_FILES['na-file']['tmp_name'];
  //     $othername6 = $_FILES['na-file']['name'];
  //     move_uploaded_file($name6, $folder6.time().'_'.$othername6);
  //
  //     $files6 = $_FILES['na-file']['name'];
  //     $nafile = time().'_'.$files6;
  //
	// 	$result = $this->db->
	// 	set('step3_status', '0')->
	// 	set('ws_url1', $_POST['prototype1'])->
	// 	set('ws_url2', $_POST['prototype2'])->
	// 	set('ws_url3', $_POST['prototype3'])->
  //     set('irs_submitted', $_POST['irs-submitted'])->
	// 	set('irs_mailed', $_POST['irs-mailed'])->
	// 	set('irs_rdate', $_POST['irs-rdate'])->
	// 	set('irs_cspecialist', $_POST['irs-cspecialist'])->
	// 	set('nia_file', $niafile)->
	// 	set('nia_ddate', $_POST['nia-ddate'])->
	// 	set('nia_bplan', $_POST['nia-bplan'])->
	// 	set('nia_cplan', $_POST['nia-cplan'])->
  //     set('app_denial_file', $appdenialfile)->
	// 	set('ad_rdate', $_POST['ad-rdate'])->
	// 	set('ad_rfocus', $_POST['ad-rfocus'])->
	// 	set('ad_mdate', $_POST['ad-mdate'])->
  //     set('nca_file', $ncafile)->
  //     set('npa_file', $npafile)->
	// 	set('padate', $_POST['padate'])->
	// 	set('na_file', $nafile)->
	// 	where('fk_user_id', $_POST['user_id_step3'])->
  //     update('ci_formlist_step3');
  //
	// 	$this->session->set_userdata('swal', 'Step 3 has been updated.');
	// 	redirect('formlist');
	// }

   public function admin_step4(){

      // echo "<pre>";
      // print_r($_FILES);
      // echo "<br>";
      // print_r($_POST);
      // exit;

      $files1 = $_FILES['olcr-file']['name'];

      $folder1 = 'assets/uploads/documents/';
      $name1 = $_FILES['olcr-file']['tmp_name'];
      $othername1 = $_FILES['olcr-file']['name'];
      move_uploaded_file($name1, $folder1.time().'_'.$othername1);

      $files1 = $_FILES['olcr-file']['name'];
      $olcrfile = time().'_'.$files1;


      $files2 = $_FILES['pm-file']['name'];

      $folder2 = 'assets/uploads/documents/';
      $name2 = $_FILES['pm-file']['tmp_name'];
      $othername2 = $_FILES['pm-file']['name'];
      move_uploaded_file($name2, $folder2.time().'_'.$othername2);

      $files2 = $_FILES['pm-file']['name'];
      $pmfile = time().'_'.$files2;

		$result = $this->db->
		set('step4_status', '0')->
		set('district', $_POST['district'])->
		set('ahcccs_submitted', $_POST['ahcccs-submitted'])->
		set('ahcccs_approved', $_POST['ahcccs-approved'])->
		set('olcr_file', $olcrfile)->
		set('olcr_date', $_POST['olcr-date'])->
		set('olcr_contact', $_POST['olcr-contact'])->
    set('pm_file', $pmfile)->
		set('pm_submitted', $_POST['pm-submitted'])->
		where('fk_user_id', $_POST['user_id_step4'])->
    update('ci_formlist_step4');

    $message = "<h1>DDD Forms - Step 4 has been checked and recorded.:</h1>";
    $message .= "<h3>Congratulations! You're done with the DDD Forms.</h3>";
    $message .= "<h3>For more information, please visit the website: <a href='https://localhost/Projects/ConsultingExperts/consultingexpert/login'>Consulting Experts LLC</a></h3>";
    // $this->sendmail1("prospteam@gmail.com", null, 'Notification - DDD Forms', $message, true);
    $this->send_notification($_POST['user_id'],'Notification: DDD Forms','Congratulations! You are done with your Step 4 DDD Form! ',5);
		$this->session->set_userdata('swal', 'Step 4 has been updated.');
		redirect('formlist');
	}

}
