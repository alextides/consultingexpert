<!-- template JS -->
<script src="<?= base_url()."assets"; ?>/js/template.js"></script>
<!-- cPager JS -->
<script src="<?= base_url()."assets"; ?>/js/cPager.js"></script>

<script type="text/javascript">
$(document).ready(function() {

   $("#listShow").cPager({

   // how many items per page
   pageSize: 7,

   // container ID
   pageid: "pager",

   // item class
   itemClass: "li-item"

   });
   var json = { data: [] };
   for (var i = 1; i <= 350; i++) {
       json.data.push({ name: "Username-000" + i });
   }
   $("#listShow").html(TrimPath.processDOMTemplate("listTemplate", json));

   $(this).cPager({
       pageSize: 7,
       pageid: "pager",
       itemClass: "li-item"
   });
   $('li.tz.first').click();
});

</script>
