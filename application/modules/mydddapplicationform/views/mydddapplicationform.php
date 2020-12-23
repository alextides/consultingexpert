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

   #pills-tab li a {
      border: 1px solid;
   }

   .nav-item #step1form-tab {
      border-top-left-radius: 20px !important;
      border-bottom-left-radius: 20px !important;
   }

   .nav-item #step1details-tab {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
   }

   .nav-item #step2form-tab {
      border-top-left-radius: 20px !important;
      border-bottom-left-radius: 20px !important;
   }

   .nav-item #step2details-tab {
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
   }

   .btn.btn-primary.btn-lg.step2-btn {
      border-radius: 20px;
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
            <!-- <form name="create_form" id="create_form" method="POST" action="</?= base_url("mydddapplicationform/create_ddd_form") ?>">
               <input type="hidden" name="fk_user_id" id="fk_user_id" value="</?php echo $this->session->userdata('user_details')[0]['fk_user_id']; ?>"> -->
            <a style="background-color: #1065a2; border-color: #1065a2" href="#" data-userid="<?php echo $this->session->userdata('user_details')[0]['fk_user_id']; ?>" class="btn btn-primary btn-lg step2-btn step1">Create DDD Application <i class="fa fa-plus"></i> </a>
            <!-- </form> -->
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

   <!-- STEP 1  -->
   <div class="modal fade" id="step1" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 1</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="step1form-tab" data-toggle="pill" href="#step1form" role="tab" aria-controls="pills-step1form" aria-selected="true">Step 1 Form</a>
                  </li>
                  <!-- <li class="nav-item">
                     <a class="nav-link" id="step1details-tab" data-toggle="pill" href="#step1details" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 1 Details</a>
                  </li> -->
               </ul>

               <div class="tab-content" id="pills-tabContent">
                  <!-- step1 form -->
                  <div class="tab-pane fade show active" id="step1form" role="tabpanel" aria-labelledby="pills-step1form-tab">
                     <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step1") ?>" id="step1Form">
                        <div class="modal-body">
                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Select Services: </label>
                                 <div class="col-md-9">
                                    <input type="hidden" id="user_step1_id" name="user_step1_id"><br>
                                    <input type="text" id="ddd_application_id" name="ddd_application_id"><br>
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
                                    <input type="radio" id="website_yes" name="user_website" value="Yes" required>
                                    <label for="website_yes">Yes</label><br>
                                    <input type="radio" id="website_no" name="user_website" value="No">
                                    <label for="website_no">No</label><br>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Agency</label>
                                 <div class="col-md-9">
                                    <input type="radio" id="agency_yes" name="user_agency" value="Yes" required>
                                    <label for="agency_yes">Yes</label><br>
                                    <input type="radio" id="agency_no" name="user_agency" value="No">
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
                     <!-- step1 form end-->
                  </div>
                  <!--
                  <div class="tab-pane fade" id="step1details" role="tabpanel" aria-labelledby="step1details-tab">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Selected Services: </label>
                        <div class="col-md-9">
                           <input type="text" name="selected_services" id="selected_services" class="form-control" required disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website:</label>
                        <div class="col-md-9">
                           <input type="text" name="website" id="website" class="form-control" disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency</label>
                        <div class="col-md-9">
                           <input type="text" id="agency" name="agency" class="form-control" required="" disabled>
                        </div>
                     </div>
                  </div> -->
               </div>

               <?php foreach ($get_step1_details_status as $row) {
                  // if ($row['step1_status'] == 1 || $row['step1_status'] == 2) {
                  //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1Modal" disabled>Step 1 Form</button>';
                  //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1_details_modal">Step 1 Details </button>';
                  // } else {
                  //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1Modal">Step 1 Form</button>';
                  //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1_details_modal" disabled>Step 1 Details </button>';
                  // }
               }  ?>
               <!--
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1Modal">Step 1 Form</button>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step1_details_modal">Step 1 Details </button> -->
            </div>
            <!-- <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <input type="hidden" name="file_id" id="file_id">
            </div> -->
         </div>
      </div>
   </div>
   <!-- Modal End-->

   <!-- STEP 1 DETAILS -->
   <div class="modal fade" id="step1_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 1</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link" id="step1_details_form-tab" data-toggle="pill" href="#step1_details_form" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 1 Details</a>
                  </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade" id="step1_details_form" role="tabpanel" aria-labelledby="step1_details_form-tab">
                     <!-- step1 details -->
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Selected Services: </label>
                        <div class="col-md-9">
                           <input type="text" name="selected_services" id="selected_services" class="form-control" required disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website:</label>
                        <div class="col-md-9">
                           <input type="text" name="website" id="website" class="form-control" disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency</label>
                        <div class="col-md-9">
                           <input type="text" id="agency" name="agency" class="form-control" required="" disabled>
                        </div>
                     </div>
                     <!-- step1 details end-->
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
   <!--Step 1 Details Modal End-->

   <!-- STEP 2 Form Start -->
   <div class="modal fade" id="step2" tabindex="-1" aria-labelledby="step2_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step2_modalLabel"><i class="icon-File"></i> DDD Application Form Step 2</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="step2form-tab" data-toggle="pill" href="#step2form" role="tab" aria-controls="pills-step1form" aria-selected="true">Step 2 Form</a>
                  </li>
                  <!-- <li class="nav-item">
                     <a class="nav-link" id="step1details-tab" data-toggle="pill" href="#step1details" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 2 Details</a>
                  </li> -->
               </ul>

               <div class="tab-content" id="pills-tabContent">
                  <!-- step1 form -->
                  <div class="tab-pane fade show active" id="step2form" role="tabpanel" aria-labelledby="pills-step1form-tab">
                     <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step2") ?>" id="step2Form">
                        <div class="modal-body">
                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Website Quote: </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="website_quote" name="website_quote" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Agency Quote</label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" disabled id="agency_quote" name="agency_quote">
                                 </div>
                              </div>
                           </div>

                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Website Invoice</label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" disabled id="website_invoice" name="website_invoice">
                                    <a class="btn btn-primary" href="./assets/uploads/website_invoice" id="website_invoice" name="website_invoice" download>View Invoice</a>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label">Agency Invoice</label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" disabled id="agency_invoice" name="agency_invoice">
                                    <a class="btn btn-primary" href="./assets/uploads/agency_invoice" id="website_invoice" name="website_invoice" download>View Invoice</a>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group ">
                              <div class="form-group row">
                                 <label class="col-md-3 col-form-label"></label>
                                 <div class="col-md-9">
                                    <a class='btn btn-success' href='<?= base_url("paymentinvoice") ?>' target='_blank' style="float: right">Click here to Pay!</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <!-- step1 form end-->
                  </div>

                  <!-- <div class="tab-pane fade" id="step1details" role="tabpanel" aria-labelledby="step1details-tab">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Selected Services: </label>
                        <div class="col-md-9">
                           <input type="text" name="selected_services" id="selected_services" class="form-control" required disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website:</label>
                        <div class="col-md-9">
                           <input type="text" name="website" id="website" class="form-control" disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency</label>
                        <div class="col-md-9">
                           <input type="text" id="agency" name="agency" class="form-control" required="" disabled>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--STEP 2 Modal End-->

   <!-- STEP 2 DETAILS -->
   <div class="modal fade" id="step2_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 2 Details</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link" id="step2_details_form-tab" data-toggle="pill" href="#step2_details_form" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 2 Details</a>
                  </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade" id="step2_details_form" role="tabpanel" aria-labelledby="step1_details_form-tab">
                     <!-- step2 details -->
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Paid Website: </label>
                        <div class="col-md-9">
                           <input type="text" name="paid_website_quote" id="paid_website_quote" class="form-control" required disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Paid Agency:</label>
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
                     <!-- step2 details end-->
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
   <!--Step 2 Details Modal End-->

   <!-- STEP 3 Form Start -->
   <div class="modal fade" id="step3" tabindex="-1" aria-labelledby="step3_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step3_modalLabel"><i class="icon-File"></i> DDD Application Form Step 3</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="step2form-tab" data-toggle="pill" href="#step3form" role="tab" aria-controls="pills-step1form" aria-selected="true">Step 3 Form</a>
                  </li>
                  <!-- <li class="nav-item">
                     <a class="nav-link" id="step1details-tab" data-toggle="pill" href="#step1details" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 2 Details</a>
                  </li> -->
               </ul>

               <div class="tab-content" id="pills-tabContent">
                  <!-- step3 form -->
                  <div class="tab-pane fade show active" id="step3form" role="tabpanel" aria-labelledby="pills-step1form-tab">
                     <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step3") ?>" id="step3Form">
                        <input type="hidden" id="form_id_step3" name="form_id" value="">
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
                        <?php foreach ($get_step1_details_status as $row) {  ?>

                           <?php
                           $website = $row['website'];
                           $agency = $row['agency'];
                           if ($website == "Yes" && $agency == "Yes") {
                              echo '
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
                              ';
                           } else if ($website == "Yes" && $agency == "No") {
                              echo '
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
                              ';
                           } else if ($website == "No" && $agency == "Yes") {
                              echo '
                                 <div class="form-group ">
                                    <div class="form-group row">
                                       <div class="col-md-6">
                                          <label class="col-form-label">IRS EIN:</label>
                                          <input type="text" class="form-control" id="irs_ein" name="irs_ein" required>
                                       </div>
                                       <div class="col-md-6">
                                          <label class="col-form-label">Upload IRS EIN:</label>
                                          <input type="file" class="form-control" id="upload_irs_ein" name="upload_irs_ein" required>
                                       </div>
                                    </div>
                                 </div>

                                 <hr>

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
                              ';
                           }
                           ?>
                        <?php } ?>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary submit-step3-btn">Submit</button>
                        </div>
                     </form>
                     <!-- step1 form end-->
                  </div>

                  <!-- <div class="tab-pane fade" id="step1details" role="tabpanel" aria-labelledby="step1details-tab">
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Selected Services: </label>
                        <div class="col-md-9">
                           <input type="text" name="selected_services" id="selected_services" class="form-control" required disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Website:</label>
                        <div class="col-md-9">
                           <input type="text" name="website" id="website" class="form-control" disabled>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Agency</label>
                        <div class="col-md-9">
                           <input type="text" id="agency" name="agency" class="form-control" required="" disabled>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--STEP 3 Modal End-->

   <!-- STEP 3 DETAILS -->
   <div class="modal fade" id="step3_details_modal" tabindex="-1" aria-labelledby="step3_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step3_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 3 Details</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link" id="step3_details_form-tab" data-toggle="pill" href="#step3_details_form" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 3 Details</a>
                  </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade" id="step3_details_form" role="tabpanel" aria-labelledby="step1_details_form-tab">
                     <!-- step3 details -->
                     <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>mydddapplicationform/update_file">
                        <div class="form-group ">
                           <div class="form-group row">
                              <label class="col-md-3 col-form-label">Paid Invoice: </label>
                              <div class="col-md-9">
                                 <input type="text" class="form-control" disabled id="paid_invoice" name="paid_invoice" value="<?php echo $row['upload_paid_invoice']; ?>">
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['upload_paid_invoice']; 
                                                                                    ?>" download><i class="icon-Eye"></i> View Invoice</a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Website Questionnaire</label>
                                 <input type="text" class="form-control" id="website_questionnaire_info" name="website_questionnaire_info" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['website_questionnaire']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Website Logo</label>
                                 <input type="text" class="form-control" id="website_logo_info" name="website_logo_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['website_logo']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
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
                                 <input type="text" class="form-control" id="agency_tax_year1_info" name="agency_tax_year1_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['agency_tax_year1']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Tax Year 2:</label>
                                 <input type="text" class="form-control" id="agency_tax_year2_info" name="agency_tax_year2_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['agency_tax_year2']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Tax Year 3:</label>
                                 <input type="text" class="form-control" id="agency_tax_year3_info" name="agency_tax_year3_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['agency_tax_year3']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Resume:</label>
                                 <input type="text" class="form-control" id="agency_resume_info" name="agency_resume_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php//echo $row['agency_resume']; ?>" download><i class="icon-Download"></i> Download File</a>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Bank Statement:</label>
                                 <input type="text" class="form-control" id="agency_bank_statement_info" name="agency_bank_statement_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['agency_bank_statement']; 
                                                                                    ?>" download><i class="icon-Download"></i> Download File</a>
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
         <!-- step3 details end-->
      </div>
   </div>




   <!-- STEP 4 MODAL -->
   <div class="modal fade" id="step4" tabindex="-1" aria-labelledby="step3_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step3_modalLabel"><i class="icon-File"></i> DDD Application Form Step 4</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="step2form-tab" data-toggle="pill" href="#step3form" role="tab" aria-controls="pills-step1form" aria-selected="true">Step 4 Form</a>
                  </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="step3form" role="tabpanel" aria-labelledby="pills-step1form-tab">

                     <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step4") ?>" id="step3Form">
                        <!-- <div class="form-group ">
                           <div class="form-group row">
                              <label class="col-md col-form-label">Url: </label>
                              <div class="col-md-11">
                                 <input type="text" class="form-control" disabled id="ws_url1" name="ws_url1">
                              </div>
                           </div>
                        </div> -->
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <label class="col-form-label">Select Prototype: </label>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ws_url1" id="prototype1">
                                    <label class="form-check-label" for="prototype1">Testing 1</label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ws_url2" id="prototype2">
                                    <label class="form-check-label" for="prototype2">Testing 2</label>
                                 </div>
                                 <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="ws_url3" id="prototype3">
                                    <label class="form-check-label" for="prototype3">Testing 3</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">IRS EIN:</label>
                                 <input type="text" class="form-control" id="irs_ein" name="irs_ein" disabled>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Uploaded IRS EIN:</label>
                                 <input type="text" class="form-control" id="irs_ein_file" name="irs_ein_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['upload_irs_ein']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Application Submitted:</label>
                                 <input type="text" class="form-control" id="irs_submitted" name="irs_submitted" disabled>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Application Mailed:</label>
                                 <input type="text" class="form-control" id="irs_mailed" name="irs_mailed" disabled>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Application Received:</label>
                                 <input type="text" class="form-control" id="irs_rdate" name="irs_rdate" required disabled>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <label class="col-form-label">Contract Specialist:</label>
                                 <input type="text" class="form-control" id="irs_cspecialist" name="irs_cspecialist" required disabled>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Notice of Incomplete Application:</label>
                                 <input type="text" class="form-control" id="nia_file" name="nia_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['notice_of_incomplete_application']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Due Date:</label>
                                 <input type="text" class="form-control" id="nia_ddate" name="nia_ddate" disabled>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Business Plan:</label>
                                 <input type="text" class="form-control" id="nia_bplan" name="nia_bplan" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['business_plan']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Congtingency Plan:</label>
                                 <input type="text" class="form-control" id="nia_cplan" name="nia_cplan" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['congtingency_plan']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Application Denial:</label>
                                 <input type="text" class="form-control" id="app_denial_file" name="app_denial_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['application_denial']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Revisions Date:</label>
                                 <input type="text" class="form-control" id="ad_rdate" name="ad_rdate" disabled>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Focus Denial Date:</label>
                                 <input type="text" class="form-control" id="ad_rfocus" name="ad_rfocus" disabled>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Resubmitted Focus:(no column)</label>
                                 <input type="text" class="form-control" id="resubmitted_focus" name="resubmitted_focus" disabled>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Mailed Date:</label>
                                 <input type="text" class="form-control" id="ad_mdate" name="ad_mdate" disabled>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Notice of Complete Application:</label>
                                 <input type="text" class="form-control" id="nca_file" name="nca_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['notice_of_complete_application']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Notice of Pre Award:</label>
                                 <input type="text" class="form-control" id="npa_file" name="npa_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['notice_of_pre_award']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Noteice of Pre Award Date:</label>
                                 <input type="text" class="form-control" id="padate" name="padate" value="<?php //echo $row['pre_award_date']; 
                                                                                                            ?>" required disabled>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Notice of Award:</label>
                                 <input type="text" class="form-control" id="na_file" name="na_file" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php //echo $row['notice_of_award']; 
                                                                                    ?>" download><i class="icon-Download"></i></a>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="form-group ">
                           <h1>User Required</h1>
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="col-form-label">Fingerprint Clearance Card:</label>
                                 <input type="file" class="form-control" id="fingerprint_card" name="fingerprint_card" required>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Criminal History Disclosure:</label>
                                 <input type="file" class="form-control" id="criminal_disclosure" name="criminal_disclosure">
                              </div>
                           </div>
                        </div>
                        <div class="form-group ">
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Reference Letter 1:</label>
                                 <input type="file" class="form-control" id="reference1" name="reference1">
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Reference Letter 2:</label>
                                 <input type="file" class="form-control" id="reference2" name="reference2">
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Reference Letter 3:</label>
                                 <input type="file" class="form-control" id="reference3" name="reference3">
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary submit-step4-btn" name="submits4">Submit</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- STEP 4 MODAL END -->

</div>
</div>
</div>
</div>
<!--Step 1 Details Modal End-->

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