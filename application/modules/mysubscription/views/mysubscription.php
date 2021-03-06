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
            <h3 class="text-themecolor page-title-text">Manage Subscription</h3>
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
                     <table id="subscription_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                        <thead>
                           <tr>
                              <th>Full Name</th>
                              <th>Transaction ID</th>
                              <!-- <th>Services</th> -->
                              <th>Paid Amount</th>
                              <th>Date Paid</th>
                              <th>Status</th>
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
   <div class="modal fade" id="ViewSubsModal" tabindex="-1" aria-labelledby="addFileModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="addFileModalLabel"><i class="icon-File"></i> Upload File</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Transaction ID: </label>
                        <div class="col-md-9">
                           <input type="text" id="transaction_id" name="transaction_id" class="form-control" disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Paid Amount: </label>
                        <div class="col-md-9">
                           <input type="text" id="paid_amount" name="paid_amount" class="form-control" placeholder="Input file title" disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Date Paid: </label>
                        <div class="col-md-9">
                           <input type="text" id="date_subscribed" name="date_subscribed" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>


               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
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
                  <h5 class="modal-title" id="editFileModalLabel"><i class="icon-File"></i> Edit File</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <input id="file_id" type="hidden" name="file_id" value="">
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">File Title: </label>
                     <div class="col-md-10">
                        <input type="text" name="file_title" id="file_title" class="form-control" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">File:</label>
                     <div class="col-md-10">
                        <input type="text" name="file" id="file" class="form-control" disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Update File:</label>
                     <div class="col-md-10">
                        <input type="file" name="file_upload" id="file_upload" class="form-control" placeholder="file_name">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Assigned To:</label>
                     <div class="col-md-10">
                        <input type="text" name="fk_user_id" id="fk_user_id" class="form-control" disabled>
                     </div>
                  </div>
                  <!-- <div class="form-group row">
                     <label class="col-md-2 col-form-label">Uploaded By*</label>
                     <div class="col-md-10">
                        <input type="text" name="uploaded_by" id="uploaded_by" class="form-control" placeholder="uploaded_by" required>
                     </div>
                  </div> -->
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary update_file">Update</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->
   </form>

</div>