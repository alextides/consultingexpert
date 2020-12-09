<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gagencylist extends MY_Controller {

   public function index(){

     // $agencies = $this->db->
     // select('*')->
     // from('ci_gagencylist')->
     // where('delete_status', '0')->
     // get()->result_array();
     //
     // echo "<pre>"; print_r($agencies); exit;

      // echo "<pre>"; print_r($this->session->userdata('user_details')[0]['user_type']); exit;

         $data['formlist'] = 1;
         $data['title'] = 'Government Agency List';

         // echo "<pre>";
         // print_r($result);
         // exit;


         $this->load_page2('index',$data,'gal_footer.php','gal_header.php');
      	// $this->load_page('index', $data);
   }

	public function view_agencies()
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
   			1=>'agency_image',
   			2=>'agency_name',
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

            $agencies = $this->db->
            select('*')->
            from('ci_gagencylist')->
            where('delete_status', '0')->
            get();

          $data = array();

          foreach($agencies->result() as $r) {

                  $action_btn = "<a class='btn btn-primary btn-xs status_user view_agency  blue-btn' data-id=".$r->gagency_id."  href='javascript:void(0)'>View <i class='fa fa-eye'></i></a>";
                  if($this->session->userdata('user_details')[0]['user_type'] == 'admin'){
                     $action_btn .= "<a class='btn btn-success btn-xs status_user edit_agency' data-id=".$r->gagency_id." href='javascript:void(0)'>Edit <i class='fa fa-pen'></i></a>";
                     $action_btn .= "<a class='btn btn-danger btn-xs status_user delete_agency' href='".base_url('gagencylist/delete_agency/'.$r->gagency_id)."'>Delete <i class='fa fa-trash'></i></a>";
                  }

                  $path = base_url('/assets/images/agencies/') . $r->agency_image;

                  $image = '<img style="max-height: 150px; max-width: 150px;" src="'.$path.'" alt="government agency image">';


              $data[] = array(
                $image,
                $r->agency_name,
                $action_btn
              );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $agencies->num_rows(),
                 "recordsFiltered" => $agencies->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
	}

  public function add_agency(){

      $data1 = $_POST['imagebase64'];

      if($data1 == 'data:,'){
         $product_image = 'main-logo.png';
      }else{
        list($type, $data1) = explode(';', $data1);
        list(, $data1)      = explode(',', $data1);
        $data5 = base64_decode($data1);
        $imgname = "agency_".substr(md5(uniqid(rand(1,8))), 0, 8).".png";
        $test = file_put_contents("assets/images/agencies/$imgname", $data5);

        $filename = $filetmpname = $imgname;
        // folder where images will be uploaded
        $folder = 'assets/images/agencies/';
        //function for saving the uploaded images in a specific folder
        move_uploaded_file($filetmpname, $folder.$filename);
        //inserting image details (ie image name) in the database

         $product_image = $filename;
      }


      $this->db->
      set('agency_name', $_POST['aname'])->
      set('agency_image', $product_image)->
      set('agency_description', $_POST['adescription'])->
      set('delete_status', '0')->
      insert('ci_gagencylist');

		$this->session->set_userdata('swal', 'The agency has been added on the list.');
		redirect('gagencylist');
   }

   public function edit_agency($id='')
   {
      $result = $this->db->
      select('*')->
      from('ci_gagencylist')->
      where('gagency_id', $id)->
      get()->result_array();

      echo json_encode($result);
      exit();
   }


  public function update_agency($pid=''){

    $data1 = $_POST['edit-imagebase64'];

    if($data1 == 'data:,'){
      $this->db->
      set('agency_name', $_POST['edit_aname'])->
      set('agency_description', $_POST['edit_adescription'])->
      where('gagency_id', $_POST['id_agency_id'])->
      update('ci_gagencylist');
    }else{
       list($type, $data1) = explode(';', $data1);
       list(, $data1)      = explode(',', $data1);
       $data5 = base64_decode($data1);
       $imgname = "agency_".md5(rand()).".png";
       $test = file_put_contents("assets/images/agencies/$imgname", $data5);

       $filename = $filetmpname = $imgname;
       // folder where images will be uploaded
       $folder = 'assets/images/agencies/';
       //function for saving the uploaded images in a specific folder
       move_uploaded_file($filetmpname, $folder.$filename);
       //inserting image details (ie image name) in the database

       $this->db->
       set('agency_name', $_POST['edit_aname'])->
       set('agency_image', $filename)->
       set('agency_description', $_POST['edit_adescription'])->
       where('gagency_id', $_POST['id_agency_id'])->
       update('ci_gagencylist');
    }

    $this->session->set_userdata('swal', 'The agency has been updated on the list.');
    redirect('gagencylist');
  }

  public function delete_agency($id=''){

    $this->db->
    set('delete_status', '1')->
    where('gagency_id',$id)->
    update('ci_gagencylist');

    $this->session->set_userdata('swal','Agency has been removed from the list.');
    redirect('gagencylist');
  }

}
