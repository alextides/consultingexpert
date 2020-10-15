<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
           <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor page-title-text">User List</h3>
           </div>
           <div class="col-md-7 align-self-center text-right center-container">
             <button type="button" class="btn btn-btn-mod add-technician" data-id="1"><i class="fa fa-plus-circle"></i> Create New User</button>
             <!-- <button type="button" class="btn btn-btn-mod" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus-circle"></i> Create New Technician</button> -->
         </div>
      </div>
      <div class="row">
           <div class="col-12 col-12-no-padding">
               <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                       <table id="userlist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                         <thead>
                             <tr>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Address</th>
                                 <th>Contact Number</th>
                                 <th>Email Address</th>
                                 <th>Status</th>
                                 <?php if($this->session->userdata('type') != 'admin'){  ?>
                                   <th>Actions</th>
                                 <?php } ?>
                             </tr>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>
                      </div>
                   </div>
               </div>
           </div>
      </div>
   </div>

   <!-- Add Modal -->
   <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Add New User</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="add_technician_form" action="<?php echo base_url(); ?>userlist/add_user" method="post">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label for="fname">First Name</label>
                   <input type="text" class="form-control" name="fname" id="fname" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" placeholder="Enter first name" required>
                 </div>
                 <div class="form-group col-md-6">
                   <label for="lname">Last Name</label>
                   <input type="text" class="form-control" name="lname" id="lname" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" placeholder="Enter last name" required>
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="address">Address</label>
                   <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="email">Email Address</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required>
                     <span style="color: red; font-size: 13px;"></span>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputContact">Contact Number</label>
                     <input type="text" class="form-control" name="contact" value="<?php if(isset($_POST['contact'])){echo $_POST['contact'];} ?>" id="inputContact" placeholder="Enter contact number" required>
                  </div>
                  <!-- <div class="form-group col-md-6">
                     <label for="usertype">User Type</label>
                     <select id="usertype" name="user_type" class="form-control">
                       <option value="manufacturer" selected>Manufacturer</option>
                       <option value="technician">Technician</option>
                     </select>
                  </div> -->
               </div>
               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="username">Username</label>
                   <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" placeholder="Enter username" required>
                   <span style="color: red; font-size: 13px;"></span>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <div class="input-group">
                       <input type="password" class="form-control display-pw" name="password"  value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" id="password" placeholder="Enter password" required>
                       <div class="input-group-append toggle-password">
                          <div class="input-group-text">
                             <i class="toggle-icon ti-lock"></i>
                          </div>
                       </div>
                    </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" name="add_user" class="btn btn-btn-mod">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>


   <!-- Add Modal -->
   <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Edit User</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="edit_technician_form" action="<?php echo base_url(); ?>userlist/update_user" method="post">
            <div class="modal-body">
               <div class="form-row">
                  <input id="id_value_id" type="hidden" name="id_value_id" value="">
                 <div class="form-group col-md-6">
                   <label for="edit_fname">First Name</label>
                   <input type="text" class="form-control" name="edit_fname" id="edit_fname" value="" required>
                 </div>
                 <div class="form-group col-md-6">
                   <label for="edit_lname">Last Name</label>
                   <input type="text" class="form-control" name="edit_lname" id="edit_lname" value="<?php if(isset($_POST['edit_lname'])){echo $_POST['edit_lname'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="edit_address">Address</label>
                   <input type="text" class="form-control" name="edit_address" id="edit_address" placeh value="<?php if(isset($_POST['edit_address'])){echo $_POST['edit_address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="edit_email">Email Address</label>
                     <input type="email" class="form-control" name="edit_email" id="edit_email" value="<?php if(isset($_POST['edit_email'])){echo $_POST['edit_email'];} ?>" required>
                     <span style="color: red; font-size: 13px;"></span>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="edit_inputContact">Contact Number</label>
                     <input type="text" class="form-control" name="edit_contact" value="<?php if(isset($_POST['edit_contact'])){echo $_POST['edit_contact'];} ?>" id="edit_inputContact" required>
                  </div>
                  <!-- <div class="form-group col-md-6">
                     <label for="usertype">User Type</label>
                     <select id="usertype" name="user_type" class="form-control">
                       <option value="manufacturer" selected>Manufacturer</option>
                       <option value="technician">Technician</option>
                     </select>
                  </div> -->
               </div>
               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="edit_username">Username</label>
                   <input type="text" class="form-control" id="edit_username" name="edit_username" value="<?php if(isset($_POST['edit_username'])){echo $_POST['edit_username'];} ?>" required>
                   <span style="color: red; font-size: 13px;"></span>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="edit_password">Password</label>
                    <div class="input-group">
                       <input type="password" class="form-control display-pw" name="edit_password"  value="<?php if(isset($_POST['edit_password'])){echo $_POST['edit_password'];} ?>" id="edit_password" required>
                       <div class="input-group-append toggle-password">
                          <div class="input-group-text">
                             <i class="toggle-icon ti-lock"></i>
                          </div>
                       </div>
                    </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" name="edit_user" class="btn btn-btn-mod">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

</div>
