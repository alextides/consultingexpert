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
            <button type="button" class="btn btn-primary step2-btn" data-toggle="modal" data-target="#step2Modal">Step 2 <i class="fa fa-arrow-right"></i> </button>
            <button type="button" class="btn btn-primary step3-btn" data-toggle="modal" data-target="#step3Modal">Step 3 <i class="fa fa-arrow-right"></i> </button>
            <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal">Step 4 <i class="fa fa-arrow-right"></i> </button>
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-12-no-padding">
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="dddapplication_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
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

   <!--step1Modal Modal -->
   <div class="modal fade" id="step1Modal" tabindex="-1" aria-labelledby="step1ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1ModalLabel"><i class="icon-File"></i> DDD Application Form Step 1</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step1") ?>" id="step1Form">
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Select Services: </label>
                        <div class="col-md-9">
                           <input type="checkbox" id="service1" name="services[]" value="Attendant Care">
                           <label for="service1"> Attendant Care</label><br>
                           <input type="checkbox" id="service2" name="services[]" value="Career Preparation Readiness">
                           <label for="service2"> Career Preparation Readiness</label><br>
                           <input type="checkbox" id="service3" name="services[]" value="Center-Based Employment">
                           <label for="service3"> Center-Based Employment</label><br>
                           <input type="checkbox" id="service4" name="services[]" value="Day Treatment and Training, Adult">
                           <label for="service4"> Day Treatment and Training, Adult</label><br>
                           <input type="checkbox" id="service5" name="services[]" value="Day Treatment and Training, Child (After School)">
                           <label for="service5"> Day Treatment and Training, Child (After School)</label><br>
                           <input type="checkbox" id="service6" name="services[]" value="Day Treatment and Training, Child (Summer)">
                           <label for="service6"> Day Treatment and Training, Child (Summer)</label><br>
                           <input type="checkbox" id="service7" name="services[]" value="Employment Support Aid">
                           <label for="service7"> Employment Support Aid</label><br>
                           <input type="checkbox" id="service8" name="services[]" value="Group Supported Employment">
                           <label for="service8"> Group Supported Employment</label><br>
                           <input type="checkbox" id="service9" name="services[]" value="Habilitation, Consultation">
                           <label for="service9"> Habilitation, Consultation</label><br>
                           <input type="checkbox" id="service10" name="services[]" value="Habilitation, Early Childhood Autism Specialized">
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
   <!--step1Modal End-->

   <!--step2Modal Modal -->
   <div class="modal fade" id="step2Modal" tabindex="-1" aria-labelledby="step2ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step2ModalLabel"><i class="icon-File"></i> DDD Application Form Step 2</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step2") ?>" id="step2Form">
               <div class="modal-body">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website Quote: </label>
                        <div class="col-md-9">
                           <?php foreach ($quote as $row) {  ?>
                              <input type="text" class="form-control" disabled id="website_quote" name="website_quote" value="<?php echo $row['website_quote']; ?>">
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency Quote</label>
                        <div class="col-md-9">
                           <?php foreach ($quote as $row) {  ?>
                              <input type="text" class="form-control" disabled id="website_quote" name="website_quote" value="<?php echo $row['agency_quote']; ?>">
                           <?php } ?>
                        </div>
                     </div>
                  </div>

                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website Invoice</label>
                        <div class="col-md-9">
                           <?php foreach ($quote as $row) {  ?>
                              <input type="text" class="form-control" disabled id="website_quote" name="website_quote" value="<?php echo $row['website_invoice']; ?>">
                           <?php } ?>
                           <button type="submit" class="btn btn-primary update_file">Download Invoice</button>
                        </div>
                     </div>
                  </div>

                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency Invoice</label>
                        <div class="col-md-9">
                           <?php foreach ($quote as $row) {  ?>
                              <input type="text" class="form-control" disabled id="website_quote" name="website_quote" value="<?php echo $row['agency_invoice']; ?>">
                           <?php } ?>
                           <button type="submit" class="btn btn-primary update_file">Download Invoice</button>
                        </div>
                     </div>
                  </div>

                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                           <a class='btn btn-success' href='http://localhost/Projects/ConsultingExperts/consultingexpert/paymentinvoice' target='_blank' style="float: right">Click here to Pay!</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary submit-step1-btn">Done</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>

            </form>
         </div>
      </div>
   </div>
   <!--step2Modal End-->



   <!--step3Modal Start-->
   <div class="modal fade" id="step3Modal" tabindex="-1" role="dialog" aria-labelledby="step3ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step3ModalLabel"><i class="icon-File"></i> DDD Application Form Step 3</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step3") ?>" id="step3Form">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Paid Invoice: </label>
                        <div class="col-md-9">
                           <?php foreach ($paid_invoice as $row) {  ?>
                              <input type="text" class="form-control" disabled id="paid_invoice" name="paid_invoice" value="<?php echo $row['upload_paid_invoice']; ?>">
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['upload_paid_invoice']; ?>" download>View Invoice</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Website Questionnaire</label>
                           <input type="file" class="form-control" id="website_questionnaire" name="website_questionnaire" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Website Logo</label>
                           <input type="file" class="form-control" id="website_logo" name="website_logo" required>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency First Name 1:</label>
                           <input type="text" class="form-control" id="agency_first_name1" name="agency_first_name1" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Last Name 1:</label>
                           <input type="text" class="form-control" id="agency_last_name1" name="agency_last_name1" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency First Name 2:</label>
                           <input type="text" class="form-control" id="agency_first_name2" name="agency_first_name2" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Last Name 2:</label>
                           <input type="text" class="form-control" id="agency_last_name2" name="agency_last_name2" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">Agency Name 1:</label>
                           <input type="text" class="form-control" id="agency_name1" name="agency_name1" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Name 2:</label>
                           <input type="text" class="form-control" id="agency_name2" name="agency_name2" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Name 3:</label>
                           <input type="text" class="form-control" id="agency_name3" name="agency_name3" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Address 1:</label>
                           <input type="text" class="form-control" id="agency_address1" name="agency_address1" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Address 2:</label>
                           <input type="text" class="form-control" id="agency_address2" name="agency_address2" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">City:</label>
                           <input type="text" class="form-control" id="agency_city" name="agency_city" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">State</label>
                           <input type="text" class="form-control" id="agency_state" name="agency_state" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Zip:</label>
                           <input type="number" class="form-control" id="agency_zip" name="agency_zip" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">Tax Year 1:</label>
                           <input type="file" class="form-control" id="agency_tax_year1" name="agency_tax_year1" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Tax Year 2:</label>
                           <input type="file" class="form-control" id="agency_tax_year2" name="agency_tax_year2" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Tax Year 3:</label>
                           <input type="file" class="form-control" id="agency_tax_year3" name="agency_tax_year3" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Resume:</label>
                           <input type="file" class="form-control" id="agency_resume" name="agency_resume" required>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Bank Statement:</label>
                           <input type="file" class="form-control" id="agency_bank_statement" name="agency_bank_statement" required>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
               <button type="submit" class="btn btn-primary submit-step3-btn">Submit</button>
            </div>
            </form>
         </div>
      </div>
   </div>
   <!--step3Modal End-->

   <!-- STEP 1 MODAL details -->
   <div class="modal fade" id="step1_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 1 Details</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>mydddapplicationform/update_file">
                  <input id="file_id" type="hidden" name="file_id" value="">
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Selected Services: </label>
                     <div class="col-md-10">
                        <input type="text" name="services" id="services" class="form-control" required disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Website:</label>
                     <div class="col-md-10">
                        <input type="text" name="website" id="website" class="form-control" disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-2 col-form-label">Agency</label>
                     <div class="col-md-10">
                        <input type="text" id="agency" name="agency" class="form-control" required="" disabled>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
               <button type="submit" class="btn btn-primary update_file">Close</button>
               <input type="hidden" name="file_id" id="file_id">
            </div>
         </div>
      </div>
   </div>
   <!-- Modal End-->
   </form>

   <!-- STEP 2 MODAL details-->
   <div class="modal fade" id="step2_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 2 Details</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>mydddapplicationform/update_file">
                  <input id="file_id" type="hidden" name="file_id" value="">
                  <div class="form-group row">
                     <label class="col-md-3 col-form-label">Paid Website: </label>
                     <div class="col-md-9">
                        <input type="text" name="paid_website_quote" id="paid_website_quote" class="form-control" required disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-3 col-form-label">Paid Agency::</label>
                     <div class="col-md-9">
                        <input type="text" name="paid_agency_quote" id="paid_agency_quote" class="form-control" disabled>
                     </div>
                  </div>
                  <div class="form-group row" style="float: right">
                     <label class="col-md-4 col-form-label">Total Paid:</label>
                     <div class="col-md-12">
                        <input type="text" id="total_paid" name="total_paid" class="form-control" required="" disabled>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
               <button type="submit" class="btn btn-primary update_file">Close</button>
               <input type="hidden" name="file_id" id="file_id">
            </div>
         </div>
      </div>
   </div>
   <!-- Modal End-->
   </form>

   <!-- STEP 3 MODAL details -->
   <div class="modal fade" id="step3_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 3 Details</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>mydddapplicationform/update_file">
                  <div class="form-group ">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Paid Invoice: </label>
                        <div class="col-md-9">
                           <?php foreach ($quote as $row) {  ?>
                              <input type="text" class="form-control" disabled id="website_quote" name="website_quote" value="invoice.txt">
                              <button type="submit" class="btn btn-primary update_file">View Invoice</button>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Website Questionnaire</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="website_questionnaire_info" name="website_questionnaire_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['website_questionnaire']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Website Logo</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="website_logo_info" name="website_logo_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['website_logo']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency First Name 1:</label>
                           <input type="text" class="form-control" id="agency_first_name1_info" name="agency_first_name1_info" required disabled>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Last Name 1:</label>
                           <input type="text" class="form-control" id="agency_last_name1_info" name="agency_last_name1_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency First Name 2:</label>
                           <input type="text" class="form-control" id="agency_first_name2_info" name="agency_first_name2_info" required disabled>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Last Name 2:</label>
                           <input type="text" class="form-control" id="agency_last_name2_info" name="agency_last_name2_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">Agency Name 1:</label>
                           <input type="text" class="form-control" id="agency_name1_info" name="agency_name1_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Name 2:</label>
                           <input type="text" class="form-control" id="agency_name2_info" name="agency_name2_info" required disabled>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Agency Name 3:</label>
                           <input type="text" class="form-control" id="agency_name3_info" name="agency_name3_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Address 1:</label>
                           <input type="text" class="form-control" id="agency_address1_info" name="agency_address1_info" required disabled>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Address 2:</label>
                           <input type="text" class="form-control" id="agency_address2_info" name="agency_address2_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">City:</label>
                           <input type="text" class="form-control" id="agency_city_info" name="agency_city_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">State</label>
                           <input type="text" class="form-control" id="agency_state_info" name="agency_state_info" required disabled>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Zip:</label>
                           <input type="number" class="form-control" id="agency_zip_info" name="agency_zip_info" required disabled>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-12">
                           <label class="col-form-label">Tax Year 1:</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="agency_tax_year1_info" name="agency_tax_year1_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year1']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Tax Year 2:</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="agency_tax_year2_info" name="agency_tax_year2_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year2']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Tax Year 3:</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="agency_tax_year3_info" name="agency_tax_year3_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year3']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="col-md-6">
                           <label class="col-form-label">Resume:</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="agency_resume_info" name="agency_resume_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_resume']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                        <div class="col-md-6">
                           <label class="col-form-label">Bank Statement:</label>
                           <?php foreach ($step3_files as $row) {  ?>
                              <input type="text" class="form-control" id="agency_bank_statement_info" name="agency_bank_statement_info" required disabled>
                              <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_bank_statement']; ?>" download>Download File</a>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
               <button type="submit" class="btn btn-primary update_file">Close</button>
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