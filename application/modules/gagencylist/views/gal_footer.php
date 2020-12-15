<script src="<?= base_url()."assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/js/responsive.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/js/croppie.js"></script>
<script type="text/javascript">

  $(document).on('click', '.choose-picture', function(){
    $('.remove-pic').show();
  });

  $(document).on('click', '.edit-picture', function(){
    $('.edit-remove-pic').show();
  });

  $(document).on('click', '.remove-pic', function(){
    $('#upload-demo').hide();
    $('#img').show();
    // $('#cancel').show();
    $('.remove-pic').hide();
  });

  $(document).on('click', '.edit-remove-pic', function(){
    $('#edit-upload-demo').hide();
    $('#edit-img').show();
    $('.edit-remove-pic').hide();
  });


  $(document).ready(function(e){
    var base_url = "<?php echo base_url();?>";
    var data_table = $('#gagencylist_datatable').DataTable({
       "pageLength" : 10,
       "serverSide": true,
       "order": [[0, "asc" ]],
       "ajax":{
                url :  base_url+'gagencylist/view_agencies',
                type : 'POST',
              },
        });

    $(document).on('click','.view_agency',function(e){
       e.preventDefault();
       var data_id = $(this).attr('data-id');
       let new_array = [];
       let checker = '';
       var base_url = "<?php echo base_url();?>gagencylist/edit_agency/";
       $.ajax({
           type : "GET",
           url  : base_url + data_id,
           success: function(data){
              let result = JSON.parse(data);
              // alert(result[0].program_type);

              $('span#view_aname').text(result[0].agency_name);
              $('span#view_adescription').text(result[0].agency_description);

              var src1 = '<?php echo base_url(); ?>assets/images/agencies/' + result[0].agency_image;
              $("#view-img").attr("src", src1);

              $('#viewAgency').modal('show');
           },
           error: function(data) {
              alert(data);
           }
       });

    });


    $(document).on('click','.edit_agency',function(e){
       e.preventDefault();
       var data_id = $(this).attr('data-id');
       let new_array = [];
       let checker = '';
       var base_url = "<?php echo base_url();?>gagencylist/edit_agency/";
       $.ajax({
           type : "GET",
           url  : base_url + data_id,
           success: function(data){
              let result = JSON.parse(data);
              // alert(result[0].program_type);

              $('[name="id_agency_id"]').val(result[0].gagency_id);
              $('[name="edit_aname"]').val(result[0].agency_name);
              $('[name="edit_adescription"]').val(result[0].agency_description);

              var src1 = '<?php echo base_url(); ?>assets/images/agencies/' + result[0].agency_image;
              $("#edit-img").attr("src", src1);

              $('#editAgency').modal('show');
           },
           error: function(data) {
              alert(data);
           }
       });

    });


    $(document).on('click','.delete_agency',function(e){
       e.preventDefault();
       Swal.fire({
       title: 'Are you sure to delete this agency?',
       text: "Proceeding will delete the agency.",
       type: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, delete agency.'
       }).then((result) => {
          if (result.value) {
             window.location.replace($(this).attr('href'));
          }
       });
    });

    $('input[name="pic"]').click(function(){
       $('#upload-demo').show();
       $('#img').hide();
       // $('#cancel').show();
       $('.remove_pic').hide();
    });

    $('input[name="edit-pic"]').click(function(){
       $('#edit-upload-demo').show();
       $('#edit-img').hide();
       // $('#cancel').show();
       $('.remove_pic').hide();
    });

    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $editUploadCrop = $('#edit-upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });


    function readURL1(input) {
         if (input.files && input.files[0]) {
             var reader1 = new FileReader();

             reader1.onload = function (e) {
                 $('#img')
                     .attr('src', e.target.result)
                     .width(150)
                     .height(150);
             };

             reader1.readAsDataURL(input.files[0]);
         }
    }

    function readURL2(input) {
         if (input.files && input.files[0]) {
             var reader2 = new FileReader();

             reader2.onload = function (e) {
                 $('#edit-img')
                     .attr('src', e.target.result)
                     .width(150)
                     .height(150);
             };

             reader2.readAsDataURL(input.files[0]);
         }
    }

    function readFile1(input) {

       if (input.files && input.files[0]) {
       var reader1 = new FileReader();

       reader1.onload = function (e) {
          $('#upload-demo').croppie('bind', {
            url: e.target.result
          });
          // $('.actionUpload').toggle();
       }

       reader1.readAsDataURL(input.files[0]);
       }
    }

    function readFile2(input) {

       if (input.files && input.files[0]) {
       var reader2 = new FileReader();

       reader2.onload = function (e) {
          $('#edit-upload-demo').croppie('bind', {
            url: e.target.result
          });
          // $('.actionUpload').toggle();
       }

       reader2.readAsDataURL(input.files[0]);
       }
    }

    $('.actionUpload').on('change', function () { readFile1(this); });

    $('.edit-actionUpload').on('change', function () { readFile2(this); });

    $(document).on('click','.upload-result',function(e){
       e.preventDefault();
       if ($('#aname').val() == '') {
         $('.error_msg').text('Agency name is required.');

       }else{
          $('.error_msg').text('');

          Swal.fire({
             title: 'Are you sure?',
             text: "A new agency will be added.",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Add it!'
             }).then((result) => {
             if (result.value) {
                $uploadCrop.croppie('result', {
                     type: 'canvas',
                     size: 'original'
                }).then(function (resp) {
                     $('#imagebase64').val(resp);
                     $('#add_agency_form').submit();
                });
             }
          });
       }

    });

    $(document).on('click','.edit-upload-result',function(e){
       e.preventDefault();
       if ($('#edit_aname').val() == '') {
         $('.edit_error_msg').text('Agency name is required.');

       }else{
          $('.edit_error_msg').text('');

          Swal.fire({
             title: 'Are you sure?',
             text: "The agency will be updated.",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Update it!'
             }).then((result) => {
             if (result.value) {
                $editUploadCrop.croppie('result', {
                     type: 'canvas',
                     size: 'original'
                }).then(function (resp) {
                     $('#edit-imagebase64').val(resp);
                     $('#edit_agency_form').submit();
                });
             }
          });
       }
    });

  });
</script>
