<style>
    .private-btn {
        padding: 35px;
        font-size: 25px;
        background: #e6f2ff;
        border: 1px solid #9cf;
        border-radius: 9px;
        color: #404040;
        width: 29%;
        margin-left: 40px;
    }

    .select-private {
        margin-top: 50px;
        margin-left: -29px;
    }

    .public-private {
        font-size: 19px;
    }

    .label-public {
        margin-right: 50px;
    }
</style>

<div class="page-wrapper" id="vueapp">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-12 align-self-center">
                <h3 class="text-themecolor">Dashboard</h3>
            </div>

        </div>

        <!-- startt -->
        <div class="select-public-private">
            <div class="public-private">
                <input type="radio" id="public_account" name="public_private" value="Public Account">
                <label for="public_account" class="label-public">Public Account</label>
                <input type="radio" id="private_account" name="public_private" value="Private Account">
                <label for="private_account">Private Account</label>
            </div>

            <div class="select-private">
                <input class="private-btn" type="button" value="Subscription">
                <input class="private-btn" type="button" value="Order a Website">
                <input class="private-btn" type="button" value="Quote for DD Application">
            </div>
        </div>
        <!-- end content -->



    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        Consulting Expert LCC
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>