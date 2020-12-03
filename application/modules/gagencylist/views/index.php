<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
           <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor page-title-text">Government Agency List</h3>
           </div>
           <div class="col-md-7 align-self-center text-right center-container">
             <button type="button" class="btn btn-btn-mod blue-btn" style="color: white;" data-toggle="modal" data-target="#addAgency"><i class="fa fa-plus-circle"></i> Create New Agency</button>
         </div>
      </div>
      <div class="row">
           <div class="col-12 col-12-no-padding">
               <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                       <table id="gagencylist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                         <thead>
                             <tr>
                                 <th>Image</th>
                                 <th>Name</th>
                                 <th>Actions</th>
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
   <div class="modal fade" id="addAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Add New Agency</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="add_technician_form" action="<?php echo base_url(); ?>userlist/add_user" method="post">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-12" style="text-align: center;">
                   <label for="image">Image</label>
                   <input type="file" name="fileToUpload" class="form-control" id="image">
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="address">Name</label>
                   <input type="text" class="form-control" name="address" id="address" placeholder="Enter Agency Name" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="description">Description</label>
                     <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter Agency Description" style="width: 100%;" required></textarea>
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
