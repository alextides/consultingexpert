<style>
    .public-private-profile {
        text-align: end;
    }

    .update-profile-btn.btn {
        background: #0052cc;
        color: white;
        float: right;
    }

    .file-profile {
        position: relative;
        overflow: hidden;
    }

    .btn-file-profile {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .btn.file-profile {
        background: #0052cc;
        color: white;
        width: 100%;
    }

    .profile-pic-display {
        margin-bottom: 22px;
    }

    .profile-image {
        display: block;
        margin: 0 auto;
        border-radius: 100%;
    }
</style>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Account Information</h3>

            </div>


        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-pic-display">
                            <img src="<?= base_url() ?>assets/images/prof.jpg" alt="homepage" class="profile-image" />
                        </div>
                        <span class="btn file-profile">
                            Add Photo<input type="file" class="btn-file-profile">
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <?php $user = $this->session->userdata(); ?>
                        <form class="form-material m-t-40" method="post" id="profileform" action="<?= base_url("user/update_profile"); ?>">
                            <?php foreach ($user_info as $row) { ?>
                                <div class="row">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name </label>
                                                <input name="first_name" value="<?php echo $row['first_name']; ?>" type="text" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_first_name" name="public_private" value="Public Account">
                                                    <label for="public_first_name" class="label-public">Public</label>
                                                    <input type="radio" id="private_first_name" name="public_private" value="Private Account">
                                                    <label for="private_first_name">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 lastname">
                                            <div class="form-group">
                                                <label>Last Name </label>
                                                <input name="last_name" value="<?php echo $row['last_name']; ?>" type="text" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_last_name" name="public_private" value="Public Account">
                                                    <label for="public_last_name" class="label-public">Public</label>
                                                    <input type="radio" id="private_last_name" name="public_private" value="Private Account">
                                                    <label for="private_last_name">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email Address </label>
                                                <input name="email" value="<?php echo $row['email']; ?>" type="email" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_email" name="public_private" value="Public Account">
                                                    <label for="public_email" class="label-public">Public</label>
                                                    <input type="radio" id="private_email" name="public_private" value="Private Account">
                                                    <label for="private_email">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username </label>
                                                <input name="username" value="<?php echo $row['username']; ?>" type="text" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_username" name="public_private" value="Public Account">
                                                    <label for="public_username" class="label-public">Public</label>
                                                    <input type="radio" id="private_username" name="public_private" value="Private Account">
                                                    <label for="private_username">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password </label>
                                                <input name="password" value="<?php echo $row['password']; ?>" type="password" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_password" name="public_private" value="Public Account">
                                                    <label for="public_password" class="label-public">Public</label>
                                                    <input type="radio" id="private_password" name="public_private" value="Private Account">
                                                    <label for="private_password">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control">
                                                    <option value="<?php echo $row['gender']; ?>" selected disabled hidden><?php echo $row['gender']; ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_gender" name="public_private" value="Public Account">
                                                    <label for="public_gender" class="label-public">Public</label>
                                                    <input type="radio" id="private_gender" name="public_private" value="Private Account">
                                                    <label for="private_gender">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone </label>
                                                <input name="contact_number" value="<?php echo $row['contact_number']; ?>" type="number" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_phone" name="public_private" value="Public Account">
                                                    <label for="public_phone" class="label-public">Public</label>
                                                    <input type="radio" id="private_phone" name="public_private" value="Private Account">
                                                    <label for="private_phone">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select name="state" class="form-control">
                                                    <option value="<?php echo $row['state']; ?>" disabled selected hidden><?php echo $row['state']; ?></option>
                                                    <option value="United State">United State</option>
                                                    <option value="Philippines">Philippines</option>
                                                </select>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_state" name="public_private" value="Public Account">
                                                    <label for="public_state" class="label-public">Public</label>
                                                    <input type="radio" id="private_state" name="public_private" value="Private Account">
                                                    <label for="private_state">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City </label>
                                                <input name="city" value="<?php echo $row['city']; ?>" type="text" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_city" name="public_private" value="Public Account">
                                                    <label for="public_city" class="label-public">Public</label>
                                                    <input type="radio" id="private_city" name="public_private" value="Private Account">
                                                    <label for="private_city">Private</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Zip Code </label>
                                                <input name="zip_code" value="<?php echo $row['zip_code']; ?>" type="number" class="form-control form-control-line" required>
                                                <div class="public-private-profile">
                                                    <input type="radio" id="public_zip_code" name="public_private" value="Public Account">
                                                    <label for="public_zip_code" class="label-public">Public</label>
                                                    <input type="radio" id="private_zip_code" name="public_private" value="Private Account">
                                                    <label for="private_zip_code">Private</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="update-profile-btn btn"><i class="fa fa-check"></i> Update Profile<?php echo $row['email']; ?></button>
                                        </div>
                                    </div>
                                <?php } ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>