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
            <form name="create_form" id="create_form" method="POST" action="<?= base_url("mydddapplicationform/create_ddd_form") ?>">
               <input type="hidden" name="fk_user_id" id="fk_user_id" value="<?php echo $this->session->userdata('user_details')[0]['fk_user_id']; ?>">
               <button style="background-color: #1065a2; border-color: #1065a2" type="submit" class="btn btn-primary btn-lg step2-btn">Create DDD Application <i class="fa fa-plus"></i> </button>
            </form>
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