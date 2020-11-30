<script src="<?= base_url()."assets"; ?>/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()."assets"; ?>/js/responsive.dataTables.min.js"></script>
<script type="text/javascript">


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
});
</script>
