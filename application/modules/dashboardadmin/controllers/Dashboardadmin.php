<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardadmin extends MY_Controller
{
   public function index()
   {
      $data['title'] = 'Dashboard Admin';
      $this->load_page2('dashboardadmin', $data, 'ms_footer.php', 'ms_header.php');
   }
}
