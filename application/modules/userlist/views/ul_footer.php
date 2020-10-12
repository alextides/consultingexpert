<script src="<?= base_url()."assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">
// $(document).ready( function () {
//     $('#userlist_datatable').DataTable();
// } );

// $(document).ready( function () {
//     $('#userlist_datatable').DataTable({
//       "ajax": {
//             url : "</?php echo site_url("books/books_page") ?>",
//             type : 'POST'
//         },
//    });
// } );

// var starCountRef = firebase.database().ref('online_technician');
//   starCountRef.on('value', function(snapshot) {
//     snapshot.forEach((child) => {
//       console.log(child.key);
//       console.log(child.val().user_id);
//
//     });
//   });

  // starCountRef.on('value', function(snapshot) {
  //   console.log(snapshot.val());
  //   console.log(snapshot.val().user_id);
  // });


// firebase.database().ref('online_technician').child("I would like to dine with").on('value', (snapshot) => {
//   snapshot.forEach((child) => {
//     console.log(child.key, child.val());
//     this.intVal.push(child.val());
//     console.log("intVal",this.intVal);
//   });
// });

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
  var data_table = $('#userlist_datatable').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'userlist/view_users',
              type : 'POST',
            },
      });
  });

  $(document).on('click','.add-technician',function(e){
     e.preventDefault();
     var data_id = $(this).attr('data-id');
     let new_array = [];
     let checker = '';
    $.ajax({
        url     : <?php base_url(); ?>'/speedyrepair/technicianlist/view_establishments/' + data_id,
        type    : 'POST',
        dataType: 'json',
        success : function(data){
           var txt = '';
           $('#brand_e').empty();
           if(data != ''){
             for (var i = 0; i < data.length; i++) {
                 if(data[i].brand_establishment != ''){

                    check = jQuery.inArray(data[i].brand_establishment, new_array );

                    if (check === -1){
                       new_array.push(data[i].brand_establishment);
                    }

                 }
             }
             for (var i = 0; i < new_array.length; i++) {

                 txt += `
                 <option value="${new_array[i]}">${new_array[i]}</option>
                 `;
             }
              $('#brand_e').html(txt);
           }
        },
        error: function() {
           alert(data);
        }
     });

     $.ajax({
         url     : <?php base_url(); ?>'/speedyrepair/technicianlist/assign_service_center/' + data_id,
         type    : 'POST',
         dataType: 'json',
         success : function(data1){
            var txt = '';
            $('#assignment').empty();

            txt += `
            <option value="0">Not Assigned</option>
            `;

              for (var i = 0; i < data1.length; i++) {

                  txt += `
                  <option value="${data1[i].service_center_id}">${data1[i].sc_name}</option>
                  `;
              }
               $('#assignment').html(txt);
               $('#addUser').modal('show');
         },
         error: function(data1) {
            console.log(data1);
         }
      });
  });


  $(document).on('click','.edit_user',function(e){
     e.preventDefault();
     var data_id = $(this).attr('data-id');
     let new_array = [];
     let checker = '';
    $.ajax({
        url     : <?php base_url(); ?>'/speedyrepair/technicianlist/view_establishments/' + data_id,
        type    : 'POST',
        dataType: 'json',
        success : function(data){
           var txt = '';
           $('#edit_brand_e').empty();
           if(data != ''){
              for (var i = 0; i < data.length; i++) {
                 if(data[i].brand_establishment != ''){

                    check = jQuery.inArray(data[i].brand_establishment, new_array );

                    if (check === -1){
                       new_array.push(data[i].brand_establishment);
                    }

                 }
              }
              for (var i = 0; i < new_array.length; i++) {

                 txt += `
                 <option value="${new_array[i]}">${new_array[i]}</option>
                 `;
              }
              $('#edit_brand_e').html(txt);
              $('input[name="id_value_id"]').val(data_id);
           }
        },
        error: function() {
           alert(data);
        }
     });

     $.ajax({
         url     : <?php base_url(); ?>'/speedyrepair/technicianlist/assign_service_center/' + data_id,
         type    : 'POST',
         dataType: 'json',
         success : function(data1){
            var txt = '';
            $('#edit_assignment').empty();

              for (var i = 0; i < data1.length; i++) {

                  txt += `
                  <option value="${data1[i].service_center_id}">${data1[i].sc_name}</option>
                  `;
              }
              txt += `
              <option value="0">Not Assigned</option>
              `;
               $('#edit_assignment').html(txt);
         },
         error: function(data1) {
            console.log(data1);
         }
      });

     var base_url = "<?php echo base_url();?>technicianlist/edit_user/";
     $.ajax({
         type : "GET",
         url  : base_url + data_id,
         success: function(data){
            let result = JSON.parse(data);
            // alert(result[0].program_type);

            $('[name="edit_fname"]').val(result[0].first_name);
            $('[name="edit_lname"]').val(result[0].last_name);
            $('[name="edit_address"]').val(result[0].address);
            $('[name="edit_email"]').val(result[0].email);
            $('[name="edit_contact"]').val(result[0].contact_number);
            $('[name="edit_username"]').val(result[0].username);
            $('[name="edit_password"]').val(result[0].password);

            for (var i = 0; i < data.length; i++) {
               $("#edit_brand_e option").each(function(){
                   if($(this).val()==result[0].brand_establishment){
                       $(this).attr("selected","selected");
                   }
               });
            }

            for (var i = 0; i < data.length; i++) {
               $("#edit_assignment option").each(function(){
                   if($(this).val()==result[0].sc_name){
                       $(this).attr("selected","selected");
                   }
               });
            }

            $('#editUser').modal('show');
         },
         error: function(data) {
            alert(data);
         }
     });

  });

    // $(document).on('click','.select_shipper_btn',function(e){
    //    e.preventDefault();
    //       var status = $(this).attr('data-origin');
    //       var data_id = $(this).attr('data-id');
    //      $.ajax({
    //          url     : </?php base_url(); ?>'/loadboard/loads/view_load/'+status,
    //          type    : 'POST',
    //          dataType: 'json',
    //          success : function(data){
    //             var txt = '';
    //             $('.select_shipper').empty();
    //             if(data != ''){
    //                for (var i = 0; i < data.length; i++) {
    //                   txt += `
    //                      <option value="${data[i].user_id}">${data[i].username}</option>
    //                     `;
    //                }
    //                $('input[name="load_id_row"]').val(data_id);
    //                $('.select_shipper').html(txt);
    //                $('.bs-example-modal-lg').modal('show');
    //             }
    //          }
    //     });
    // });

// }); // End Document Ready Function

$(document).ready(function(){
   let username_state = false;
   let email_state = false;
   let e_username_state = false;
   let e_email_state = false;

 $('#username').on('blur', function(){
  var username = $('#username').val();
  $.ajax({
    url: '<?php echo base_url();?>technicianlist/verify_username',
    type: 'post',
    data: {'username' : username},
    success: function(response){
      if (response == 'taken' ) {
         username_state = false;
      	$('#username').css("border", "1px solid red");
      	$('#username').siblings("span").text('Username already taken');
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
    url: '<?php echo base_url();?>technicianlist/verify_email',
    type: 'post',
    data: {'email' : email},
    success: function(response){
      if (response == 'taken' ) {
         email_state = false;
      	$('#email').css("border", "1px solid red");
      	$('#email').siblings("span").text('Email Address already taken');
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

 $('#add_technician_form').on('submit', function(e){
  e.preventDefault();
  if (username_state == false || email_state == false) {
    $('.error_msg').text('Replace input on highlighted field/s.');

  }else{
     $('.error_msg').text('');
     var form_data = $('#add_technician_form').serialize();

     // proceed with form submission
     $.ajax({
        url: '<?php echo base_url();?>technicianlist/add_user',
        type: 'post',
        data: form_data,
        success: function(response){

           Swal.fire({
           title: 'New manufacturer has been added.',
           type: 'success',
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'OK'
          }).then((result) => {
            location.reload();
          })
        }
     });
  }
});
// edit user validation
 $('#edit_username').on('blur', function(){
  var username = $('#edit_username').val();
  var id = $('#id_value_id').val();
  $.ajax({
    url: '<?php echo base_url();?>technicianlist/verify_username',
    type: 'post',
    data: {'username' : username, 'id': id},
    success: function(response){
      if (response == 'taken' ) {
         e_username_state = false;
      	$('#edit_username').css("border", "1px solid red");
      	$('#edit_username').siblings("span").text('Username already taken');
      }else if (response == 'not_taken') {
         e_username_state = true;
         $('#edit_username').css("border", "1px solid #ced4da");
      	$('#edit_username').siblings("span").text('');
      }

      if(username = ''){
         e_username_state = false;
         $('#edit_username').css("border", "1px solid #ced4da");
      	$('#edit_username').siblings("span").text('');
      }
    }
  });
 });

 $('#edit_email').on('blur', function(){
  var email = $('#edit_email').val();
  var id = $('#id_value_id').val();
  $.ajax({
    url: '<?php echo base_url();?>technicianlist/verify_email',
    type: 'post',
    data: {'email' : email, 'id' : id},
    success: function(response){
      if (response == 'taken' ) {
         e_email_state = false;
      	$('#edit_email').css("border", "1px solid red");
      	$('#edit_email').siblings("span").text('Email Address already taken');
      }else if (response == 'not_taken') {
         e_email_state = true;
         $('#edit_email').css("border", "1px solid #ced4da");
      	$('#edit_email').siblings("span").text('');
      }

      if(email = ''){
         e_email_state = false;
         $('#edit_email').css("border", "1px solid #ced4da");
      	$('#edit_email').siblings("span").text('');
      }
    }
  });
 });

 $('#edit_technician_form').on('submit', function(e){
  e.preventDefault();
  if (e_username_state == false || e_email_state == false) {
    $('.error_msg').text('Replace input on highlighted field/s.');

  }else{
     $('.error_msg').text('');
     var form_data = $('#edit_technician_form').serialize();

     // proceed with form submission
     $.ajax({
        url: '<?php echo base_url();?>technicianlist/update_user',
        type: 'post',
        data: form_data,
        success: function(response){

           Swal.fire({
           title: 'Manufacturer has been updated.',
           type: 'success',
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'OK'
          }).then((result) => {
            location.reload();
          })
        }
     });
  }
});

 // $('#add_technician_form').on('submit', function(e){
 //   e.preventDefault();
 //   var form = $(this);
 // 	if (username_state == false || email_state == false) {
	//   $('.error_msg').text('Replace input on highlighted field/s.');
	// }
 //   else{
 //
 //      $.ajax({
 //         url: '</?php echo base_url();?>userlist/add_user',
 //      	type: 'post',
 //      	data: $('#add_technician_form').serialize(),
 //      	success: function(response){
 //            location.reload();
 //            Swal.fire({
 //             title: 'New user has been added.',
 //             type: 'success',
 //             confirmButtonColor: '#3085d6',
 //             cancelButtonColor: '#d33',
 //             confirmButtonText: 'OK'
 //           }).then((result) => {
 //
 //           })
 //      	}
 //      });
 // 	}
 // });
});
</script>
