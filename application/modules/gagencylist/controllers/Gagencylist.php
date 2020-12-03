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
   			1=>'image',
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

                  $action_btn = "<a class='btn btn-primary btn-xs status_user  blue-btn' data-id=".$r->gagency_id."  href='javascript:void(0)'>View <i class='fa fa-eye'></i></a>";
                  if($this->session->userdata('user_details')[0]['user_type'] == 'admin'){
                     $action_btn .= "<a class='btn btn-success btn-xs status_user' data-id=".$r->gagency_id." href='javascript:void(0)'>Edit <i class='fa fa-pen'></i></a>";
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

}
