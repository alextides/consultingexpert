<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notiflist extends MY_Controller {



	public function index(){
		if(isset($_GET['notif'])){
			$notif_id = $_GET['notif'];
			$this->db->
			set('status', 'read')->
			where('notif_id', $notif_id)->
			update('ci_notiflist');
		}
		$id = $this->session->userdata('user_details')[0]['user_id'];
		$data['notifications'] = $this->db->
		select('*')->
		where('fk_user_id', $id)->
		order_by('status','DESC')->
		order_by('date_added','DESC')->
		limit(100)->
		from('ci_notiflist')->
		get()->result();


      $data['title'] = 'Notifications List';

		// echo "<pre>";
		// print_r($data);
		// exit();
    $this->load_page2('index', $data, 'nl_footer.php', 'nl_header.php');
	}
	public function mark_all_as_read(){
		$this->db->
		set('status','read')->
		where('fk_user_id',$this->session->userdata('user_details')[0]['user_id'])->
		update('ci_notiflist');
		redirect('notiflist');
	}

}
