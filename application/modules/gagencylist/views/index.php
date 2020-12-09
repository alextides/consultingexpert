<div class="page-wrapper" id="vueapp">
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <div class="row page-titles">
           <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor page-title-text">Government Agency List</h3>
           </div>
           <div class="col-md-7 align-self-center text-right center-container">
             <?php if($this->session->userdata('user_details')[0]['user_type'] == 'admin'){ ?>
               <button type="button" class="btn btn-btn-mod blue-btn" style="color: white;" data-toggle="modal" data-target="#addAgency"><i class="fa fa-plus-circle"></i> Create New Agency</button>
             <?php } ?>
         </div>
      </div>
      <div class="row">
           <div class="col-12 col-12-no-padding">
               <div class="card">
                   <div class="card-body">
                      <div class="table-responsive">
                       <table id="gagencylist_datatable" class="table table-striped jambo_table bulk_action dt-responsive" style="width: 100% !important;">
                         <thead>
                             <tr>
                                 <th>Image</th>
                                 <th>Name</th>
                                 <th>Actions</th>
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

   <!-- View Modal -->
   <div class="modal fade" id="viewAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">View Agency</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
        <div class="modal-body">
           <div class="form-row">
             <div class="form-group col-md-12">
                <div style="width: 100%;">
                  <div id="img-box" class="x_panel" style="text-align: center; border: none;">
                      <img id="view-img" src="" alt="user picture" class="profile_img" style="margin-left: auto; max-width: 300px;">
                         <!-- <input type="button" name="uploadpic" value="Upload" class="btn btn-primary hid1 upload-result"> -->
                         <!-- <input type="button" name="cancel" value="Cancel" id="cancel" style="display: none;" class="btn btn-warning"> -->
                      <!-- </form> -->
                      <!-- <a class="btn btn-sm btn-danger remove_pic" style="margin: 10px 0px; background-color: #960722;" href="</?php echo base_url('productlist'); ?>/remove_picture/</?php echo $result[0]->user_id;?>">Remove Profile Picture</a> -->
                  </div>
               </div>
            </div>
           </div>
           <div class="form-row">
             <div class="form-group col-md-12" style="text-align: center;">
               <span id="view_aname"></span>
             </div>
           </div>
           <div class="form-row">
              <div class="form-group col-md-12" style="text-align: justify; padding: 15px;">
                  <span id="view_adescription"></span>
              </div>
           </div>
        </div>
       </div>
     </div>
   </div>

   <!-- Add Modal -->
   <div class="modal fade" id="addAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Add New Agency</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="add_agency_form" action="<?php echo base_url(); ?>gagencylist/add_agency" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <div style="width: 100%;">
                      <div id="img-box" class="x_panel" style="text-align: center; border: none;">
                          <div id="upload-demo" style="display: none;"></div>
                          <img id="img" src="<?php echo base_url(); ?>assets/images/main-logo.png" alt="user picture" class="profile_img" style="margin-left: auto; max-width: 300px; margin-bottom:30px; border: 5px double #187abe;">

                          <!-- <form id="imgform" action="</?php echo base_url('productlist'); ?>/add_product" method="post" enctype="multipart/form-data"> -->
                             <input type="file" class="actionUpload inputpicture" name="pic" accept="image/*" id="picture" style="margin: 0 auto; display: none;">
                             <label for="picture" class="choose-picture">Choose A Picture</label>
                             <!-- <input type="file" name="pic" accept="image/*" onchange="readURL(this);" style="margin: 0 auto;"> -->
                             <br>
                             <input type="button" class="remove-picture inputpicture"  id="remove-picture" name="remove-picture" style="margin: 0 auto; display: none;">
                             <label for="remove-picture" class="remove-pic" style="display: none;">Use default</label>
                             <br>
                             <input type="hidden" id="imagebase64" name="imagebase64">
                             <!-- <input type="button" name="uploadpic" value="Upload" class="btn btn-primary hid1 upload-result"> -->
                             <!-- <input type="button" name="cancel" value="Cancel" id="cancel" style="display: none;" class="btn btn-warning"> -->
                          <!-- </form> -->
                          <!-- <a class="btn btn-sm btn-danger remove_pic" style="margin: 10px 0px; background-color: #960722;" href="</?php echo base_url('productlist'); ?>/remove_picture/</?php echo $result[0]->user_id;?>">Remove Profile Picture</a> -->
                      </div>
                   </div>
                </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="aname">Agency Name</label>
                   <input type="text" class="form-control" name="aname" id="aname" placeholder="Enter Agency Name" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="adescription">Description</label>
                     <textarea type="text" class="form-control" name="adescription" id="adescription" placeholder="Enter Agency Description" style="width: 100%;" required></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" class="btn btn-primary blue-btn upload-result">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

   <!-- Edit Modal -->
   <div class="modal fade" id="editAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="addUserLabel">Edit Agency</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form id="edit_agency_form" action="<?php echo base_url(); ?>gagencylist/update_agency" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="form-row">
                 <div class="form-group col-md-12">
                   <input type="hidden" name="id_agency_id" value="">
                    <div style="width: 100%;">
                      <div id="edit-img-box" class="x_panel" style="text-align: center; border: none;">
                          <div id="edit-upload-demo" style="display: none;"></div>
                          <img id="edit-img" src="<?php echo base_url(); ?>assets/images/main-logo.png" alt="user picture" class="profile_img" style="margin-left: auto; max-width: 300px; margin-bottom:30px; border: 5px double #187abe;">

                          <!-- <form id="imgform" action="</?php echo base_url('productlist'); ?>/add_product" method="post" enctype="multipart/form-data"> -->
                             <input type="file" class="edit-actionUpload inputpicture" name="edit-pic" accept="image/*" id="edit-picture" style="margin: 0 auto; display: none;">
                             <label for="edit-picture" class="edit-picture">Choose A Picture</label>
                             <!-- <input type="file" name="pic" accept="image/*" onchange="readURL(this);" style="margin: 0 auto;"> -->
                             <br>
                             <input type="button" class="remove-picture inputpicture"  id="edit-remove-picture" name="edit-remove-picture" style="margin: 0 auto; display: none;">
                             <label for="edit-remove-picture" class="edit-remove-pic" style="display: none;">Use default</label>
                             <br>
                             <input type="hidden" id="edit-imagebase64" name="edit-imagebase64">
                             <!-- <input type="button" name="uploadpic" value="Upload" class="btn btn-primary hid1 upload-result"> -->
                             <!-- <input type="button" name="cancel" value="Cancel" id="cancel" style="display: none;" class="btn btn-warning"> -->
                          <!-- </form> -->
                          <!-- <a class="btn btn-sm btn-danger remove_pic" style="margin: 10px 0px; background-color: #960722;" href="</?php echo base_url('productlist'); ?>/remove_picture/</?php echo $result[0]->user_id;?>">Remove Profile Picture</a> -->
                      </div>
                   </div>
                </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-12">
                    <label for="edit_aname">Agency Name</label>
                   <input type="text" class="form-control" name="edit_aname" id="edit_aname" placeholder="Enter Agency Name" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" required>
                 </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="edit_adescription">Description</label>
                     <textarea type="text" class="form-control" name="edit_adescription" id="edit_adescription" placeholder="Enter Agency Description" style="width: 100%;" required></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <span class="error_msg" style="color: red; font-size: 15px; margin-left: 0; width: 100%;"></span>
               <button type="submit" class="btn btn-primary blue-btn edit-upload-result">Submit</button>
            </div>
         </form>
       </div>
     </div>
   </div>

</div>
