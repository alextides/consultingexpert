<!-- page content -->
<div class="right_col" role="main">
   <div class="row">
     <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" style="margin-top: 40px;">
       <div class="x_panel">
         <div class="x_title">
           <h2 style="font-weight: bold;">Notifications List</h2>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <ul id="listShow" class="list-unstyled msg_list">
            </ul>
            <div class="turn-page" id="pager"></div>
            <textarea id="listTemplate" style="display:none">
            <?php foreach ($notifications as $value): ?>
               <?php if($value->notif_type == '1'){ ?>
                  <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>users/view_users?notif=<?php echo $value->notification_id; ?>">
               <?php } elseif ($value->notif_type == '2') {?>
                     <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>loads/view_loads?notif=<?php echo $value->notification_id; ?>">
               <?php } elseif($value->notif_type == '3') { ?>
                     <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>trucks/view_trucks?notif=<?php echo $value->notification_id; ?>">
               <?php } elseif($value->notif_type == '4') { ?>
                     <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>loads/view_loads?notif=<?php echo $value->notification_id; ?>">
               <?php } else { ?>
                  <a class="notif_link" style="width: 100%;" href="<?php echo base_url(); ?>notifications/index?notif=<?php echo $value->notification_id; ?>">
               <?php } ?>
               <li class="li-item glow-custom" style="<?php if($value->status =='unread') echo "background: rgba(38,185,154,0.16);"; else  echo "background: #EAEAEA;";?>">
                  <span>
                     <span class="header-message-custom"><?= $value->title; ?></span>
                     <span class="time time-message-custom">

                       <?php
                       $datetime1 = strtotime($value->datetime_added);
                       $today = strtotime(date('Y-m-d H:i:s'));

                       $secs = $today - $datetime1;// == <seconds between the two times>
                       $days = $secs / 86400;
                       // echo $secs;
                       // echo "<br>";
                       // echo $days;

                       $dt = new DateTime($value->datetime_added);


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
                     $datetime1 = strtotime($value->datetime_added);
                     $today = strtotime(date('Y-m-d H:i:s'));

                     $secs = $today - $datetime1;// == <seconds between the two times>
                     $days = $secs / 86400;
                     // echo $secs;
                     // echo "<br>";
                     // echo $days;

                     $dt = new DateTime($value->datetime_added);


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
   </div>
</div>
<!-- /page content -->
