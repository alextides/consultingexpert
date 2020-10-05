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
               <h3 class="text-themecolor">Profile</h3>

           </div>


       </div>
       <!-- ============================================================== -->
       <!-- End Bread crumb and right sidebar toggle -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- Info box -->
       <!-- ============================================================== -->
       <div class="row">
           <div class="col-md-12">
                   <div class="card">
   <div class="card-body">
       <?php
           $user = $this->session->userdata();
       ?>
       <form class="form-material m-t-40" method="post" id="profileform" action="<?= base_url("employee/update_user_profile");?>">
           <input type="hidden" name="user_id" value="<?=$user["user_id"]?>">
           <input type="hidden" name="is_admin" value="true">
           <div class="row">
               <div class="col-md-4">
                   <div class="form-group">
                       <label>First Name </label>
                       <input value="<?=$user["first_name"]?>" name="first_name" type="text" class="form-control form-control-line" required>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label>Last Name </label>
                       <input value="<?=$user["last_name"]?>" name="last_name" type="text" class="form-control form-control-line" required>
                   </div>
               </div>
               <div class="col-md-4"> </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label>Username </label>
                       <input value="<?=$user["username"]?>" name="username" type="text" class="form-control form-control-line" required>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label>Password </label>
                       <input value="<?=$user["password"]?>" name="password" type="password" class="form-control form-control-line" required>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" required class="form-control">
                           <option value="">Please select.</option>
                           <option <?=$user["gender"] == "Male" ? "selected" :"" ?> value="Male">Male</option>
                           <option <?=$user["gender"] == "Female" ? "selected" :"" ?> value="Female">Female</option>
                       </select>
                   </div>
               </div>
                <div class="col-md-4">
                   <div class="form-group">
                       <label>Email </label>
                       <input value="<?=$user["email"]?>" name="email" type="email" class="form-control form-control-line" required>
                   </div>
               </div>
              <div class="col-md-8">
                   <div class="form-group">
                       <label>Addess </label>
                       <input  value="<?=$user["address"]?>" name="address"  type="text" class="form-control form-control-line" required>
                   </div>
               </div>
               <div class="col-md-12">
                   <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
               </div>

           </div>


           </form>
       </div>
   </div>
           </div>

       </div>

   </div>
   <!-- ============================================================== -->
   <!-- End Container fluid  -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- footer -->
   <!-- ============================================================== -->
   <footer class="footer">
      Better Life Home Care Group
   </footer>
   <!-- ============================================================== -->
   <!-- End footer -->
   <!-- ============================================================== -->
</div>
