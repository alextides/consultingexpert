<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboarduser extends MY_Controller
{
   public function index()
   {
      $data['title'] = 'Dashboard User';
      $this->load_page2('dashboarduser', $data, 'ms_footer.php', 'ms_header.php');
   }
}
