<div class="page-wrapper" id="vueapp">
<!-- page content -->
<div class="container-fluid">
   <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor page-title-text">Notifications List</h3>
        </div>
        <!-- <div class="col-md-7 align-self-center text-right center-container">
          <button type="button" class="btn btn-primary blue-btn add-technician" data-id="1"><i class="fa fa-plus-circle"></i> Create New User</button> -->
          <!-- <button type="button" class="btn btn-btn-mod" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus-circle"></i> Create New Technician</button> -->
      <!-- </div> -->
   </div>
<div class="right_col" role="main" style="margin-top: 40px; background: transparent !important;">
    <div class="x_panel">
      <div class="x_content">
         <ul id="listShow" class="list-unstyled msg_list">
         </ul>
         <div class="turn-page" id="pager"></div>
         <textarea id="listTemplate" style="display:none">
         <?php foreach ($notifications as $value): ?>
            <?php if($value->notif_type == '1'){ ?>
               <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>users/view_users?notif=<?php echo $value->notif_id; ?>">
            <?php } elseif ($value->notif_type == '2') {?>
                  <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>loads/view_loads?notif=<?php echo $value->notif_id; ?>">
            <?php } elseif($value->notif_type == '3') { ?>
                  <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>trucks/view_trucks?notif=<?php echo $value->notif_id; ?>">
            <?php } elseif($value->notif_type == '4') { ?>
                  <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>loads/view_loads?notif=<?php echo $value->notif_id; ?>">
            <?php } else { ?>
               <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>notifications/index?notif=<?php echo $value->notif_id; ?>">
            <?php } ?>
            <li class="li-item glow-custom" style="<?php if($value->status =='unread') echo "background: rgb(230, 242, 255) none repeat scroll 0% 0%;"; else  echo "background: #EAEAEA;";?>">
               <span>
                  <span class="header-message-custom"><?= $value->title; ?></span>
                  <span class="time time-message-custom">

                    <?php
                    $datetime1 = strtotime($value->date_added);
                    $today = strtotime(date('Y-m-d H:i:s'));

                    $secs = $today - $datetime1;// == <seconds between the two times>
                    $days = $secs / 86400;
                    // echo $secs;
                    // echo "<br>";
                    // echo $days;

                    $dt = new DateTime($value->date_added);


                    if (floor($days)==1) {
                      echo " Yesterday";
                    }else if (floor($days)>1) {
                      echo floor($days)." days ago";
                    }else{
                      echo "Today";
                    }
                    echo $date = ", ".$dt->format('M d, Y');
                    echo "<br>";
                    ?>

                  </span>
                </span>
                <span class="message message-custom">
                  <?= $value->description; ?>
                </span>
                <span class="time time-message-custom2" style="display: none;">

                  <?php
                  $datetime1 = strtotime($value->date_added);
                  $today = strtotime(date('Y-m-d H:i:s'));

                  $secs = $today - $datetime1;// == <seconds between the two times>
                  $days = $secs / 86400;
                  // echo $secs;
                  // echo "<br>";
                  // echo $days;

                  $dt = new DateTime($value->date_added);


                  if (floor($days)==1) {
                    echo " Yesterday";
                  }else if (floor($days)>1) {
                    echo floor($days)." days ago";
                  }else{
                    echo "Today";
                  }
                  echo $date = ", ".$dt->format('M d, Y');
                  echo "<br>";
                  ?>

                </span>
              </a>
            </li>
          <?php endforeach; ?>
        </textarea>
      </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>
