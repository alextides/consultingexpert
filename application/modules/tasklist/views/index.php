<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
           <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor page-title-text">Task List</h3>
           </div>
           <div class="col-md-7 align-self-center text-right center-container">
             <button type="button" class="btn btn-primary blue-btn add-technician" data-id="1"><i class="fa fa-plus-circle"></i> Create New User</button>
             <!-- <button type="button" class="btn btn-btn-mod" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus-circle"></i> Create New Technician</button> -->
         </div>
      </div>
      <div class="row">
           <div class="col-12 col-12-no-padding">
               <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                       <table id="tasklist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                         <thead>
                             <tr>
                                 <th>Form Type</th>
                                 <th>Owner</th>
                                 <th>Date & Time Created</th>
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
               <button type="submit" class="btn btn-primary blue-btn">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

</div>
