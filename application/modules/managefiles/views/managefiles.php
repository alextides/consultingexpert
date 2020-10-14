<style>
   .btn.btn-primary.addfile-btn {
      background: #0f66bd;
   }

   .btn.btn-primary.uploadfile-btn {
      background: #0f66bd;
   }
</style>
<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
         <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor page-title-text">Manage Files</h3>
         </div>
         <div class="col-md-7 align-self-center text-right d-none d-md-block">
            <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal"><i class="fa fa-plus-circle"></i> Add File</button>
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
                              <th>File Name</th>
                              <th>Date Uploaded</th>
                              <th>Uploaded By</th>
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
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="file" size="20" id="file_upload" name="file_upload" class="form-control" required="">
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
   <form id="editFilesForm" method="post">
      <div class="modal fade" id="editFileModal" tabindex="-1" aria-labelledby="editFileModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editFileModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">File Name*</label>
                     <div class="col-md-10">
                        <input type="text" name="file_name" id="file_name" class="form-control" placeholder="file_name" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Date Uploaded*</label>
                     <div class="col-md-10">
                        <input type="text" name="date_uploaded" id="date_uploaded" class="form-control" placeholder="date_uploaded" required>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Uploaded By*</label>
                     <div class="col-md-10">
                        <input type="text" name="uploaded_by" id="uploaded_by" class="form-control" placeholder="uploaded_by" required>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                  <input type="hidden" name="file_id" id="file_id" class="form-control">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->
   </form>

</div>