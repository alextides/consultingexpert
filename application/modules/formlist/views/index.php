<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
           <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor page-title-text">DDD Application Form List</h3>
           </div>
           <div class="col-md-7 align-self-center text-right center-container">
             <!-- <button type="button" class="btn btn-btn-mod" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus-circle"></i> Create New Technician</button> -->
         </div>
      </div>
      <div class="row">
           <div class="col-12 col-12-no-padding">
               <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                       <table id="formlist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                         <thead>
                             <tr>
                                 <?php if($this->session->userdata('type') != '1'){  ?>
                                    <th>Owner</th>
                                 <?php } ?>
                                 <th>Date Added</th>
                                 <th>Status</th>
                                 <th>Steps</th>
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

   <!-- 1st Step -->
   <div class="modal fade" id="modal_step_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">View Invoice</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="step1_form_admin" action="<?php echo base_url(); ?>formlist/admin_step1" enctype="multipart/form-data" method="post">
            <div class="modal-body">
               <input type="hidden" id="user_id_step1" name="user_id" value="">
               <input type="hidden" id="step_id_step1" name="step_id" value="">
               <input type="hidden" id="form_id_step1" name="form_id" value="">
               <h1>Selected Services:</h1>
               <!-- <textarea id="sservices_step1" type="text" name="sservices" style="width: 100%; font-size: 20px;" value="" readonly></textarea> -->
               <br>
               <br>
               <div class="website_container">
                 <h2>Website:</h2>
                 <br>
                 <div class="form-row">
                   <div class="form-group col-md-6">
                     <label for="ws_qprice" class="wqprice_empty">Quote price</label>
                     <input type="number" class="form-control wqprice_empty" name="ws_qprice" id="ws_qprice" step="1" min="1" value="" placeholder="Enter quote price" required>
                     <label for="ws_qprice" class="wqprice_done">Quote price</label>
                     <input type="text" class="form-control wqprice_done" name="wqprice_done" id="ws_qprice_done" step="1" min="1" value="" placeholder="Enter quote price" readonly>
                   </div>
                   <div class="form-group col-md-6 winvoice_empty">
                       <label for="ws_invoice">Upload Invoice</label>
                       <input type="file" id="ws_invoice" name="ws_invoice" accept=".pdf, .doc, .docx" required/>
                   </div>
                   <div class="form-group col-md-6 winvoice_done" style="text-align: center;">
                    <a id="uwinvoice" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Uploaded Invoice</a>
                   </div>
                 </div>
               </div>
               <div class="agency_container">
                 <h2>Agency:</h2>
                 <br>

                 <div class="form-row">
                   <div class="form-group col-md-6">
                     <label for="a_qprice" class="aqprice_empty">Quote price</label>
                     <input type="number" class="form-control aqprice_empty" name="a_qprice" id="a_qprice" step="1" min="1" value="" placeholder="Enter quote price" required>
                     <label for="ws_qprice" class="aqprice_done">Quote price</label>
                     <input type="text" class="form-control aqprice_done" name="aqprice_done" id="a_qprice_done" step="1" min="1" value="" placeholder="Enter quote price" readonly>
                   </div>
                   <div class="form-group col-md-6 ainvoice_empty">
                       <label for="a_invoice">Upload Invoice</label>
                       <input type="file" id="a_invoice" name="a_invoice" accept=".pdf, .doc, .docx" required/>
                   </div>
                   <div class="form-group col-md-6 ainvoice_done" style="text-align: center;">
                    <a id="uainvoice" class="btn btn-primary blue-btn center_modalbutton" href="" target="_blank" download>View Uploaded Invoice</a>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer step1_footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" name="add_invoice" class="btn btn-primary blue-btn submit_add_invoice">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

   <!-- 2nd Step -->
   <div class="modal fade" id="modal_step_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">Upload Paid Invoice</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="step2_form_admin" action="<?php echo base_url(); ?>formlist/admin_step2"  enctype="multipart/form-data"  method="post">
           <div class="modal-body">
              <input type="hidden" id="user_id_step2" name="user_id" value="">
              <input type="hidden" id="step_id_step2" name="step_id" value="">
              <input type="hidden" id="form_id_step2" name="form_id" value="">
               <br>
               <h2 id="step2_title">Website/Agency:</h2>
               <br>
               <div class="form-row">
                 <div class="form-group col-md-12 upainvoice_empty" style="text-align: center;">
                     <label for="upainvoice">Upload Paid Invoice</label>
                     <input type="file" id="upainvoice" name="upainvoice" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-12 upainvoice_done" style="text-align: center;">
                  <a id="upainvoice_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Uploaded Paid Invoice</a>
                 </div>
               </div>
            </div>
            <div class="modal-footer step2_footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" name="step2_submit" class="btn btn-primary blue-btn step2_submit">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

   <!-- 2nd Step -->
   <!-- <div class="modal fade" id="modal_step_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">Upload Paid Invoice</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="step2_form_admin" action="</?php echo base_url(); ?>formlist/admin_step2"  enctype="multipart/form-data"  method="post">
            <div class="modal-body">
               <input type="hidden" id="user_id_step2" name="user_id" value="">
               <h2>Website:</h2>
               <br>
               <div class="form-row">
                 <div class="form-group col-md-6" style="text-align: center;">
                  <a id="owinvoice" class="btn btn-primary blue-btn center_modalbutton" href="" target="_blank" download>View Old Invoice</a>
                 </div>
                 <div class="form-group col-md-6 upwinvoice_empty">
                     <label for="upwinvoice">Upload Paid Invoice</label>
                     <input type="file" id="upwinvoice" name="upwinvoice" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-6 upwinvoice_done" style="text-align: center;">
                  <a id="upwinvoice_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Uploaded Invoice</a>
                 </div>
               </div>
               <h2>Agency:</h2>
               <br>
               <div class="form-row">
                 <div class="form-group col-md-6 " style="text-align: center;">
                    <a id="oainvoice" class="btn btn-primary blue-btn center_modalbutton" href="" target="_blank" download>View Old Invoice</a>
                 </div>
                 <div class="form-group col-md-6 upainvoice_empty">
                     <label for="upainvoice">Upload Paid Invoice</label>
                     <input type="file" id="upainvoice" name="upainvoice" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-6 upainvoice_done" style="text-align: center;">
                  <a id="upainvoice_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Uploaded Invoice</a>
                 </div>
               </div>
            </div>
            <div class="modal-footer step2_footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" name="step2_submit" class="btn btn-primary blue-btn step2_submit">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div> -->

   <!-- 3rd Step WA -->
   <div class="modal fade" id="modal_step_3_wa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">Step 3 Form</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="admin-step3-wa-form" action="<?php echo base_url(); ?>formlist/admin_step3_wa" enctype="multipart/form-data" method="post">
            <input class="user_id_step3" type="hidden" name="user_id_step3" value="">
            <div class="modal-body">
                <div class="" style="text-align:right;">
                  <button id="step_3_user" class="btn btn-light center_modalbutton" value="" style="margin-top: 5px; font-weight: bold;">View User Step 3 Form</button>
                </div>
               <div class="step3-website-container">
                  <h2>Website:</h2>
                  <br>
                  <h4>URL Prototypes:</h4>
                  <br>
                  <div class="form-row">
                    <div class="form-group col-md-12 pt1_empty">
                        <label for="prototype1">Prototype 1:</label>
                        <input type="text" id="prototype1" name="prototype1" class="form-control step3_input" required>
                    </div>
                    <div class="form-group col-md-12 pt2_empty">
                        <label for="prototype2">Prototype 2:</label>
                        <input type="text" id="prototype2" name="prototype2" class="form-control step3_input" required>
                    </div>
                    <div class="form-group col-md-12 pt1_empty">
                        <label for="prototype3">Prototype 3</label>
                        <input type="text" id="prototype3" name="prototype3" class="form-control step3_input" required>
                    </div>
                  </div>
               </div>
               <h2>Agency:</h2>
               <br>
               <div class="step3-agency-container">
                 <div class="form-row">
                    <div class="form-group col-md-6 w_agency">
                        <label for="irs-ein">IRS EIN: </label>
                        <input type="text" id="irs-ein" name="irs-ein step3_input" class="form-control" required>
                    </div>
                   <div class="form-group col-md-6 w_agency irsfile_empty">
                      <label for="irs-ein-file">Upload IRS EIN</label>
                     <input type="file" id="irs-ein-file" name="irs-ein-file" class="form-control" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 w_agency irsfile-done" style="text-align: center;">
                    <a id="irs-ein-file-done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View IRS EIN</a>
                   </div>
                   <div class="form-group col-md-6 irs-submitted">
                       <label for="irs-submmitted">Submitted: </label>
                       <input type="text" id="irs-submmitted" name="irs-submitted" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="irs-mailed">Mailed: </label>
                       <input type="text" id="irs-mailed" name="irs-mailed" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="irs-rdate">Date Received:</label>
                       <input type="date" id="irs-rdate" name="irs-rdate" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="irs-cspecialist">Contract Specialist</label>
                       <input type="text" id="irs-cspecialist" name="irs-cspecialist" class="form-control step3_input" required>
                   </div>
                </div>
                 <div class="form-row">
                   <div class="form-group col-md-6 niafile_empty">
                      <label for="nia-file">Upload Notice of Incomplete Application</label>
                      <input type="file" id="nia-file" name="nia-file" class="form-control step3_input" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 niafile_done" style="text-align: center;">
                    <a id="nia-file-done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" style="margin-top: 5px;" download>View Notice of Incomplete Application</a>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="nia-ddate">Due Date: </label>
                       <input type="date" id="nia-ddate" name="nia-ddate" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="nia-bplan">Business Plan: </label>
                       <input type="text" id="nia-bplan" name="nia-bplan" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="nia-cplan">Contigency Plan:</label>
                       <input type="text" id="nia-cplan" name="nia-cplan" class="form-control step3_input" required>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="form-group col-md-6 adfile_empty">
                      <label for="nia-app-denial">Upload Application Denial</label>
                      <input type="file" id="nia-app-denial" name="nia-app-denial" class="form-control step3_input" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 adfile_done" style="text-align: center;">
                    <a id="adfile_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Application Denial</a>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="ad-rdate">Revisions Date: </label>
                       <input type="date" id="ad-rdate" name="ad-rdate" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="ad-rfocus">Resubmitted Focus: </label>
                       <input type="text" id="ad-rfocus" name="ad-rfocus" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="ad-mdate">Mailed Date:</label>
                       <input type="date" id="ad-mdate" name="ad-mdate" class="form-control step3_input" required>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="form-group col-md-6 ncafile_empty">
                      <label for="nca-file">Upload Notice of Complete Application</label>
                      <input type="file" id="nca-file" name="nca-file" class="form-control" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 ncafile_done" style="text-align: center;">
                    <a id="ncafile_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank"  download>View Notice of Complete Application</a>
                   </div>
                   <div class="form-group col-md-6 npafile_empty">
                      <label for="npa-file">Upload Notice of Pre Award</label>
                     <input type="file" id="npa-file" name="npa-file" class="form-control" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 npafile_done" style="text-align: center;">
                    <a id="npafile_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Notice of Pre Award</a>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="padate">Pre Award Date: </label>
                       <input type="date" id="padate" name="padate" class="form-control step3_input" required>
                   </div>
                   <div class="form-group col-md-6 nafile_empty">
                      <label for="na-file">Upload Notice of Award</label>
                     <input type="file" id="na-file" name="na-file" class="form-control" accept=".pdf, .doc, .docx" required>
                   </div>
                   <div class="form-group col-md-6 nafile_done" style="text-align: center;">
                    <a id="nafile_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Notice of Award</a>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer step3_footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" class="btn btn-primary blue-btn">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

   <!-- 4th Step-->
   <div class="modal fade" id="modal_step_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">Step 4 Form</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="admin-step4" action="<?php echo base_url(); ?>formlist/admin_step4" enctype="multipart/form-data" method="post">
            <input id="user_id_step4" type="hidden" name="user_id_step4" value="">
            <div class="modal-body">
              <div class="" style="text-align:right;">
                <button id="user-step4-btn" class="btn btn-light center_modalbutton" value="" style="margin-top: 5px; font-weight: bold;">View User Step 4 Form</button>
              </div>
               <h2>Agency:</h2>
               <br>
               <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="district">District: </label>
                     <input type="text" id="district" name="district" class="form-control" required>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="submitted">AHCCCS Submitted: </label>
                     <input type="date" id="submitted" name="ahcccs-submitted" class="form-control" required>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="approved">AHCCCS Approved:</label>
                     <input type="date" id="approved" name="ahcccs-approved" class="form-control" required>
                 </div>
                 <div class="form-group col-md-6 olcr_empty">
                    <label for="olcr-file">Upload OLCR</label>
                    <input type="file" id="olcr-file" name="olcr-file" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-6 olcr_done" style="text-align: center;">
                  <a id="olcr_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View OLCR</a>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="olcr-date">OLCR Submitted:</label>
                    <input type="date" id="olcr-date" name="olcr-date" class="form-control" required>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="olcr-contact">Contact:</label>
                    <input type="text" id="olcr-contact" name="olcr-contact" class="form-control" required>
                 </div>
                 <div class="form-group col-md-6 policy_empty">
                    <label for="pm-file">Upload Policy Manual</label>
                    <input type="file" id="pm-file" name="pm-file" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-6 policy_done" style="text-align: center;">
                  <a id="olcr_done" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Policy Manual</a>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="pm-submitted">Policy Manual Submitted:</label>
                    <input type="date" id="pm-submitted" name="pm-submitted" class="form-control" required>
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

   <!-- View Invoice -->
   <div class="modal fade" id="viewInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">New Invoice</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="view_invoice_form" action="<?php echo base_url(); ?>userlist/add_user" method="post">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <label for="qprice">Quote price</label>
                   <input type="text" class="form-control" name="qprice" id="qprice" value="$100.00" placeholder="Enter quote price" disabled>
                 </div>
               </div>
            </div>
            <div class="modal-footer align-self-center text-right center-container">
                <button type="button" class="btn btn-primary blue-btn" name="vinvoice"><i class="fa fa-plus-eye"></i>View Invoice</button>
                <button type="button" class="btn btn-primary blue-btn" name="paybutton"><i class="fa fa-plus-money"></i>Pay</button>
            </div>
         </form>
       </div>
     </div>
   </div>


   <!--step3Modal Start-->
   <div class="modal fade" id="modal_step_3_user" tabindex="-1" role="dialog" aria-labelledby="step3ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;"> User's Step 3 Form</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
              <br>
              <h2>Website:</h2>
              <br>
                <div class="step3-user-website-container">
                  <div class="form-group ">
                     <div class="form-group row">
                         <div class="form-group col-md-6" style="text-align: center;">
                          <a id="website_questionnaire" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Website Questionnaire</a>
                         </div>
                         <div class="form-group col-md-6" style="text-align: center;">
                          <a id="website_logo" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Website Logo</a>
                         </div>
                     </div>
                  </div>
                  <br>
                </div>
                <div class="step3-user-agency-container">
                  <h2>Agency:</h2>
                  <br>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="first_name1">First Name 1:</label>
                            <input type="text" id="first_name1" name="first_name1" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name1">Last Name 1:</label>
                            <input type="text" id="last_name1" name="last_name1" class="form-control" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label for="first_name2">First Name 2:</label>
                            <input type="text" id="first_name2" name="first_name2" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name2">Last Name 2:</label>
                            <input type="text" id="last_name2" name="last_name2" class="form-control" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="form-group col-md-6">
                         <label for="agency_name1">Agency Name 1:</label>
                         <input type="text" id="agency_name1" name="agency_name1" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                         <label for="agency_name2">Agency Name 2:</label>
                         <input type="text" id="agency_name2" name="agency_name2" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                         <label for="agency_name3">Agency Name 3:</label>
                         <input type="text" id="agency_name3" name="agency_name3" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label for="address1">Address 1:</label>
                       <input type="text" id="address1" name="address1" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label for="address2">Address 2:</label>
                       <input type="text" id="address2" name="address2" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label for="agency_city">City:</label>
                       <input type="text" id="agency_city" name="agency_city" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label for="agency_state">State:</label>
                       <input type="text" id="agency_state" name="agency_state" class="form-control" required>
                     </div>
                     <div class="form-group col-md-6">
                       <label for="agency_zip">Zip:</label>
                       <input type="text" id="agency_zip" name="agency_zip" class="form-control" required>
                     </div>
                   </div>
                 <div class="form-group row">
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="agency_tax_year1" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Tax Year 1</a>
                   </div>
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="agency_tax_year2" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Tax Year 2</a>
                   </div>
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="agency_tax_year3" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Tax Year 3</a>
                   </div>
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="agency_resume" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Resume</a>
                   </div>
                   <div class="form-group col-md-12" style="text-align: center;">
                    <a id="agency_bank_statement" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Bank Statement</a>
                   </div>
                 </div>
                </div>
            </div>
         </div>
      </div>
   </div>
   <!--step3Modal End-->

   <!--step4Modal Start-->
   <div class="modal fade" id="modal_step_4_user" tabindex="-1" role="dialog" aria-labelledby="step3ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="step3ModalLabel"><i class="icon-File"></i> User's Step 4 Form</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
             <div class="form-group row">
                <div class="col-md-12">
                  <div class="form-group col-md-12">
                    <label for="selected_prototype">Selected URL Prototype:</label>
                    <input type="text" id="selected_prototype" name="selected_prototype" class="form-control" required>
                  </div>
                </div>
             </div>
              <div class="step4-user-agency-container">
                <h2>Agency:</h2>
                <br>
                 <div class="form-group row">
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="fingerprint_card" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Fingerprint Clearance Card</a>
                   </div>
                   <div class="form-group col-md-6" style="text-align: center;">
                    <a id="criminal_disclosure" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Criminal History Disclosure</a>
                   </div>
                 </div>
                 <div class="form-group row">
                    <div class="form-group col-md-6" style="text-align: center;">
                      <a id="reference1" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Reference Letter 1</a>
                    </div>
                    <div class="form-group col-md-6" style="text-align: center;">
                      <a id="reference2" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Reference Letter 2</a>
                    </div>
                    <div class="form-group col-md-12" style="text-align: center;">
                      <a id="reference3" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Reference Letter 3</a>
                    </div>
                </div>
              </div>
            </div>
         </div>
      </div>
   </div>
   <!--step3Modal End-->

</div>
