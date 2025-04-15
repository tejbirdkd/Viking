<?php
include('includes/header.php');
include('../connect.php');

?>
<style>
        .table {
    min-width: 1000px;
}

.table th,
.table td {
    white-space: nowrap;
    text-align: center;
    vertical-align: middle;
}

.table-responsive {
    max-height: 500px;
    overflow-y: auto;
}

.btn {
    margin: 2px;
}

.table-dark th {
    background-color: #343a40;
    color: #fff;
}
</style>
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">VIKING</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                                        <li class="breadcrumb-item active">Data</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
               <!-- /////////////////////////////////////////--table--///////////////////////////// -->
               <div class="card">
                    <div class="card-body">
                    <?php if (isset($_GET['success'])): ?>
                    <div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 15px;">
                        <?php echo htmlspecialchars($_GET['success']); ?>
                    </div>
                <?php endif; ?>
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr style="text-align: center;">
                                    <th scope="col">S.no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $maintenance_sql = "SELECT * FROM tower_inspection t1 
                                                            LEFT JOIN users t2 ON t1.user_id = t2.id 
                                                            WHERE t1.form_type = 'public';";

                                        $maintenance_result = $conn->query($maintenance_sql);
                                                    
                                                if ($maintenance_result->num_rows > 0) {
                                                    while ($rows = $maintenance_result->fetch_assoc()) {

                                                         // Skip blank rows
                                                        if (empty($rows['name']) && empty($rows['email']) && empty($rows['company'])) {
                                                            continue;
                                                        }
                                                        ?>
                                                         
                                                        

                                                            <tbody>
                                                            <th scope="col"><?php echo $i; ?></th>
                                                            <th scope="col"><?php echo $rows['name']; ?></th>
                                                            <th scope="col"><?php echo $rows['email']; ?></th>
                                                            <th scope="col"><?php echo $rows['company']; ?></th>
                                                            <th scope="col"><?php echo date('d-F-Y', strtotime($rows['created_at'])); ?></th>
                                                            <th scope="col">
                                                            <a href="user-form-data.php?id=<?php echo $rows['id']; ?>"><button class="btn btn-primary">View</button></a>

                                                                <!-- <a href="deletedata.php?id=<?php echo $rows['id']; ?>"><button class="btn btn-danger">Delete</button></a> -->

                                                            </th>

                                                            </tbody>
                                                                                
                                                        <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    echo "No data found in maintenance_issues.";
                                                }
                                        ?>
                                 </table>
                        </div>
      

    </div>
</div>
               <!-- /////////////////////////////////////////--table--///////////////////////////// -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <!-- <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div> -->
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
 

    <?php
include('includes/footer.php');
?>