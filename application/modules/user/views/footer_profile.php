<script src="<?=base_url()?>assets/js/vue.min.js"></script>
<script src="<?=base_url()?>assets/js/axios.js"></script>

<script src="<?=base_url()?>assets/module/jquery/jquery.min.js"></script>
 <script src="<?=base_url()?>assets/js/formvalidate.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="<?=base_url()?>assets/module/bootstrap/js/popper.min.js"></script>
<script src="<?=base_url()?>assets/module/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?=base_url()?>assets/module/ps/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="<?=base_url()?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?=base_url()?>assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?=base_url()?>assets/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="<?=base_url()?>assets/module/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/module/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
 <script src="<?=base_url()?>assets/module/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?=base_url()?>assets/module/sweetalert2/sweet-alert.init.js"></script>
<script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
<script>

     const base_url ="<?= base_url()?>";
     var vueapp = new Vue({
         el:"#vueapp",
         data(){
             return{

             }
         },
         methods:{

         },
         computed:{

         },
         mounted(){

         }
     })

    $(document).ready(function(){

       $("#profileform").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                username: "required",
                password: "required",
                gender: "required",
                address: "required",
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                last_name: "Last name is required",
                first_name: "First name is required",
                username: "Username is required",
                password: "Password is required",
                email: "Email is required",
                address: "Address is required",
                 gender: "Gender is required",
            }
        });

    })
</script>


<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?=base_url()?>assets/module/styleswitcher/jQuery.style.switcher.js"></script>
 </body>
</html>
