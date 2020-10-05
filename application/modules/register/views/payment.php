
<title>Payment Overview</title>
<div class="preloader">
       <div class="loader">
           <div class="loader__figure"></div>
           <p class="loader__label">Admin Wrap</p>
       </div>
   </div>
   <!-- ============================================================== -->
   <!-- Main wrapper - style you can find in pages.scss -->
   <!-- ============================================================== -->
   <section id="wrapper">
       <div class="login-register">
           <div class="register-box card">
               <div class="register-card-body">
                   <div class="logo-main">
                       <img class="main_logo" src="<?=base_url("assets/images/logo.png")?>" alt="Main Logo">
                       <div class="napacusa_name">
                           <label>NAPACUSA</label>
                       </div>
                   </div>

                   <form class="form-register" id="registerform" method="post" action="<?= base_url("register/register_account");?>">
                       <h3>Payment Overview</h3>
                       <h5>Registration Fee: $50</h5>
                      <hr>
                      <div class="form-row">
                        <div class="col">
                          <label class="name-label">First name: </label><br>
                          <label id="first_name" name="first_name"><?php echo $first_name; ?><label>
                          <input type="hidden" class="form-control" id="first_name" name="first_name" value="<?php echo $username; ?>">
                        </div>
                        <div class="col">
                          <label class="name-label">Last name: </label><br>
                          <label id="last_name" name="last_name"><?php echo $last_name; ?><label>
                          <input type="hidden" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col">
                          <label class="name-label">Username: </label><br>
                          <label id="username" name="username"><?php echo $username; ?><label>
                          <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div class="col">
                          <label class="name-label">Password: </label><br>
                          <label id="password" name="password"><?php echo $password; ?><label>
                          <input type="hidden" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col">
                          <label class="name-label">Address: </label><br>
                          <label id="address" name="address"><?php echo $address; ?><label>
                          <input type="hidden" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                          <div class="col">
                            <label class="name-label">Email</label><br>
                            <label id="email" name="email"><?php echo $email; ?><label>
                            <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                          </div>
                          <div class="col">
                            <label class="name-label">Gender</label><br>
                            <label id="gender" name="gender"><?php echo $gender; ?><label>
                            <select class="custom-select" id="gender" name="gender" value="<?php echo $gender; ?>" hidden>
                          </div>
                      </div>
                      <input type="hidden" id="user_type" name="user_type">
                      <input type="hidden" id="user_status" name="user_status">
                      <input type="hidden" id="is_logged" name="is_logged">
                      <iframe src="http://localhost/napac/assets/paypal_form/paypal_donation.php" width="600" height="500"></iframe>
                    </form>


               </div>
           </div>
       </div>
   </section>
