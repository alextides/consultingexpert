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
            <?php foreach ($get_step1_details_status as $row) {
               // if ($row['step1_status'] == 1 || $row['step1_status'] == 2) {
               //    echo '<button style="background-color: #1d95e9; border-color: #1d95e9" type="button" class="btn btn-primary step1-btn" data-toggle="modal" data-target="#step1Modal" disabled>Step 1 <i class="fa fa-check"></i> </button>';
               // } else {
               //    echo '<button style="background-color: #1d95e9; border-color: #1d95e9" type="button" class="btn btn-primary step1-btn" data-toggle="modal" data-target="#step1Modal">Step 1 <i class="fa fa-arrow-right"></i> </button>';
               // }
            }  ?>
            <?php foreach ($get_step2_details_status as $row) {
               // if ($row['payment_status'] == 1 || $row['payment_status'] == 2) {
               //    echo '<button style="background-color: #1065a2; border-color: #1065a2" type="button" class="btn btn-primary step2-btn" data-toggle="modal" data-target="#step2Modal" disabled>Step 2 <i class="fa fa-check"></i> </button>';
               // } else {
               //    echo '<button style="background-color: #1065a2; border-color: #1065a2" type="button" class="btn btn-primary step2-btn" data-toggle="modal" data-target="#step2Modal">Step 2 <i class="fa fa-arrow-right"></i> </button>';
               // }
            }  ?>
            <?php foreach ($get_step3_details_status as $row) {
               // if ($row['step3_status'] == 1 || $row['step3_status'] == 2) {
               //    echo '<button style="background-color: #072b46; border-color: #072b46" type="button" class="btn btn-primary step3-btn" data-toggle="modal" data-target="#step3Modal" disabled>Step 3 <i class="fa fa-check"></i> </button>';
               // } else {
               //    echo '<button style="background-color: #072b46; border-color: #072b46" type="button" class="btn btn-primary step3-btn" data-toggle="modal" data-target="#step3Modal">Step 3 <i class="fa fa-arrow-right"></i> </button>';
               // }
            }  ?>
            <?php foreach ($get_step4_details_status as $row) {
               // if ($row['step4_status'] == 1 || $row['step4_status'] == 2) {
               //    echo '<button style="background-color: #0e1a2e; border-color: #0e1a2e" type="button" class="btn btn-primary step4-btn" data-toggle="modal" data-target="#step4Modal" disabled>Step 4 <i class="fa fa-check"></i> </button>';
               // } else {
               //    echo '<button style="background-color: #0e1a2e; border-color: #0e1a2e" type="button" class="btn btn-primary step4-btn" data-toggle="modal" data-target="#step4Modal">Step 4 <i class="fa fa-arrow-right"></i> </button>';
               // }
            }  ?>

            <form name="create_form" id="create_form" method="POST" action="<?= base_url("mydddapplicationform/create_ddd_form") ?>">
               <input type="hidden" name="fk_user_id" id="fk_user_id" value="<?php echo $this->session->userdata('user_details')[0]['fk_user_id']; ?>">
               <button style="background-color: #1065a2; border-color: #1065a2" type="submit" class="btn btn-primary btn-lg step2-btn">Create DDD Application <i class="fa fa-plus"></i> </button>
            </form>
            <!-- <button style="background-color: #1d95e9; border-color: #1d95e9" type="button" class="btn btn-primary step1-btn" data-toggle="modal" data-target="#step1Modal">Step 1 <i class="fa fa-arrow-right"></i> </button>
            <button style="background-color: #1065a2; border-color: #1065a2" type="button" class="btn btn-primary step2-btn" data-toggle="modal" data-target="#step2Modal">Step 2 <i class="fa fa-arrow-right"></i> </button>
            <button style="background-color: #072b46; border-color: #072b46" type="button" class="btn btn-primary step3-btn" data-toggle="modal" data-target="#step3Modal">Step 3 <i class="fa fa-arrow-right"></i> </button>
            <button style="background-color: #0e1a2e; border-color: #0e1a2e" type="button" class="btn btn-primary step4-btn" data-toggle="modal" data-target="#step4Modal">Step 4 <i class="fa fa-arrow-right"></i> </button> -->
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
                  <li class="nav-item">
                     <a class="nav-link" id="step1details-tab" data-toggle="pill" href="#step1details" role="tab" aria-controls="pills-step1details" aria-selected="false">Step 1 Details</a>
                  </li>
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

                  <div class="tab-pane fade" id="step1details" role="tabpanel" aria-labelledby="step1details-tab">
                     <!-- step1 details -->
                     <!-- <div class="row">
                        <div class="col-12 col-12-no-padding">
                           <div class="card">
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="step1details_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                                       <thead>
                                          <tr>
                                             <th>Selected Services</th>
                                             <th>Website</th>
                                             <th>Agency</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
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

   <!-- STEP 2  -->
   <div class="modal fade" id="step2" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class=" modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 2</h5>
               </button>
            </div>
            <div class="modal-body">
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="step2form-tab" data-toggle="pill" href="#step2form" role="tab" aria-controls="pills-step2form" aria-selected="true">Step 2 Form</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="step2details-tab" data-toggle="pill" href="#step2details" role="tab" aria-controls="pills-step2details" aria-selected="false">Step 2 Details</a>
                  </li>
               </ul>

               <div class="tab-content" id="pills-tabContent">
                  <!-- step1 form -->
                  <div class="tab-pane fade show active" id="step2form" role="tabpanel" aria-labelledby="pills-step2form-tab">
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
                                    <a class='btn btn-success' href='http://localhost/Projects/ConsultingExperts/consultingexpert/paymentinvoice' target='_blank' style="float: right">Click here to Pay!</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <!-- step1 form end-->
                  </div>

                  <div class="tab-pane fade" id="step2details" role="tabpanel" aria-labelledby="step2details-tab">
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

                  <?php foreach ($get_step2_details_status as $row) {
                     // if ($row['payment_status'] == 1 || $row['payment_status'] == 2) {
                     //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2Modal" disabled>Step 2 Form</button>';
                     //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2_details_modal">Step 2 Details </button>';
                     // } else {
                     //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2Modal">Step 2 Form</button>';
                     //    echo '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2_details_modal" disabled>Step 2 Details </button>';
                     // }
                  }  ?>
                  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2Modal">Step 2 Form</button>
               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step2_details_modal">Step 2 Details </button> -->
               <!-- </div> -->
               <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div> -->
            </div>
         </div>
      </div>
      <!-- Modal End-->

      <!-- STEP 3  -->
      <div class="modal fade" id="step3" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable">
            <div class=" modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 3</h5>
                  </button>
               </div>
               <div class="modal-body">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step3Modal">Step 3 Form</button>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step3_details_modal">Step 3 Details </button>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->

      <!-- STEP 4  -->
      <div class="modal fade" id="step4" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable">
            <div class=" modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 4</h5>
                  </button>
               </div>
               <div class="modal-body">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step4Modal">Step 4 Form</button>
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#step4_details_modal">Step 4 Details </button>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->


      <!--step2Modal Modal -->
      <!-- <div class="modal fade" id="step2Modal" tabindex="-1" aria-labelledby="step2ModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
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
                              <button type="submit" class="btn btn-primary update_file">View Invoice</button>
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
                              <button type="submit" class="btn btn-primary update_file">View Invoice</button>
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
      </div> -->
      <!--step2Modal End-->



      <!--step3Modal Start-->
      <div class="modal fade" id="step3Modal" tabindex="-1" role="dialog" aria-labelledby="step3ModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
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

      <!--step4Modal Start-->
      <div class="modal fade" id="step4Modal" tabindex="-1" role="dialog" aria-labelledby="step3ModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="step3ModalLabel"><i class="icon-File"></i> DDD Application Form Step 4</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form method="post" enctype="multipart/form-data" action="<?= base_url("mydddapplicationform/submit_step4") ?>" id="step3Form">
                     <div class="form-group ">
                        <div class="form-group row">
                           <label class="col-md col-form-label">Url: </label>
                           <div class="col-md-11">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <input type="text" class="form-control" disabled id="paid_invoice" name="paid_invoice" value="<?php echo $row['url']; ?>">
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-12">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Select Prototype: </label>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prototype" id="prototype1" value="<?php echo $row['prototype1']; ?>" required>
                                    <label class="form-check-label" for="prototype1"><?php echo $row['prototype1']; ?></label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prototype" id="prototype2" value="<?php echo $row['prototype2']; ?>">
                                    <label class="form-check-label" for="prototype2"><?php echo $row['prototype2']; ?></label>
                                 </div>
                                 <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="prototype" id="prototype3" value="<?php echo $row['prototype3']; ?>">
                                    <label class="form-check-label" for="prototype3"><?php echo $row['prototype3']; ?></label>
                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">IRS EIN:</label>
                                 <input type="text" class="form-control" id="irs_ein" name="irs_ein" value="<?php echo $row['irs_ein']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Uploaded IRS EIN:</label>
                                 <input type="text" class="form-control" id="uploaded_irs_ein" name="uploaded_irs_ein" value="<?php echo $row['upload_irs_ein']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['upload_irs_ein']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Application Submitted:</label>
                                 <input type="text" class="form-control" id="submitted" name="submitted" value="<?php echo $row['submitted']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Application Mailed:</label>
                                 <input type="text" class="form-control" id="mailed" name="mailed" value="<?php echo $row['mailed']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Application Received:</label>
                                 <input type="text" class="form-control" id="date_received" name="date_received" value="<?php echo $row['date_received']; ?>" required disabled>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-12">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Contract Specialist:</label>
                                 <input type="text" class="form-control" id="contract_specialist" name="contract_specialist" value="<?php echo $row['contract_specialist']; ?>" required disabled>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Notice of Incomplete Application:</label>
                                 <input type="text" class="form-control" id="notice_of_incomplete_application" name="notice_of_incomplete_application" value="<?php echo $row['notice_of_incomplete_application']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['notice_of_incomplete_application']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Due Date:</label>
                                 <input type="text" class="form-control" id="due_date" name="due_date" value="<?php echo $row['due_date']; ?>" required disabled>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Business Plan:</label>
                                 <input type="text" class="form-control" id="business_plan" name="business_plan" value="<?php echo $row['business_plan']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['business_plan']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Congtingency Plan:</label>
                                 <input type="text" class="form-control" id="congtingency_plan" name="congtingency_plan" value="<?php echo $row['congtingency_plan']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['congtingency_plan']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Application Denial:</label>
                                 <input type="text" class="form-control" id="application_denial" name="application_denial" value="<?php echo $row['application_denial']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['application_denial']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Revisions Date:</label>
                                 <input type="text" class="form-control" id="revisions_date" name="revisions_date" value="<?php echo $row['revisions_date']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Focus Denial Date:</label>
                                 <input type="text" class="form-control" id="focus_denial_date" name="focus_denial_date" value="<?php echo $row['focus_denial_date']; ?>" required disabled>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Resubmitted Focus:</label>
                                 <input type="text" class="form-control" id="resubmitted_focus" name="resubmitted_focus" value="<?php echo $row['resubmitted_focus']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Mailed Date:</label>
                                 <input type="text" class="form-control" id="mailed_date" name="mailed_date" value="<?php echo $row['mailed_date']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Notice of Complete Application:</label>
                                 <input type="text" class="form-control" id="notice_of_complete_application" name="notice_of_complete_application" value="<?php echo $row['notice_of_complete_application']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['notice_of_complete_application']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Notice of Pre Award:</label>
                                 <input type="text" class="form-control" id="notice_of_pre_award" name="notice_of_pre_award" value="<?php echo $row['notice_of_pre_award']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['notice_of_pre_award']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Noteice of Pre Award Date:</label>
                                 <input type="text" class="form-control" id="pre_award_date" name="pre_award_date" value="<?php echo $row['pre_award_date']; ?>" required disabled>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Notice of Award:</label>
                                 <input type="text" class="form-control" id="notice_of_award" name="notice_of_award" value="<?php echo $row['notice_of_award']; ?>" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['notice_of_award']; ?>" download><i class="icon-Download"></i></a>
                              <?php } ?>
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
                  <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  <button type="submit" class="btn btn-primary submit-step4-btn" name="submits4">Submit</button>
               </div>
               </form>
            </div>
         </div>
      </div>
      <!--step3Modal End-->

      <!-- STEP 1 MODAL details -->
      <div class="modal fade" id="step1_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                           <input type="text" name="selected_services" id="selected_services" class="form-control" required disabled>
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div>
      <!-- Modal End-->
      </form>

      <!-- STEP 2 MODAL details-->
      <!-- <div class="modal fade" id="step2_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
               <div class="modal-footer"> -->
      <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      <!-- <button type="submit" class="btn btn-primary update_file">Close</button>
                  <input type="hidden" name="file_id" id="file_id">
               </div>
            </div>
         </div>
      </div> -->
      <!-- Modal End-->
      </form>

      <!-- STEP 3 MODAL details -->
      <div class="modal fade" id="step3_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                              <?php foreach ($paid_invoice as $row) {  ?>
                                 <input type="text" class="form-control" disabled id="paid_invoice" name="paid_invoice" value="<?php echo $row['upload_paid_invoice']; ?>">
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['upload_paid_invoice']; ?>" download><i class="icon-Eye"></i> View Invoice</a>
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
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['website_questionnaire']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <label class="col-form-label">Website Logo</label>
                              <?php foreach ($step3_files as $row) {  ?>
                                 <input type="text" class="form-control" id="website_logo_info" name="website_logo_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['website_logo']; ?>" download><i class="icon-Download"></i> Download File</a>
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
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year1']; ?>" download><i class="icon-Download"></i> Download File</a>
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
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year2']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <label class="col-form-label">Tax Year 3:</label>
                              <?php foreach ($step3_files as $row) {  ?>
                                 <input type="text" class="form-control" id="agency_tax_year3_info" name="agency_tax_year3_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_tax_year3']; ?>" download><i class="icon-Download"></i> Download File</a>
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
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_resume']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <label class="col-form-label">Bank Statement:</label>
                              <?php foreach ($step3_files as $row) {  ?>
                                 <input type="text" class="form-control" id="agency_bank_statement_info" name="agency_bank_statement_info" required disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['agency_bank_statement']; ?>" download><i class="icon-Download"></i> Download File</a>
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

      <!-- STEP 4 MODAL details-->
      <div class="modal fade" id="step4_details_modal" tabindex="-1" aria-labelledby="step1_details_modalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="step1_details_modalLabel"><i class="icon-File"></i> DDD Application Form Step 4 Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="editFilesForm" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>mydddapplicationform/get_step4_details">
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-12">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Selected Prototype:</label>
                                 <input type="text" class="form-control" id="selected_prototype" name="selected_prototype" disabled>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Fingerprint Clearance Card:</label>
                                 <input type="text" class="form-control" id="fingerprint_card_details" name="fingerprint_card_details" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['fingerprint_card']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-6">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Criminal History Disclosure:</label>
                                 <input type="text" class="form-control" id="criminal_disclosure_details" name="criminal_disclosure_details" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['criminal_disclosure']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="form-group ">
                        <div class="form-group row">
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Reference Letter 1:</label>
                                 <input type="text" class="form-control" id="reference1_details" name="reference1_details" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['reference1']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Reference Letter 2:</label>
                                 <input type="text" class="form-control" id="reference2_details" name="reference2_details" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['reference2']; ?>" download><i class="icon-Download"></i> Download File</a>
                              <?php } ?>
                           </div>
                           <div class="col-md-4">
                              <?php foreach ($step4_files as $row) {  ?>
                                 <label class="col-form-label">Reference Letter 3:</label>
                                 <input type="text" class="form-control" id="reference3_details" name="reference3_details" disabled>
                                 <a class="btn btn-primary" href="./assets/uploads/<?php echo $row['reference3']; ?>" download><i class="icon-Download"></i> Download File</a>
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