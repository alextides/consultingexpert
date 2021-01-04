<script src="<?= base_url() ?>assets/module/jquery/jquery.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="<?= base_url() ?>assets/module/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/module/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>assets/module/ps/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="<?= base_url() ?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="<?= base_url() ?>assets/module/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/module/morrisjs/morris.min.js"></script>
<!--c3 JavaScript -->
<script src="<?= base_url() ?>assets/module/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/module/c3-master/c3.min.js"></script>
<!-- Popup message jquery -->
<script src="<?= base_url() ?>assets/module/oast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="<?= base_url() ?>assets/js/dashboard1.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>