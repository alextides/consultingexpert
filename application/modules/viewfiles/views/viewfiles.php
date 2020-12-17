<style>
   .btn.btn-primary.addfile-btn {
      background: #0f66bd;
   }

   .btn.btn-primary.uploadfile-btn {
      background: #0f66bd;
   }

   .btn.btn-primary.update_file {
      background: #0f66bd;
   }

   .btn.btn-danger.btn-xs.delete_file {
      background: #0b4d8e;
      border: none;
   }

   .btn.btn-success.btn-xs.edit_file {
      background: #1380ec;
      border: none;
   }
</style>
<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
         <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor page-title-text">View Files</h3>
         </div>
         <div class="col-md-7 align-self-center text-right d-none d-md-block">
            <!-- <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal"><i class="fa fa-plus-circle"></i> Add File</button> -->
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-12-no-padding">
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="filelist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                        <thead>
                           <tr>
                              <th>File Title</th>
                              <th>File</th>
                              <th>Date Uploaded</th>
                              <!-- <th>Assigned To</th> -->
                              <th>Action</th>
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

   <!--Add File Modal -->
   <div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addFileModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="addFileModalLabel"><i class="icon-File"></i> Upload File</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= base_url("managefiles/upload_file") ?>" id="addFileForm">
               <input id="user_id" type="hidden" name="user_id" value="">
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label">File Title: </label>
                        <div class="col-md-10">
                           <input type="text" id="add_file_title" name="add_file_title" class="form-control" placeholder="Input file title" required="">
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label">Add File: </label>
                        <div class="col-md-10">
                           <input type="file" size="20" id="file_upload" name="file_upload" class="form-control" required="">
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label">Assign To: </label>
                        <div class="col-md-10">
                           <select class="custom-select" id="assign_file" name="assign_file" required>
                              <option selected disabled value="">Select User</option>
                              <?php foreach ($users as $row) { ?>
                                 <option id="assign_file" name="assign_file" value="<?php echo $row['user_id']; ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary uploadfile-btn">Upload File</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Modal End-->

   <!--Edit File Modal -->
   <form id="editFilesForm" method="post" action="<?php echo base_url(); ?>managefiles/update_file">
      <div class="modal fade" id="editFileModal" tabindex="-1" aria-labelledby="editFileModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editFileModalLabel"><i class="icon-File"></i> View File</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <input id="file_id" type="hidden" name="file_id" value="">
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">File Title: </label>
                     <div class="col-md-10">
                        <input type="text" name="file_title" id="file_title" class="form-control" required disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">File:</label>
                     <div class="col-md-10">
                        <input type="text" name="file" id="file" class="form-control" disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Date:</label>
                     <div class="col-md-10">
                        <input type="text" name="date_uploaded" id="date_uploaded" class="form-control" disabled>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->
   </form>

</div>