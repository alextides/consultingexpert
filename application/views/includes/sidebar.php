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
                <li class="nav-item dropdown">
                    <a class="nav-link waves-effect waves-dark" href="<?= base_url("notiflist") ?>"> <i class="icon-Bell"></i>
                        <div class="notify">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out-alt"></i><span class="hidden-md-down"> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">

                            <li role="separator" class="divider"></li>
                            <?php if ($this->session->userdata('user_details')[0]['user_type'] != "user") { ?>
                                <?php echo "<li><a href='" . base_url("admin/profile") . "'></i><strong>" . $this->session->userdata('user_details')[0]['first_name'] . " " . $this->session->userdata('user_details')[0]['last_name'] . "</strong></a></li>"; ?>
                            <?php } else { ?>
                                <?php echo "<li><a href='" . base_url("user/profile") . "'></i> Hi <strong>'" . $this->session->userdata('user_details')[0]['first_name'] . " " . $this->session->userdata('user_details')[0]['last_name'] . "'</strong></a></li>"; ?>
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

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <?php //if ($this->session->userdata("user_type") != "user") { ?>
                <ul id="sidebarnav">
                    <!-- <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>"> <a class="waves-effect " href="<?= base_url("admin") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("userlist") ?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Manage Users</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("managefiles") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Files</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("formlist") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">DDD Forms</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("managesubscription") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Subscription</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("manageorderawebsite") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Order a Website</span></a> </li> -->
                    <!-- <li> <a class="has-arrow waves-effect" href="javascript:;" aria-expanded="false"><i class="icon-El-Castillo"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:;">item 1.1</a></li>
                        <li><a href="javascript:;">item 1.2</a></li>
                        <li> <a class="has-arrow" href="javascript:;" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:;">item 1.3.1</a></li>
                                <li><a href="javascript:;">item 1.3.2</a></li>
                                <li><a href="javascript:;">item 1.3.3</a></li>
                                <li><a href="javascript:;">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li> -->
                </ul>
            <?php //} else { ?>
                <ul id="sidebarnav">
                    <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>"><a class="waves-effect " href="<?= base_url("user") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("user/profile") ?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Profile</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("viewfiles") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">View Files</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("mysubscription") ?>" aria-expanded="false"><i class="icon-Dollar"></i><span class="hide-menu">Subscription</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("myorderawebsite") ?>" aria-expanded="false"><i class="icon-Globe"></i><span class="hide-menu">Order Website</span></a></li>
                    <?php if ($this->session->userdata('user_details')[0]['user_type'] != "admin") { ?>
                    <li> <a class="waves-effect " href="<?= base_url("mydddapplicationform") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Application</span></a></li>
                 <?php }else{ ?>
                    <li> <a class="waves-effect " href="<?= base_url("formlist") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Application</span></a></li>
                    <?php } ?>
                <?php //} ?>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
