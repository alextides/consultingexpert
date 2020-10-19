<script src="<?= base_url() . "assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . "assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">
   $(document).on('click', '.toggle-password', function() {
      if ($('.ti-lock').length) {
         $('i.toggle-icon').removeClass('ti-lock');
         $('i.toggle-icon').addClass('ti-unlock');
      } else {
         $('i.toggle-icon').removeClass('ti-unlock');
         $('i.toggle-icon').addClass('ti-lock');
      }

      if ($('.display-pw').attr("type") == "password") {
         $('.display-pw').attr("type", "text");
      } else {
         $('.display-pw').attr("type", "password");
      }
   });

   $(document).on('click', '.delete_file', function(e) { //delete file
      e.preventDefault();
      Swal.fire({
         title: 'Are you sure to delete this file?',
         text: "Proceeding will delete the file's data and access.",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete file.'
      }).then((result) => {
         if (result.value) {
            window.location.replace($(this).attr('href'));
         }
      });
   });

   $(document).ready(function(e) { //view files uploaded
      var filter_user_type = "";
      var base_url = "<?php echo base_url(); ?>";
      var data_table = $('#filelist_datatable').DataTable({
         "pageLength": 10,
         "serverSide": true,
         "order": [
            [0, "asc"]
         ],
         "ajax": {
            url: base_url + 'managefiles/getfiles',
            type: 'POST',
         },
      });
   });

   $(document).on('click', '.edit_file', function(e) { //edit button - view files by user_id
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>managefiles/edit_file/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            $('[name="file_title"]').val(result[0].file_title);
            $('[name="file_name"]').val(result[0].file_name);
            $('[name="fk_user_id"]').val(result[0].fk_user_id);
            $('[name="file_id"]').val(result[0].file_id);
            // $('[name="uploaded_by"]').val(result[0].uploaded_by);

            $('#editFileModal').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });

   });

   $('#editFilesForm').on('submit', function(e) { //update button - Manage Files
      e.preventDefault();
      $('.error_msg').text('');
      var form_data = $('#editFilesForm').serialize();

      // proceed with form submission
      $.ajax({
         url: '<?php echo base_url(); ?>managefiles/update_file',
         type: 'post',
         data: form_data,
         success: function(response) {

            Swal.fire({
               title: 'File has been updated.',
               type: 'success',
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'OK'
            }).then((result) => {
               location.reload();
            })
         }
      });

   });

   $(document).on('click', '.add-technician', function(e) {
      $('#addUser').modal('show');

   });

   $(document).ready(function() {
      let username_state = false;
      let email_state = false;
      let e_username_state = false;
      let e_email_state = false;

      $('#username').on('blur', function() {
         var username = $('#username').val();
         $.ajax({
            url: '<?php echo base_url(); ?>userlist/verify_username',
            type: 'post',
            data: {
               'username': username
            },
            success: function(response) {
               if (response == 'taken') {
                  username_state = false;
                  $('#username').css("border", "1px solid red");
                  $('#username').siblings("span").text('Username already taken.');
               } else if (response == 'not_taken') {
                  username_state = true;
                  $('#username').css("border", "1px solid #ced4da");
                  $('#username').siblings("span").text('');
               }

               if (username = '') {
                  username_state = false;
                  $('#username').css("border", "1px solid #ced4da");
                  $('#username').siblings("span").text('');
               }
            }
         });
      });

      $('#email').on('blur', function() {
         var email = $('#email').val();
         $.ajax({
            url: '<?php echo base_url(); ?>userlist/verify_email',
            type: 'post',
            data: {
               'email': email
            },
            success: function(response) {
               if (response == 'taken') {
                  email_state = false;
                  $('#email').css("border", "1px solid red");
                  $('#email').siblings("span").text('Email Address already taken.');
               } else if (response == 'not_taken') {
                  email_state = true;
                  $('#email').css("border", "1px solid #ced4da");
                  $('#email').siblings("span").text('');
               }

               if (email = '') {
                  email_state = false;
                  $('#email').css("border", "1px solid #ced4da");
                  $('#email').siblings("span").text('');
               }
            }
         });
      });

      $('#add_technician_form').on('submit', function(e) {
         e.preventDefault();
         if (username_state == false || email_state == false) {
            $('.error_msg').text('Replace input on highlighted field/s.');

         } else {
            $('.error_msg').text('');
            var form_data = $('#add_technician_form').serialize();

            // proceed with form submission
            $.ajax({
               url: '<?php echo base_url(); ?>userlist/add_user',
               type: 'post',
               data: form_data,
               success: function(response) {

                  Swal.fire({
                     title: 'New User has been added.',
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
      $('#edit_username').on('blur', function() {
         var username = $('#edit_username').val();
         var id = $('#id_value_id').val();
         $.ajax({
            url: '<?php echo base_url(); ?>userlist/verify_username',
            type: 'post',
            data: {
               'username': username,
               'id': id
            },
            success: function(response) {
               if (response == 'taken') {
                  e_username_state = false;
                  $('#edit_username').css("border", "1px solid red");
                  $('#edit_username').siblings("span").text('Username already taken');
               } else if (response == 'not_taken') {
                  e_username_state = true;
                  $('#edit_username').css("border", "1px solid #ced4da");
                  $('#edit_username').siblings("span").text('');
               }

               if (username = '') {
                  e_username_state = false;
                  $('#edit_username').css("border", "1px solid #ced4da");
                  $('#edit_username').siblings("span").text('');
               }
            }
         });
      });

      $('#edit_email').on('blur', function() {
         var email = $('#edit_email').val();
         var id = $('#id_value_id').val();
         $.ajax({
            url: '<?php echo base_url(); ?>userlist/verify_email',
            type: 'post',
            data: {
               'email': email,
               'id': id
            },
            success: function(response) {
               if (response == 'taken') {
                  e_email_state = false;
                  $('#edit_email').css("border", "1px solid red");
                  $('#edit_email').siblings("span").text('Email Address already taken');
               } else if (response == 'not_taken') {
                  e_email_state = true;
                  $('#edit_email').css("border", "1px solid #ced4da");
                  $('#edit_email').siblings("span").text('');
               }

               if (email = '') {
                  e_email_state = false;
                  $('#edit_email').css("border", "1px solid #ced4da");
                  $('#edit_email').siblings("span").text('');
               }
            }
         });
      });


   });
</script>