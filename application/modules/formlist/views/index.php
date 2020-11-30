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
                                 <?php if($this->session->userdata('type') != 'admin'){  ?>
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
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">New Invoice</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="step1_form_admin" action="<?php echo base_url(); ?>formlist/admin_step1" enctype="multipart/form-data" method="post">
            <div class="modal-body">
               <input type="hidden" id="user_id_step1" name="user_id" value="">
               <h2>Selected Services:</h2>
               <textarea id="sservices_step1" type="text" name="sservices" style="width: 100%; font-size: 20px;" value="" readonly></textarea>
               <br>
               <br>
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
                 <div class="form-group col-md-6 invoice_done" style="text-align: center;">
                  <a id="uwinvoice" class="btn btn-primary blue-btn center_modalbutton"  href="" target="_blank" download>View Uploaded Invoice</a>
                 </div>
               </div>
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
                 <div class="form-group col-md-6 invoice_done" style="text-align: center;">
                  <a id="uainvoice" class="btn btn-primary blue-btn center_modalbutton" href="" target="_blank" download>View Uploaded Invoice</a>
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
               <br>
               <h2>Website/Agency:</h2>
               <br>
               <div class="form-row">
                 <div class="form-group col-md-12 upainvoice_empty" style="text-align: center;">
                     <label for="upainvoice">Upload Paid Invoice</label>
                     <input type="file" id="upainvoice" name="upainvoice" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-12 upainvoice_done" style="text-align: center;">
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
           <h5 class="modal-title" id="addUserLabel" style="font-weight: bold;">Step 3 Form (With Agency)</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="admin-step3-wa-form" action="<?php echo base_url(); ?>formlist/admin_step3_wa" enctype="multipart/form-data" method="post">
            <input class="user_id_step3" type="hidden" name="user_id_step3" value="">
            <div class="modal-body">
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
               <div class="form-row">
                  <div class="form-group col-md-6 w_agency">
                      <label for="irs-ein">IRS EIN: </label>
                      <input type="text" id="irs-ein" name="irs-ein step3_input" class="form-control" required>
                  </div>
                 <div class="form-group col-md-6 w_agency irsfile_empty">
                    <label for="irs-ein-file">Upload IRS EIN</label>
                   <input type="file" id="irs-ein-file" name="irs-ein-file" class="form-control" accept=".pdf, .doc, .docx" required>
                 </div>
                 <div class="form-group col-md-6 irsfile-done" style="text-align: center;">
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
   <!-- Add Modal -->
   <!-- <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Add New Task</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="add_technician_form" action="</?php echo base_url(); ?>userlist/add_user" method="post">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label for="fname">First Name</label>
                   <input type="text" class="form-control" name="fname" id="fname" value="</?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>" placeholder="Enter first name" required>
                 </div>
                 <div class="form-group col-md-6">
                   <label for="lname">Last Name</label>
                   <input type="text" class="form-control" name="lname" id="lname" value="</?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>" placeholder="Enter last name" required>
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="address">Address</label>
                   <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="</?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="email">Email Address</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" value="</?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required>
                     <span style="color: red; font-size: 13px;"></span>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputContact">Contact Number</label>
                     <input type="text" class="form-control" name="contact" value="</?php if(isset($_POST['contact'])){echo $_POST['contact'];} ?>" id="inputContact" placeholder="Enter contact number" required>
                  </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="username">Username</label>
                   <input type="text" class="form-control" id="username" name="username" value="</?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" placeholder="Enter username" required>
                   <span style="color: red; font-size: 13px;"></span>
                 </div>
                 <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <div class="input-group">
                       <input type="password" class="form-control display-pw" name="password"  value="</?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" id="password" placeholder="Enter password" required>
                       <div class="input-group-append toggle-password">
                          <div class="input-group-text">
                             <i class="toggle-icon ti-lock"></i>
                          </div>
                       </div>
                    </div>
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
   </div> -->

</div>
