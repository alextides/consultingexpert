<!DOCTYPE html>
<html>
     <head>
           <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <!-- Tell the browser to be responsive to screen width -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="">
          <!-- Favicon icon -->

          <title><?= $title?></title>

          <!-- Bootstrap Core CSS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
          <link href="<?=base_url()?>assets/module/bootstrap/css/bootstrap.min.css" rel="stylesheet">
          <link href="<?=base_url()?>assets/module/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" rel="stylesheet">
          <!-- This page CSS -->
          <!-- chartist CSS -->
          <link href="<?=base_url()?>assets/module/morrisjs/morris.css" rel="stylesheet">
          <link rel="stylesheet" type="text/css"
             href="<?=base_url()?>assets/module/datatables.net-bs4/css/dataTables.bootstrap4.css">
	     <link rel="stylesheet" type="text/css"
            href="<?=base_url()?>assets/module/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/pages/table-pages.css" rel="stylesheet">
          <!--c3 CSS -->
          <link href="<?=base_url()?>assets/module/c3-master/c3.min.css" rel="stylesheet">
          <!--Toaster Popup message CSS -->
          <link href="<?=base_url()?>assets/module/toast-master/css/jquery.toast.css" rel="stylesheet">
          <!-- Custom CSS -->
          <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
          <!-- Dashboard 1 Page CSS -->
          <link href="<?=base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">
          <!-- You can change the theme colors from here -->
          <link href="<?=base_url()?>/assets/css/colors/default.css" id="theme" rel="stylesheet">
          <link href="<?=base_url()?>/assets/css/adminstyle.css" rel="stylesheet">
           <link href="<?=base_url()?>assets/module/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

           <?php
             if (isset($add_to_header)) {
                 $add_to_headerr_files = explode(',',$add_to_header);
                 foreach ($add_to_headerr_files as $value) {
                    $this->load->view($value);
                 }
             }
          ?>

     </head>
      <body class="fix-header fix-sidebar card-no-border">
         <header class="topbar">
             <nav class="navbar top-navbar navbar-expand-md navbar-light">
                 <!-- ============================================================== -->
                 <!-- Logo -->
                 <!-- ============================================================== -->
                 <div class="navbar-header">
                     <a class="navbar-brand" href="<?= base_url() ?>">
                        <!-- Logo icon --><b>
                             <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                             <!-- Dark Logo icon -->
                             <img src="<?= base_url() ?>assets/images/main-logo.png" alt="homepage" width="180" height="80" class="dark-logo" />
                             <!-- Light Logo icon -->
                             <!-- <img src="<?= base_url() ?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                             <!-- dark Logo text -->
                             <!-- <img src="<?= base_url() ?>assets/images/text-logo.png" alt="homepage" class="dark-logo" /> -->
                             <!-- Light Logo text -->
                             <img src="<?= base_url() ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                 </div>
                 <!-- ============================================================== -->
                 <!-- End Logo -->
                 <!-- ============================================================== -->
                 <div class="navbar-collapse">
                     <!-- ============================================================== -->
                     <!-- toggle and nav items -->
                     <!-- ============================================================== -->
                     <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                     </ul>
                     <!-- ============================================================== -->
                     <!-- User profile and search -->
                     <!-- ============================================================== -->
                     <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                             <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out-alt"></i><span class="hidden-md-down"> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                             <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                 <ul class="dropdown-user">

                                     <li role="separator" class="divider"></li>
                                     <?php if ($this->session->userdata("user_type") != "2") { ?>
                                         <?php echo "<li><a href='" . base_url("admin/profile") . "'></i> Hi <strong>'" . $this->session->userdata('user_details')[0]['first_name'] . " " . $this->session->userdata('user_details')[0]['last_name']."'</strong></a></li>"; ?>
                                     <?php } else { ?>
                                         <?php echo "<li><a href='" . base_url("employee/profile") . "'></i> Hi <strong>'" . $this->session->userdata('user_details')[0]['first_name'] . " " . $this->session->userdata('user_details')[0]['last_name']."'</strong></a></li>"; ?>
                                     <?php } ?>
                                     <li><a href="<?= base_url("logout") ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                 </ul>
                             </div>
                        </li>
                     </ul>
                 </div>
             </nav>
         </header>

            <!-- ============================================================== -->
     <!-- Preloader - style you can find in spinners.css -->
     <!-- ============================================================== -->
     <div class="preloader">
          <div class="loader">
               <div class="loader__figure"></div>
               <p class="loader__label">Consulting Expert LLC</p>
          </div>
     </div>
