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
                <h3 class="text-themecolor">Files</h3>
            </div>
         
        </div>
       
        <!-- startt -->
        <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Date Uploaded</th>
                                                <th>Uploaded By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="file in allfiles" :key="file.file_id">
                                                <td>{{file.file_name}}</td>
                                                <td>{{file.uploaded_date}}</td>
                                                <td>{{file.first_name}}</td>
                                                <td class="text-center actionsbtn">
                                                    <a :href="b_url+'assets/uploads/'+file.file_name" target="_blank" class="text-success" style="font-size:14px;"><i class="fas fa-eye"></i></a>
                                                 
                                                    <a  @click="showDownload(file.file_name, file.file_id)" href="javascript:;"><i class="fas fa-download"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
      
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>