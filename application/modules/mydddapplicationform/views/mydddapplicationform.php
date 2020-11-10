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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
         <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor page-title-text">DDD Application Form</h3>
         </div>
         <div class="col-md-7 align-self-center text-right d-none d-md-block">
            <button type="button" class="btn btn-primary step1-btn" data-toggle="modal" data-target="#step1Modal">Step 1 <i class="fa fa-arrow-right"></i> </button>
            <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal">Step 2 <i class="fa fa-arrow-right"></i> </button>
            <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal">Step 3 <i class="fa fa-arrow-right"></i> </button>
            <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal">Step 4 <i class="fa fa-arrow-right"></i> </button>
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
                              <th>Full Name</th>
                              <th>Date Added</th>
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
   <div class="modal fade" id="step1Modal" tabindex="-1" aria-labelledby="step1ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1ModalLabel"><i class="icon-File"></i> DDD Application Form Step 1</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step1") ?>" id="addFileForm">
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Select Services: </label>
                        <div class="col-md-9">
                           <input type="checkbox" id="service1" name="services[]" value="Attendant Care">
                           <label for="service1"> Attendant Care</label><br>
                           <input type="checkbox" id="service2" name="services[]" value="Career Preparation Readiness">
                           <label for="service2"> Career Preparation Readiness</label><br>
                           <input type="checkbox" id="service3" name="service3" value="Center-Based Employment">
                           <label for="service3"> Center-Based Employment</label><br>
                           <input type="checkbox" id="service4" name="service4" value="Day Treatment and Training, Adult">
                           <label for="service4"> Day Treatment and Training, Adult</label><br>
                           <input type="checkbox" id="service5" name="service5" value="Day Treatment and Training, Child (After School)">
                           <label for="service5"> Day Treatment and Training, Child (After School)</label><br>
                           <input type="checkbox" id="service6" name="service6" value="Day Treatment and Training, Child (Summer)">
                           <label for="service6"> Day Treatment and Training, Child (Summer)</label><br>
                           <input type="checkbox" id="service7" name="service7" value="Employment Support Aid">
                           <label for="service7"> Employment Support Aid</label><br>
                           <input type="checkbox" id="service8" name="service8" value="Group Supported Employment">
                           <label for="service8"> Group Supported Employment</label><br>
                           <input type="checkbox" id="service9" name="service9" value="Habilitation, Consultation">
                           <label for="service9"> Habilitation, Consultation</label><br>
                           <input type="checkbox" id="service10" name="service10" value="Habilitation, Early Childhood Autism Specialized">
                           <label for="service10"> Habilitation, Early Childhood Autism Specialized</label><br>
                           <!--<input type="checkbox" id="service11" name="service11" value="Habilitation, Group Home">
                           <label for="service11"> Habilitation, Group Home</label><br>
                           <input type="checkbox" id="service12" name="service12" value="Habilitation, Hourly Support">
                           <label for="service12"> Habilitation, Hourly Support</label><br>
                           <input type="checkbox" id="service13" name="service13" value="Habilitation, Individually Designed Living Arrangement">
                           <label for="service13"> Habilitation, Individually Designed Living Arrangement</label><br>
                           <input type="checkbox" id="service14" name="service14" value="Habilitation, Music">
                           <label for="service14"> Habilitation, Music</label><br>
                           <input type="checkbox" id="service15" name="service15" value="Habilitation, Nursing Supported Group Home">
                           <label for="service15"> Habilitation, Nursing Supported Group Home</label><br>
                           <input type="checkbox" id="service16" name="service16" value="Habilitation, Vendor Supported Developmental Home (Child and Adult)">
                           <label for="service16"> Habilitation, Vendor Supported Developmental Home (Child and Adult)</label><br>
                           <input type="checkbox" id="service17" name="service17" value="Home Health Aid">
                           <label for="service17"> Home Health Aid</label><br>
                           <input type="checkbox" id="service18" name="service18" value="Homemaker">
                           <label for="service18"> Homemaker</label><br>
                           <input type="checkbox" id="service19" name="service19" value="Individual Supported Employment">
                           <label for="service19"> Individual Supported Employment</label><br>
                           <input type="checkbox" id="service20" name="service20" value="Nursing">
                           <label for="service20"> Nursing</label><br>
                           <input type="checkbox" id="service21" name="service21" value="Occupational Therapy">
                           <label for="service21"> Occupational Therapy</label><br>
                           <input type="checkbox" id="service22" name="service22" value="Physical Therapy">
                           <label for="service22"> Physical Therapy</label><br>
                           <input type="checkbox" id="service23" name="service23" value="Respiratory Therapy">
                           <label for="service23"> Respiratory Therapy</label><br>
                           <input type="checkbox" id="service24" name="service24" value="Respite">
                           <label for="service24"> Respite</label><br>
                           <input type="checkbox" id="service25" name="service25" value="Speech Therapy">
                           <label for="service25"> Speech Therapy</label><br>
                           <input type="checkbox" id="service26" name="service26" value="Transition to Employment">
                           <label for="service26"> Transition to Employment</label><br>
                           <input type="checkbox" id="service27" name="service27" value="Transportation">
                           <label for="service27"> Transportation</label><br><br> -->
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website</label>
                        <div class="col-md-9">
                           <input type="radio" id="website_yes" name="website" value="Yes" required>
                           <label for="website_yes">Yes</label><br>
                           <input type="radio" id="website_no" name="website" value="No">
                           <label for="website_no">No</label><br>
                        </div>
                     </div>
                  </div>

                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency</label>
                        <div class="col-md-9">
                           <input type="radio" id="agency_yes" name="agency" value="Yes" required>
                           <label for="agency_yes">Yes</label><br>
                           <input type="radio" id="agency_no" name="agency" value="No">
                           <label for="agency_no">No</label><br>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary submit-step1-btn">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Modal End-->

   <!--Edit File Modal -->
   <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>managefiles/update_file">
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
                        <!-- <input type="file" name="file_upload" id="file_upload" class="form-control" placeholder="file_name"> -->
                        <input type="file" size="20" id="file_upload" name="file_upload" class="form-control" required="">
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

<script type="text/javascript">
   $(document).ready(function() {
      $('#submit-step1-btn').click(function() {
         checked = $("input[type=checkbox]:checked").length;

         if (!checked) {
            alert("You must check at least one checkbox.");
            return false;
         }

      });
   });
</script>