<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlist extends MY_Controller {

   public function index(){

         $data['technicianlist'] = 1;
         $data['title'] = 'Manage Users';

         // echo "<pre>";
         // print_r($result);
         // exit;


         $this->load_page2('index',$data,'ul_footer.php','ul_header.php');
      	// $this->load_page('index', $data);
   }

	public function view_users()
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
   			3=>'address',
   			4=>'contact_number',
   			5=>'email',
   			6=>'activity_status',
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

         // if($this->session->userdata('type') == 'manufacturer' ){
         //      $users = $this->db->
         //      select('*')->
         //      from('sr_technician')->
         //      where('sr_technician.fk_manufacturer_id', $this->session->userdata('user_id'))->
         //      where('sr_users.delete_status', 'false')->
         //      join('sr_userdata', 'sr_userdata.fk_user_id = sr_technician.fk_user_id')->
         //      join('sr_users', 'sr_users.user_id = sr_technician.fk_user_id')->
         //      join('sr_service_centers', 'sr_service_centers.service_center_id = sr_technician.fk_service_center_id')->
         //      get();
         // } else if($this->session->userdata('type') == 'admin' ){
         //     $users = $this->db->
         //     select('*')->
         //     from('sr_technician')->
         //     where('sr_users.delete_status', 'false')->
         //     join('sr_userdata', 'sr_userdata.fk_user_id = sr_technician.fk_user_id')->
         //     join('sr_users', 'sr_users.user_id = sr_technician.fk_user_id')->
         //     join('sr_service_centers', 'sr_service_centers.service_center_id = sr_technician.fk_service_center_id')->
         //     get();
         //
         // }else{
         //    $manu_id = $this->db->
         //    select('fk_manufacturer_id')->
         //    from('sr_manager')->
         //    where('fk_user_id', $this->session->userdata('user_id'))->
         //    get()->result_array();

            $users = $this->db->
            select('*')->
            from('ci_users')->
            where('delete_status', '0')->
            join('ci_userdata', 'ci_userdata.fk_user_id = ci_users.user_id')->
            get();
         // }

          $data = array();

          foreach($users->result() as $r) {
            // if($this->session->userdata('type') != 'admin'){
                if ($r->activity_status == "1") {
      				   $action_btn = "<a class='btn btn-warning btn-xs status_user' href='".base_url('userlist/deactivate_user/'.$r->user_id)."'>Deactivate</a>";
           			}else{
           				$action_btn = "<a class='btn btn-primary btn-xs status_user' href='".base_url('userlist/activate_user/'.$r->user_id)."'>Activate</a>";
           			}
           			$action_btn .= "<a class='btn btn-success btn-xs edit_user' data-id=".$r->user_id." href='javascript:void(0)'>Edit</a>";
           			$action_btn .= "<a class='btn btn-danger btn-xs delete_user' href='".base_url('technicianlist/delete_user/'.$r->user_id)."'>Delete</a>";
            // }
            // if($this->session->userdata('type') != 'admin'){
            //      $data[] = array(
            //           $r->first_name,
            //           $r->last_name,
            //           $r->brand_establishment,
            //           $r->sc_name,
            //           $r->address,
            //           $r->contact_number,
            //           $r->email,
            //           $r->status,
            //           $action_btn
            //      );
            // }else{

            if($r->activity_status == '1'){
               $status = "Active";
            }else{
               $status = "Inactive";
            }

              $data[] = array(
                $r->first_name,
                $r->last_name,
                $r->address,
                $r->contact_number,
                $r->email,
                $status,
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

	public function activate_user($id='')
	{
		$res=$this->db
		->set('activity_status','1')
		->where('user_id',$id)
		->update('ci_users');

		$this->session->set_userdata('swal','User activated successfully.');
		redirect('userlist');
	}
	public function deactivate_user($id='')
	{
      $res=$this->db
      ->set('activity_status','0')
      ->where('user_id',$id)
      ->update('ci_users');

		$this->session->set_userdata('swal','User deactivated successfully.');
		redirect('technicianlist');
	}

	public function view_establishments($id='')
	{
      $result = $this->db->
      select('brand_establishment')->
      from('sr_userdata')->
      where('fk_user_id !=', '1')->
      where('delete_status', 'false')->
      join('sr_users', 'sr_users.user_id = sr_userdata.fk_user_id')->
      get()->result_array();

      echo json_encode($result);
      exit();
	}

   public function verify_username(){

      if(!empty($_POST['id'])){
         $check_username = $this->db->
         select('*')->
         from('sr_users')->
         where('username', $_POST['username'])->
         where('user_id !=', $_POST['id'])->
         count_all_results();

         if ( $check_username > 0 ) {
            echo "taken";
         }else{
            echo 'not_taken';
         }
         exit();
      }else{
         $check_username = $this->db->
         select('*')->
         from('sr_users')->
         where('username', $_POST['username'])->
         count_all_results();

         if ( $check_username > 0 ) {
            echo "taken";
         }else{
            echo 'not_taken';
         }
         exit();
      }
   }

   public function verify_email(){
      if(!empty($_POST['id'])){
         $check_email = $this->db->
         select('*')->
         from('sr_users')->
         where('email', $_POST['email'])->
         where('user_id !=', $_POST['id'])->
         count_all_results();

         if ( $check_email > 0 ) {
            echo "taken";
         }else{
            echo 'not_taken';
         }
         exit();
      }else{

         $check_email = $this->db->
         select('*')->
         from('sr_users')->
         where('email', $_POST['email'])->
         count_all_results();

         if ( $check_email > 0 ) {
            echo "taken";
         }else{
            echo 'not_taken';
         }
         exit();
      }
   }

   public function assign_service_center($id=''){
    if($this->session->userdata('type') == 'manufacturer'){
      $result = $this->db->
      select('*')->
      from('sr_service_centers')->
      where('activity_status', '0')->
      where('delete_status', '0')->
      where('fk_manufacturer', $this->session->userdata('user_id'))->
      get()->result_array();
    }else{
      $manu_id = $this->db->
      select('fk_manufacturer_id')->
      from('sr_manager')->
      where('fk_user_id', $this->session->userdata('user_id'))->
      get()->result_array();

      $result = $this->db->
      select('*')->
      from('sr_service_centers')->
      where('activity_status', '0')->
      where('delete_status', '0')->
      where('fk_manufacturer', $manu_id[0]['fk_manufacturer_id'])->
      get()->result_array();
    }

     echo json_encode($result);
     exit();
   }

	public function add_user(){

		$check_un = $_POST['username'];
		$check_email = $_POST['email'];

		$result_un = $this->db->
		select('*')->
		from('sr_users')->
		where('username', $check_un)->
		get()->
		result();

		$result_email = $this->db->
		select('*')->
		from('sr_users')->
		where('email', $check_email)->
		get()->
		result();

		if($result_un){
			$this->session->set_userdata('swal', 'Username already exists.');
         redirect('technicianlist');
		}else if($result_email){
			$this->session->set_userdata('swal', 'Email already exists.');
         redirect('technicianlist');
		}else {
			// $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$result = $this->db->
			set('username', $_POST['username'])->
			set('password', $_POST['password'])->
			// set('user_type', $_POST['user_type'])->
			set('user_type', 'technician')->
			set('email', $_POST['email'])->
			set('status', 'active')->
         // set('other_password', $_POST['password'])->
         set('delete_status', 'false')->
			insert('sr_users');
			$uid = $this->db->insert_id();


         if($this->session->userdata('type') == 'manufacturer'){
            $this->db->
            set('fk_manufacturer_id', $this->session->userdata('user_id'))->
            set('fk_user_id', $uid)->
            insert('sr_technician');

         } else{
            $manu_id = $this->db->
            select('fk_manufacturer_id')->
            from('sr_manager')->
            where('fk_user_id', $this->session->userdata('user_id'))->
            get()->result_array();

            $this->db->
            set('fk_manufacturer_id', $manu_id[0]['fk_manufacturer_id'])->
            set('fk_user_id', $uid)->
            insert('sr_technician');
         }



			$result2 = $this->db->
			set('fk_user_id', $uid)->
			set('first_name', $_POST['fname'])->
			set('last_name', $_POST['lname'])->
			set('brand_establishment', $_POST['brand_e'])->
			set('contact_number', $_POST['contact'])->
			set('address', $_POST['address'])->
			set('profile_picture', 'user.png')->
			insert('sr_userdata');

      set('fk_manufacturer_id', $this->session->userdata('user_id'))->
      set('fk_service_center_id', $_POST['assignment'])->
      set('fk_user_id', $uid)->
      insert('sr_technician');

			$this->session->set_userdata('swal', 'New User has been added on the list.');
			redirect('technicianlist');
		}
	}

   public function edit_user($id='')
   {
      $result = $this->db->
      select('*')->
      from('sr_userdata')->
      where('sr_userdata.fk_user_id', $id)->
      join('sr_users', 'sr_users.user_id = sr_userdata.fk_user_id')->
      join('sr_technician', 'sr_technician.fk_user_id = sr_userdata.fk_user_id')->
      get()->result_array();

      echo json_encode($result);
      exit();
   }


	public function update_user(){

		$check_un = $_POST['edit_username'];
		$check_email = $_POST['edit_email'];

		$result_un = $this->db->
		select('*')->
		from('sr_users')->
		where('username', $check_un)->
		where('user_id !=', $_POST['id_value_id'])->
		get()->
		result();

		$result_email = $this->db->
		select('*')->
		from('sr_users')->
		where('email', $check_email)->
      where('user_id !=', $_POST['id_value_id'])->
		get()->
		result();

		if($result_un){
			$this->session->set_userdata('swal', 'Username already exists.');
         redirect('technicianlist');
		}else if($result_email){
			$this->session->set_userdata('swal', 'Email already exists.');
         redirect('technicianlist');
		}else {
			// $pw = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);

			$result = $this->db->
			set('username', $check_un)->
			set('password', $_POST['edit_password'])->
			// set('user_type', $_POST['user_type'])->
			// set('user_type', 'technician')->
			set('email', $_POST['edit_email'])->
			// set('status', 'active')->
         // set('other_password', $_POST['password'])->
         // set('program_type', $options)->
         where('user_id', $_POST['id_value_id'])->
			update('sr_users');
			$uid = $this->db->insert_id();

			$result2 = $this->db->
			set('first_name', $_POST['edit_fname'])->
			set('last_name', $_POST['edit_lname'])->
			set('brand_establishment', $_POST['edit_brand_e'])->
			set('contact_number', $_POST['edit_contact'])->
			set('address', $_POST['edit_address'])->
			// set('profile_picture', 'user.png')->
         where('fk_user_id', $_POST['id_value_id'])->
			update('sr_userdata');

			$this->session->set_userdata('swal', 'Technician record has been updated.');
			redirect('technicianlist');
		}
	}

	public function delete_user($id=''){

		$this->db->
      set('delete_status', 'true')->
		where('user_id',$id)->
		update('sr_users');

		$this->session->set_userdata('swal','User deleted successfully.');
		redirect('technicianlist');
	}
}
