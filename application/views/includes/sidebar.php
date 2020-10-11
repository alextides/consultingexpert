<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <?php if ($this->session->userdata("user_type") != "2"):?>
            <ul id="sidebarnav">
                <li class="<?php if (!empty($pagename)) {echo "active";}else{echo "not-active";}  ?>"> <a class="waves-effect " href="<?=base_url("admin")?>" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a> </li>
                <li> <a class="waves-effect " href="<?=base_url("userlist")?>" aria-expanded="false"><i class="icon-User"></i><span class="hide-menu">Manage Users</span></a></li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/managefiles")?>" aria-expanded="false"><i class="icon-Files"></i><span class="hide-menu">Manage Documents</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/logs")?>" aria-expanded="false"><i class="icon-Receipt-4"></i><span class="hide-menu">Download Logs</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/managevideoaudio")?>" aria-expanded="false"><i class="icon-Receipt-4"></i><span class="hide-menu">Video and Audio</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/managemembership")?>" aria-expanded="false"><i class=""></i><span class="hide-menu">Manage Membership</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/forums")?>" aria-expanded="false"><i class=""></i><span class="hide-menu">Manage Forums</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/surveys")?>" aria-expanded="false"><i class=""></i><span class="hide-menu">Manage Surveys</span></a> </li>
                 <li> <a class="waves-effect " href="<?=base_url("admin/volunteering")?>" aria-expanded="false"><i class=""></i><span class="hide-menu">Manage Volunteering</span></a> </li>
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
        <?php endif;?>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
