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
                    <form class="form-horizontal form-material" id="loginform" method="post" action="<?= base_url("login/login_account");?>">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <a href="https://www.consulting-experts.com/"><img class="main_logo" src="<?=base_url("assets/images/main-logo.png")?>" alt="Main Logo"></a>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="username" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password" placeholder="Password"> </div>
                        </div>

                        <div class="form-group text-center ">
                            <div class="col-xs-12 p-b-20 " style="margin-top:20px;">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                                <div class="register-link">Doesn't have an account yet? <a href="register">Register</a></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
