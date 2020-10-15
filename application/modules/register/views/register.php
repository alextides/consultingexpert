<style>
  .login-box.card {
    width: 664px;
    margin-top: -120px;
  }

  .panel-title {
    text-align: center;
    padding: 28px;
    background: skyblue;
    color: white;
    font-size: 20px;
    font-weight: bold;
    background: linear-gradient(180deg, #187abe 19%, #1d95e9 108%);
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
      <div class="panel-heading">
        <div class="panel-title">Registration for Consulting Expert LLC</div>
      </div>
      <div class="card-body">
        <form class="form-horizontal form-material" id="registerform" method="post" action="<?= base_url("register/register_account"); ?>">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="first_name">First name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="filast_name">Last name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="email_address">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="" required>
            </div>
          </div>
          <div class="form-row">
            <!-- <div class="col-md-6 mb-3">
              <label for="gender">Gender</label>
              <select class="custom-select" id="gender" name="gender" required>
                <option selected disabled value="">Choose Gender</option>
                <option id="gender" name="gender">Male</option>
                <option id="gender" name="gender">Female</option>
              </select>
            </div> -->
            <div class="col-md-12 mb-3">
              <label for="city">Phone</label>
              <input type="number" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="col-md-12 mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
          </div>
          <!-- <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select" id="state" name="state" required>
                <option selected disabled value="">Choose State</option>
                <option id="state" name="state">United State</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip_code">City</label>
              <input type="text" class="form-control" id="city" name="city" value="" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="zip_code">Zip Code</label>
              <input type="text" class="form-control" id="zip_code" name="zip_code" value="" required>
            </div>
          </div> -->
          <div class="form-group text-center ">
            <div class="col-xs-12 p-b-20 " style="margin-top:20px;">
              <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Register</button>
              <div class="register-link">Already have an account? <a href="login">Login</a></div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>