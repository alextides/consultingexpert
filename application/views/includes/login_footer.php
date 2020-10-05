<script src="<?=base_url()?>assets/module/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?=base_url()?>assets/module/bootstrap/js/popper.min.js"></script>
<script src="<?=base_url()?>assets/module/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/module/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?=base_url()?>assets/js/formvalidate.js"></script>
<!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

<script >
    $(document).ready(function(){
        $("#loginform").validate({
                rules: {
                    username: "required",
                    password: "required",
                   
                },
                messages: {             
                    username: "Username is required",
                    password: "Password is required",                  
                }
        });
    })
</script>

<?php 
    $hasErr = $this->session->flashdata('log_err');
if(isset($hasErr)){?>  
    <script>
        $(document).ready(function(){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?=$this->session->flashdata('log_err')?>',
            })
        })
    </script>
<?php }?>

<script>


    
</script>