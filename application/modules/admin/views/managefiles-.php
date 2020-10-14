<style>
    .btn.btn-primary.addfile-btn {
        background: #0f66bd;
    }

    .btn.btn-primary.uploadfile-btn {
        background: #0f66bd;
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
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Manage Files</h3>
            </div>
            <div class="col-md-7 align-self-center text-right d-none d-md-block">
                <button type="button" class="btn btn-primary addfile-btn" data-toggle="modal" data-target="#addFileModal"><i class="fa fa-plus-circle"></i> Add File</button>
            </div>
        </div>
        <!-- startt -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="filesListing" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>Date Uploaded</th>
                                        <th>Uploaded By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="listFiles">
                                    <?php foreach ($files as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['file_name']; ?></td>
                                            <td><?php echo $row['date_uploaded']; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td class="text-center actionsbtn">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary editFile" data-toggle="modal" data-target="#editFileModal" id="<?php echo $row['file_id']; ?>" name="<?php echo $row['file_id']; ?>">Edit</button>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--Add File Modal -->
            <div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addFileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addFileModalLabel"><i class="icon-File"></i> Upload File</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="<?= base_url("admin/upload_file") ?>" id="addFileForm">
                            <div class="modal-body">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="file" size="20" id="file_upload" name="file_upload" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary uploadfile-btn">Upload File</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal End-->

            <!--Edit File Modal -->
            <form id="editFilesForm" method="post">
                <div class="modal fade" id="editFileModal" tabindex="-1" aria-labelledby="editFileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editFileModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">File Name*</label>
                                    <div class="col-md-10">
                                        <input type="text" name="file_name" id="file_name" class="form-control" placeholder="file_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Date Uploaded*</label>
                                    <div class="col-md-10">
                                        <input type="text" name="date_uploaded" id="date_uploaded" class="form-control" placeholder="date_uploaded" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Uploaded By*</label>
                                    <div class="col-md-10">
                                        <input type="text" name="uploaded_by" id="uploaded_by" class="form-control" placeholder="uploaded_by" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <input type="hidden" name="file_id" id="file_id" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End-->
            </form>
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
        Consulting Experts LLC
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

<script>
    $(document).ready(function() {
        $('#listFiles').on('click', '.editFile', function() {
            $('#editFileModal').modal('show');
            $("#empId").val($(this).data('id'));
            $("#empName").val($(this).data('name'));
            $("#empAge").val($(this).data('age'));
        });
    });
</script>