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

   $(document).on('click', '.step1', function(e) { //step1 button
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_ddd_application/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            // $('[name="fk_user_id"]').val(result[0].fk_user_id);
            $('[name="ddd_application_id"]').val(result[0].ddd_application_id);

            // $('[name="selected_services"]').val(result[0].services);
            // $('[name="website"]').val(result[0].website);
            // $('[name="agency"]').val(result[0].agency);

            // $('[name="website_invoice"]').val(result[0].website_invoice);
            // $('[name="agency_invoice"]').val(result[0].agency_invoice);
            $('#step1').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step1_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
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
            // $('[name="ddd_application_id"]').val(result[0].ddd_application_id);

            $('[name="selected_services"]').val(result[0].services);
            $('[name="website"]').val(result[0].website);
            $('[name="agency"]').val(result[0].agency);

            $('[name="website_invoice"]').val(result[0].website_invoice);
            $('[name="agency_invoice"]').val(result[0].agency_invoice);
            $('#step1_details_modal').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step2', function(e) { //step1_details button - view step1_details details by user_id on modal
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
            // $('[name="fk_user_id"]').val(result[0].fk_user_id);
            // $('[name="ddd_application_id"]').val(result[0].ddd_application_id);

            $('[name="website_quote"]').val(result[0].website_quote);
            $('[name="agency_quote"]').val(result[0].agency_quote);

            $('[name="website_invoice"]').val(result[0].website_invoice);
            $('[name="agency_invoice"]').val(result[0].agency_invoice);
            $('#step2').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step2_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_step2_details/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            // $('[name="fk_user_id"]').val(result[0].fk_user_id);
            // $('[name="ddd_application_id"]').val(result[0].ddd_application_id);
            $('[name="paid_website_quote"]').val(result[0].paid_website_quote);
            $('[name="paid_agency_quote"]').val(result[0].paid_agency_quote);
            $('[name="total_paid"]').val(result[0].total_paid);
            $('#step2_details_modal').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step3', function(e) { //step1_details button - view step1_details details by user_id on modal
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
            // $('[name="fk_user_id"]').val(result[0].fk_user_id);
            // $('[name="ddd_application_id"]').val(result[0].ddd_application_id);

            // $('[name="website_quote"]').val(result[0].website_quote);
            // $('[name="agency_quote"]').val(result[0].agency_quote);

            // $('[name="website_invoice"]').val(result[0].website_invoice);
            // $('[name="agency_invoice"]').val(result[0].agency_invoice);
            $('#step3').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step3_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-id');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_step3_details/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            $('[name="website_questionnaire_info"]').val(result[0].website_questionnaire);
            $('[name="website_logo_info"]').val(result[0].website_logo);
            $('[name="agency_first_name1_info"]').val(result[0].agency_first_name1);
            $('[name="agency_last_name1_info"]').val(result[0].agency_last_name1);
            $('[name="agency_first_name2_info"]').val(result[0].agency_first_name2);
            $('[name="agency_last_name2_info"]').val(result[0].agency_last_name2);
            $('[name="agency_name1_info"]').val(result[0].agency_name1);
            $('[name="agency_name2_info"]').val(result[0].agency_name2);
            $('[name="agency_name3_info"]').val(result[0].agency_name3);
            $('[name="agency_address1_info"]').val(result[0].agency_address1);
            $('[name="agency_address2_info"]').val(result[0].agency_address2);
            $('[name="agency_city_info"]').val(result[0].agency_city);
            $('[name="agency_state_info"]').val(result[0].agency_state);
            $('[name="agency_zip_info"]').val(result[0].agency_zip);
            $('[name="agency_tax_year1_info"]').val(result[0].agency_tax_year1);
            $('[name="agency_tax_year2_info"]').val(result[0].agency_tax_year2);
            $('[name="agency_tax_year3_info"]').val(result[0].agency_tax_year3);
            $('[name="agency_resume_info"]').val(result[0].agency_resume);
            $('[name="agency_bank_statement_info"]').val(result[0].agency_bank_statement);
            $('#step3_details_modal').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });
</script>