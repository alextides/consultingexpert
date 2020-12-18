<style>
    .dark-logo {
        width: 55%;
        display: block;
        margin: 0 auto;
    }
</style>

<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/main-logo.png" alt="homepage" class="dark-logo" /></a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link waves-effect waves-dark" href="<?= base_url("notiflist") ?>"> <i class="icon-Bell"></i>
                        <div class="notify">
                            <?php if (!empty($notifs)) : ?>
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>

                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-out-alt"></i><span class="hidden-md-down"> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">

                            <li role="separator" class="divider"></li>
                            <?php if ($this->session->userdata('user_details')[0]['user_type'] != "2") { ?>
                                <?php echo "<li><a href='" . base_url("user/profile") . "'></i><strong>" . $this->session->userdata('user_details')[0]['first_name'] . " " . $this->session->userdata('user_details')[0]['last_name'] . "</strong></a></li>"; ?>
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
            <?php if ($this->session->userdata('user_details')[0]['user_type'] != "2") { ?>
                <ul id="sidebarnav">
                    <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>"> <a class="waves-effect " href="<?= base_url("dashboardadmin") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("user/profile") ?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Profile</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("gagencylist") ?>" aria-expanded="false"><i class="icon-Shield"></i><span class="hide-menu">Agency List</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("userlist") ?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Manage Users</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("managefiles") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Files</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("managesubscription") ?>" aria-expanded="false"><i class="icon-Dollar"></i><span class="hide-menu">Subscription</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("manageorderawebsite") ?>" aria-expanded="false"><i class="icon-Globe"></i><span class="hide-menu">Order Website</span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("formlist") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">DDD Forms</span></a> </li>
                </ul>
            <?php } else { ?>
                <ul id="sidebarnav">
                    <li class="<?php if (!empty($pagename)) {
                                    echo "active";
                                } else {
                                    echo "not-active";
                                }  ?>"><a class="waves-effect " href="<?= base_url("dashboarduser") ?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                    <li> <a class="waves-effect " href="<?= base_url("user/profile") ?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Profile</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("gagencylist") ?>" aria-expanded="false"><i class="icon-Shield"></i><span class="hide-menu">Agency List</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("viewfiles") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">View Files</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("mysubscription") ?>" aria-expanded="false"><i class="icon-Dollar"></i><span class="hide-menu">Subscription</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("myorderawebsite") ?>" aria-expanded="false"><i class="icon-Globe"></i><span class="hide-menu">Order Website</span></a></li>
                    <li> <a class="waves-effect " href="<?= base_url("mydddapplicationform") ?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">DDD Forms</span></a></li>
                <?php } ?>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>