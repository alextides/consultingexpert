<script src="<?= base_url() . "assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() . "assets"; ?>/js/responsive.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>payment-assets/css/bootstrap.min.css">
<script type="text/javascript">

   $(document).ready(function(e) { //view files uploaded
      var filter_user_type = "";
      var base_url = "<?php echo base_url(); ?>";
      var data_table = $('#dddapplication_datatable').DataTable({
         "pageLength": 10,
         "serverSide": true,
         "order": [
            [0, "asc"]
         ],
         "ajax": {
            url: base_url + 'mydddapplicationform/get_dddapplication',
            type: 'POST',
         },
      });
   });

   $(document).on('click', '.step1', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_step1_details/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            $('[name="fk_user_id"]').val(result[0].fk_user_id);
            $('[name="user_step1_id"]').val(result[0].step1_id);

            $('[name="selected_services"]').val(result[0].services);
            $('[name="website"]').val(result[0].website);
            $('[name="agency"]').val(result[0].agency);

            $('[name="website_invoice"]').val(result[0].website_invoice);
            $('[name="agency_invoice"]').val(result[0].agency_invoice);
            $('#step1').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });
</script>