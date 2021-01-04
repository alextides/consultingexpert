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
      // e.preventDefault();
      // var data_id = $(this).attr('data-userid');
      // let new_array = [];
      // let checker = '';
      //
      // var base_url = "</?php echo base_url(); ?>mydddapplicationform/get_ddd_application/";
      // $.ajax({
      //    type: "GET",
      //    url: base_url + data_id,
      //    success: function(data) {
      //       let result = JSON.parse(data);
      //       // $('[name="fk_user_id"]').val(result[0].fk_user_id);
      //       $('[name="ddd_application_id"]').val(result[0].ddd_application_id);

      // $('[name="selected_services"]').val(result[0].services);
      // $('[name="website"]').val(result[0].website);
      // $('[name="agency"]').val(result[0].agency);

      // $('[name="website_invoice"]').val(result[0].website_invoice);
      // $('[name="agency_invoice"]').val(result[0].agency_invoice);
      $('#step1').modal('show');
      //    },
      //    error: function(data) {
      //       alert(data);
      //    }
      // });
   });

   $(document).on('click', '.step1_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-sid');
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
      var data_id = $(this).attr('data-sid');
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
            $('#payment_btn').attr('data-sid', data_id);
            $('#step2').modal('show');
         },
         error: function(data) {
            alert(result[0]);
         }
      });
   });

   $(document).on('click', '.step2_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-sid');
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

   $(document).on('click', '#payment_btn', function(e) {
      var step_id = $(this).attr('data-sid');
      var base_url = "<?php echo base_url(); ?>paymentinvoice/redirectPayment/" + step_id;
      window.open(base_url, '_blank');
   })

   $(document).on('click', '.step3', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-sid');
      var form_id = $(this).attr('data-fid');
      $('#form_id_step3').val(form_id);
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

   $(document).on('click', '.step4', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-sid');
      // var form_id = $(this).attr('data-fid');
      // $('#form_id_step3').val(form_id);
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_ci_formlist_step3_admin/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);
            $('[name="ws_url1"]').val(result[0].ws_url1);
            $('[name="ws_url2"]').val(result[0].ws_url2);
            $('[name="ws_url3"]').val(result[0].ws_url3);
            $('[name="irs_ein"]').val(result[0].irs_ein);
            $('[name="irs_ein_file"]').val(result[0].irs_ein_file);
            $('[name="irs_submitted"]').val(result[0].irs_submitted);
            $('[name="irs_mailed"]').val(result[0].irs_mailed);
            $('[name="irs_rdate"]').val(result[0].irs_rdate);
            $('[name="irs_cspecialist"]').val(result[0].irs_cspecialist);
            $('[name="nia_file"]').val(result[0].nia_file);
            $('[name="nia_ddate"]').val(result[0].nia_ddate);
            $('[name="nia_bplan"]').val(result[0].nia_bplan);
            $('[name="nia_cplan"]').val(result[0].nia_cplan);
            $('[name="app_denial_file"]').val(result[0].app_denial_file);
            $('[name="ad_rdate"]').val(result[0].ad_rdate);
            $('[name="ad_rfocus"]').val(result[0].ad_rfocus);
            $('[name="ad_mdate"]').val(result[0].ad_mdate);

            $('[name="nca_file"]').val(result[0].nca_file);
            $('[name="npa_file"]').val(result[0].npa_file);
            $('[name="padate"]').val(result[0].padate);
            $('[name="na_file"]').val(result[0].na_file);


            $('#step4').modal('show');
         },
         error: function(data) {
            alert(data);
         }
      });
   });

   $(document).on('click', '.step3_details_btn', function(e) { //step1_details button - view step1_details details by user_id on modal
      e.preventDefault();
      var data_id = $(this).attr('data-sid');
      let new_array = [];
      let checker = '';

      var base_url = "<?php echo base_url(); ?>mydddapplicationform/get_step3_details/";
      $.ajax({
         type: "GET",
         url: base_url + data_id,
         success: function(data) {
            let result = JSON.parse(data);

            // alert(result);
            // console.log(result);

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