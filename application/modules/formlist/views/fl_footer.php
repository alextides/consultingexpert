<script src="<?= base_url()."assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">

$(document).on('click', '.toggle-password', function(){
  if($('.ti-lock').length){
     $('i.toggle-icon').removeClass('ti-lock');
     $('i.toggle-icon').addClass('ti-unlock');
  }else{
     $('i.toggle-icon').removeClass('ti-unlock');
     $('i.toggle-icon').addClass('ti-lock');
 }

  if ($('.display-pw').attr("type") == "password") {
    $('.display-pw').attr("type", "text");
  } else {
    $('.display-pw').attr("type", "password");
  }
});

$(document).on('click','.delete_user',function(e){
   e.preventDefault();
   Swal.fire({
   title: 'Are you sure to delete this user?',
   text: "Proceeding will delete the user's data and access.",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes, delete user.'
   }).then((result) => {
      if (result.value) {
         window.location.replace($(this).attr('href'));
      }
   });
});

$(document).ready(function(e){
  var filter_user_type ="";
  var base_url = "<?php echo base_url();?>";
  var data_table = $('#formlist_datatable').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'formlist/view_forms',
              type : 'POST',
            },
      });


  $(document).on('click','.step_1',function(e){
     var user_id = $(this).attr('data-id');
     var form_id = $(this).attr('data-sid');
     $('#user_id_step1').val(user_id);

     $.ajax({
       url: '<?php echo base_url();?>formlist/view_stepform/1',
       type: 'post',
       data: {'user_id' : user_id, 'form_id': form_id},
       success: function(response){
         if (response != "") {
            let result = JSON.parse(response);
            $('#sservices_step1').val(result[0].services);
            if(result[0].website_invoice != ""){
               $('.winvoice_empty').css('display', 'none');
               $("a#uwinvoice").attr("href", `assets/uploads/documents/${result[0].website_invoice}`);
            }else{
               $('.winvoice_done').css('display', 'none');
            }
            if(result[0].agency_invoice != ""){
               $('.ainvoice_empty').css('display', 'none');
               $("a#uainvoice").attr("href", `assets/uploads/documents/${result[0].agency_invoice}`);
            }else{
               $('.ainvoice_done').css('display', 'none');
            }
            if(result[0].website_quote != ""){
               $('.wqprice_empty').css('display', 'none');
               $('input.wqprice_done').val(result[0].agency_quote);
            }else{
               $('.wqprice_done').css('display', 'none');
            }
            if(result[0].agency_quote != ""){
               $('.aqprice_empty').css('display', 'none');
               $('input.aqprice_done').val(result[0].agency_quote);
            }else{
               $('.aqprice_done').css('display', 'none');
            }
            if(result[0].step1_status != '0'){
               $('.step1_footer').css('display', 'none');
            }
            $('#modal_step_1').modal('show');
         }else{
            alert(response);
         }
       }
     });

     $('#modal_step_1').modal('show');

  });

   $(document).on('click','.step_2',function(e){
     var user_id = $(this).attr('data-id');
     var form_id = $(this).attr('data-sid');
     $('#user_id_step2').val(user_id);

      $.ajax({
         url: '<?php echo base_url();?>formlist/view_stepform/1',
         type: 'post',
         data: {'user_id' : user_id, 'form_id' : form_id},
         success: function(response){
            if (response != "") {
              let result = JSON.parse(response);
              $('#sservices_step2').val(result[0].services);
              $("a#owinvoice").attr("href", `assets/uploads/documents/${result[0].website_invoice}`);
              $("a#oainvoice").attr("href", `assets/uploads/documents/${result[0].agency_invoice}`);

               if(result[0].website_uinvoice != ""){
                $('.upwinvoice_empty').css('display', 'none');
                $("a#upwinvoice_done").attr("href", `assets/uploads/documents/${result[0].website_uinvoice}`);
                }else{
                   $('.upwinvoice_done').css('display', 'none');
                }
                if(result[0].agency_uinvoice != ""){
                  $('.upainvoice_empty').css('display', 'none');
                  $("a#upainvoice_done").attr("href", `assets/uploads/documents/${result[0].agency_uinvoice}`);
                }else{
                  $('.upainvoice_done').css('display', 'none');
                }
                if(result[0].step2_status != '0'){
                  $('.step2_footer').css('display', 'none');
                }
            }else{
               alert(response);
            }
         }
      });
      $('#modal_step_2').modal('show');
   });
  $(document).on('click','.step_3',function(e){
     var user_id = $(this).attr('data-id');
     var form_id = $(this).attr('data-sid');
     $('#user_id_step3').val(user_id);

      $.ajax({
         url: '<?php echo base_url();?>formlist/view_stepform/3',
         type: 'post',
         data: {'user_id' : user_id, 'form_id' : form_id},
         success: function(response){
            if (response != "") {
               let result = JSON.parse(response);

               if(result[0].step3_status == '1')
                  $('.step3_footer').css('display', 'none');
               if(result[0].ws_url1 == ''){
                  $('.step3-website-container').hide();
               }else{
                  $('input#prototype1').val(result[0].ws_url1).attr('readonly', true);
                  $('input#prototype2').val(result[0].ws_url2).attr('readonly', true);
                  $('input#prototype3').val(result[0].ws_url3).attr('readonly', true);
               }

               if(result[0].irs_ein != ''){
                  $('input#irs-ein').val(result[0].irs_ein).attr('readonly', true);
               }
               if(result[0].irs_submitted != ''){
                  $('input#irs-submmitted').val(result[0].irs_submitted).attr('readonly', true);
               }
               if(result[0].irs_mailed != ''){
                  $('input#irs-mailed').val(result[0].irs_mailed).attr('readonly', true);
               }
               if(result[0].irs_rdate != ''){
                  $('input#irs-rdate').val(result[0].irs_rdate).attr('readonly', true);
               }
               if(result[0].irs_cspecialist != ''){
                  $('input#irs-cspecialist').val(result[0].irs_cspecialist).attr('readonly', true);
               }
               if(result[0].nia_ddate != ''){
                  $('input#nia-ddate').val(result[0].nia_ddate).attr('readonly', true);
               }
               if(result[0].nia_ddate != ''){
                  $('input#nia-ddate').val(result[0].nia_ddate).attr('readonly', true);
               }
               if(result[0].nia_bplan != ''){
                  $('input#nia-bplan').val(result[0].nia_bplan).attr('readonly', true);
               }
               if(result[0].nia_cplan != ''){
                  $('input#nia-cplan').val(result[0].nia_cplan).attr('readonly', true);
               }
               if(result[0].ad_rdate != ''){
                  $('input#ad-rdate').val(result[0].ad_rdate).attr('readonly', true);
               }
               if(result[0].ad_rfocus != ''){
                  $('input#ad-rfocus').val(result[0].ad_rfocus).attr('readonly', true);
               }
               if(result[0].ad_mdate != ''){
                  $('input#ad-mdate').val(result[0].ad_mdate).attr('readonly', true);
               }
               if(result[0].padate != ''){
                  $('input#padate').val(result[0].padate).attr('readonly', true);
               }

               // $("a#upwinvoice_done").attr("href", `assets/uploads/documents/${result[0].website_uinvoice}`);

               if(result[0].irs_ein_file != ''){
                  $('.irsfile_empty').hide();
                  $("a#irs-ein-file-done").attr("href", `assets/uploads/documents/${result[0].irs_ein_file}`);
               }
               if(result[0].irs_ein_file != ''){
                  $('.niafile_empty').hide();
                  $("a#nia-file-done").attr("href", `assets/uploads/documents/${result[0].nia_file}`);
               }
               if(result[0].app_denial_file != ''){
                  $('.adfile_empty').hide();
                  $("a#adfile_done").attr("href", `assets/uploads/documents/${result[0].app_denial_file}`);
               }
               if(result[0].nca_file != ''){
                  $('.ncafile_empty').hide();
                  $("a#ncafile_done").attr("href", `assets/uploads/documents/${result[0].nca_file}`);
               }
               if(result[0].npa_file != ''){
                  $('.ncafile_empty').hide();
                  $("a#npafile_done").attr("href", `assets/uploads/documents/${result[0].npa_file}`);
               }
               if(result[0].npa_file != ''){
                  $('.ncafile_empty').hide();
                  $("a#npafile_done").attr("href", `assets/uploads/documents/${result[0].npa_file}`);
               }



               if(result[0].step3_type == 'hasno_agency'){
                  $('.w_agency').css('display', 'none');
                  $('#modal_step_3_noa').modal('show');
               }else{
                  $('#modal_step_3_wa').modal('show');
               }
            }else{
               alert(response);
            }
         }
      });
  });
  // $(document).on('click','.step_3',function(e){
  //  var user_id = $(this).attr('data-id');
  //    $('.user_id_step3').val(user_id);
  //    $('#modal_step_3_noa').modal('show');
  //
  // });

  $(document).on('click','.step_4',function(e){
     var user_id = $(this).attr('data-id');
     $('#user_id_step4').val(user_id);
     $('#modal_step_4').modal('show');

  });

  $(document).on('click','.edit_user',function(e){
     e.preventDefault();
     var data_id = $(this).attr('data-id');
     let new_array = [];
     let checker = '';

     var base_url = "<?php echo base_url();?>formlist/edit_user/";
     $.ajax({
         type : "GET",
         url  : base_url + data_id,
         success: function(data){
            let result = JSON.parse(data);
            // alert(result[0].program_type);


            $('#id_value_id').val(data_id);
            $('[name="edit_fname"]').val(result[0].first_name);
            $('[name="edit_lname"]').val(result[0].last_name);
            $('[name="edit_address"]').val(result[0].address);
            $('[name="edit_email"]').val(result[0].email);
            $('[name="edit_contact"]').val(result[0].contact_number);
            $('[name="edit_username"]').val(result[0].username);
            $('[name="edit_password"]').val(result[0].password);

            $('#editUser').modal('show');
         },
         error: function(data) {
            alert(data);
         }
     });

  });

$(document).ready(function(){
   let username_state = false;
   let email_state = false;
   let e_username_state = false;
   let e_email_state = false;

 $('#username').on('blur', function(){
  var username = $('#username').val();
  $.ajax({
    url: '<?php echo base_url();?>formlist/verify_username',
    type: 'post',
    data: {'username' : username},
    success: function(response){
      if (response == 'taken' ) {
         username_state = false;
      	$('#username').css("border", "1px solid red");
      	$('#username').siblings("span").text('Username already taken.');
      }else if (response == 'not_taken') {
         username_state = true;
         $('#username').css("border", "1px solid #ced4da");
      	$('#username').siblings("span").text('');
      }

      if(username = ''){
         username_state = false;
         $('#username').css("border", "1px solid #ced4da");
      	$('#username').siblings("span").text('');
      }
    }
  });
 });

 $('#email').on('blur', function(){
  var email = $('#email').val();
  $.ajax({
    url: '<?php echo base_url();?>formlist/verify_email',
    type: 'post',
    data: {'email' : email},
    success: function(response){
      if (response == 'taken' ) {
         email_state = false;
      	$('#email').css("border", "1px solid red");
      	$('#email').siblings("span").text('Email Address already taken.');
      }else if (response == 'not_taken') {
         email_state = true;
         $('#email').css("border", "1px solid #ced4da");
      	$('#email').siblings("span").text('');
      }

      if(email = ''){
         email_state = false;
         $('#email').css("border", "1px solid #ced4da");
      	$('#email').siblings("span").text('');
      }
    }
  });
 });

//  $('#step1_form_admin').on('submit', function(e){
//
//   var form_data = $('#step1_form_admin').serialize();
//
//   // proceed with form submission
//   $.ajax({
//      url: '</?php echo base_url();?>formlist/admin_step1',
//      type: 'post',
//      data: form_data,
//      success: function(response){
//
//         alert(form_data);
//         console.log(response);
//         exit;
//
//         Swal.fire({
//         title: 'Upload Invoice has been added.',
//         type: 'success',
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'OK'
//        }).then((result) => {
//          data_table.ajax.reload();
//        })
//      }
//   });
// });

});
// edit user validation
 // $('#edit_username').on('blur', function(){
 //  var username = $('#edit_username').val();
 //  var id = $('#id_value_id').val();
 //  $.ajax({
 //    url: '</?php echo base_url();?>formlist/verify_username',
 //    type: 'post',
 //    data: {'username' : username, 'id': id},
 //    success: function(response){
 //      if (response == 'taken' ) {
 //         e_username_state = false;
 //      	$('#edit_username').css("border", "1px solid red");
 //      	$('#edit_username').siblings("span").text('Username already taken');
 //      }else if (response == 'not_taken') {
 //         e_username_state = true;
 //         $('#edit_username').css("border", "1px solid #ced4da");
 //      	$('#edit_username').siblings("span").text('');
 //      }
 //
 //      if(username = ''){
 //         e_username_state = false;
 //         $('#edit_username').css("border", "1px solid #ced4da");
 //      	$('#edit_username').siblings("span").text('');
 //      }
 //    }
 //  });
 // });
 //
 // $('#edit_email').on('blur', function(){
 //  var email = $('#edit_email').val();
 //  var id = $('#id_value_id').val();
 //  $.ajax({
 //    url: '</?php echo base_url();?>formlist/verify_email',
 //    type: 'post',
 //    data: {'email' : email, 'id' : id},
 //    success: function(response){
 //      if (response == 'taken' ) {
 //         e_email_state = false;
 //      	$('#edit_email').css("border", "1px solid red");
 //      	$('#edit_email').siblings("span").text('Email Address already taken');
 //      }else if (response == 'not_taken') {
 //         e_email_state = true;
 //         $('#edit_email').css("border", "1px solid #ced4da");
 //      	$('#edit_email').siblings("span").text('');
 //      }
 //
 //      if(email = ''){
 //         e_email_state = false;
 //         $('#edit_email').css("border", "1px solid #ced4da");
 //      	$('#edit_email').siblings("span").text('');
 //      }
 //    }
 //  });
 // });

//  $('#edit_technician_form').on('submit', function(e){
//   e.preventDefault();
//   if (e_username_state == false || e_email_state == false) {
//     $('.error_msg').text('Replace input on highlighted field/s.');
//
//   }else{
//      $('.error_msg').text('');
//      var form_data = $('#edit_technician_form').serialize();
//
//      // proceed with form submission
//      $.ajax({
//         url: '</?php echo base_url();?>formlist/update_user',
//         type: 'post',
//         data: form_data,
//         success: function(response){
//
//            Swal.fire({
//            title: 'User has been updated.',
//            type: 'success',
//            confirmButtonColor: '#3085d6',
//            cancelButtonColor: '#d33',
//            confirmButtonText: 'OK'
//           }).then((result) => {
//             location.reload();
//           })
//         }
//      });
//   }
// });

});
</script>
