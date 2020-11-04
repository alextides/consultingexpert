 <style>
     .main_logo_new {
         width: 350px;
         display: block;
         margin: 0 auto;
     }

     .Login-title {
         text-align: center;
         margin-bottom: 30px;
         margin-top: -20px;
     }

     .login-box {
         width: 470px;
     }

     .form-control.login_input {
         padding: 30px;
         margin-bottom: 5px;
         background: #f2f2f2;
     }

     .card-body {
         border-radius: 27px !important;
     }

     .login-box.card {
         border-radius: 27px;
     }

     .btn.btn-block.btn-lg.btn-info.btn-rounded {
         height: 62px;
     }
 </style>
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
         <div class="login-box card">
             <div class="card-body">
                 <form class="form-horizontal form-material" id="loginform" method="post" action="<?= base_url("login/login_account"); ?>">
                     <div class="form-group">
                         <div class="col-xs-12">
                             <a href="https://www.consulting-experts.com/"><img class="main_logo_new" src="<?= base_url("assets/images/main-logo-new.jpg") ?>" alt="Main Logo"></a>
                         </div>
                     </div>
                     <div class="Login-title">
                         <h1>Login</h1>
                     </div>
                     <div class="form-group ">
                         <div class="col-xs-12">
                             <input class="form-control login_input" type="text" required="" name="username" placeholder="Username"> </div>
                         <!-- </div>
                     <div class="form-group"> -->
                         <div class="col-xs-12">
                             <input class="form-control login_input" type="password" required="" name="password" placeholder="Password"> </div>
                     </div>

                     <div class="form-group text-center ">
                         <div class="col-xs-12 p-b-20">
                             <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                             <div class="register-link">Doesn't have an account yet? <a href="register">Register</a></div>
                         </div>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </section>