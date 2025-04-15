<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include('../connect.php');
include('includes/header.php');

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/vm_dev/";
$request_uri = $_SERVER['REQUEST_URI'];
$explode_uri = explode('?', $request_uri);
parse_str($explode_uri[1], $params);
$mainid = isset($params['id']) ? $params['id'] : null;



?>
  <style>
       
        .custom-table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .custom-table thead {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .custom-table tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
        <div class="vertical-overlay"></div>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">MIKING</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                        <li class="breadcrumb-item active">Data</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <!-- <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Input Example</h4>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                        </div>
                                    </div>
                                </div>end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="row gy-4">
                                            <?php
                                              $inspection_sql = "SELECT * FROM tower_inspection WHERE id = $mainid";
                                              $inspection_result = $conn->query($inspection_sql);
                                            
                                              if ($inspection_result->num_rows > 0) {
                                                  $row = $inspection_result->fetch_assoc();
                                                //   echo "<pre>" . print_r($inspection_data, true) . "</pre>";
                                              } else {
                                                  echo "No data found in tower_inspection.";
                                              }
                                              
                                            ?>
                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="basiInput" class="form-label">Inspection Date</label>
                                                    <input type="text" class="form-control" id="basiInput" value="<?php echo $row['inspection_date']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="labelInput" class="form-label"> Inspector Name</label>
                                                    <input type="text" class="form-control" id="labelInput" value="<?php echo $row['inspector_name']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="placeholderInput" class="form-label"> Inspection Company</label>
                                                    <input type="text" class="form-control" id="placeholderInput" placeholder="Placeholder" value="<?php echo $row['inspection_company']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="valueInput" class="form-label"> Client Name</label>
                                                    <input type="text" class="form-control" id="valueInput" value="<?php echo $row['client_name']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyPlaintext" class="form-label"> Tower Owner</label>
                                                    <input type="text" class="form-control" id="valueInput" value="<?php echo $row['tower_owner']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Tower Location</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['tower_location']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Tower Id Name</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['tower_id_name']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label">Tower Type</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['tower_type']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label">Tower Height</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['tower_height']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label">Year of Construction</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['year_of_construction']; ?>" readonly>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xxl-3 col-md-6">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Tower Location</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['tower_owner']; ?>" readonly>
                                                </div>
                                            </div> -->
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="card shadow-lg border-0 rounded-3">
                                                    <div class="card-body text-center">
                                                        <label for="readonlyInput" class="form-label fw-bold text-primary">Photo of Location</label>
                                                        <div class="position-relative">
                                                            <a href="<?php echo $base_url . $row['photo_of_tower']; ?>" download>
                                                                <img src="<?php echo $base_url . $row['photo_of_tower']; ?>" class="img-fluid rounded" alt="Tower Image" style="cursor: pointer;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Structural Critical</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['structural_critical']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Structural Non Critical</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['structural_non_critical']; ?>" readonly>
                                                </div>
                                            </div>


                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Maintenance Critical</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['maintenance_critical']; ?>" readonly>
                                                </div>
                                            </div>


                                            <div class="col-xxl-3 col-md-3">
                                                <div>
                                                    <label for="readonlyInput" class="form-label"> Maintenance Non Critical</label>
                                                    <input type="text" class="form-control" id="readonlyInput" value="<?php echo $row['maintenance_non_critical']; ?>" readonly>
                                                </div>
                                            </div>
                                            
                                          
                                            <hr style="height: 4px;">
                                              
                                            

                                                <?php
                                                    $maintenance_sql = "SELECT * FROM maintenance_issues WHERE inspection_id = $mainid";
                                                    $maintenance_result = $conn->query($maintenance_sql);
                                                  
                                                            if ($maintenance_result->num_rows > 0) {
                                                                while ($maintenance_row = $maintenance_result->fetch_assoc()) {
                                                                    ?>
                                                                    <legend class="toggles"><i class="bi bi-exclamation-circle"></i> Maintenance issues (<?php echo $maintenance_row['priority'] ?>) <span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                                                                        <div class="col-xxl-3 col-md-6">
                                                                            <div>
                                                                                <label for="iconInput" class="form-label">Observation</label>
                                                                                <div class="form-icon">
                                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"><?php echo $maintenance_row['observation'] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-xxl-3 col-md-6">
                                                                            <div>
                                                                                <label for="exampleFormControlTextarea5" class="form-label">Recommendation</label>
                                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"><?php echo $maintenance_row['recommendation'] ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xxl-12 col-md-12">
                                                                            <div class="card shadow-lg border-0 rounded-3">
                                                                                <div class="card-body text-center">
                                                                                    <label for="readonlyInput" class="form-label fw-bold text-primary">Image</label>
                                                                                    <div class="position-relative">
                                                                                        <a href="<?php echo $base_url . $maintenance_row['uploaded_image']; ?>" download>
                                                                                            <img src="<?php echo $base_url . $maintenance_row['uploaded_image']; ?>" class="img-fluid rounded" alt="Tower Image" style="width: 200px;">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                
                                                                                                <?php
                                                                }
                                                            } else {
                                                                echo "No data found in maintenance_issues.";
                                                            }
                                                    ?>
                                                <hr style="height: 4px;">
                                                <?php
                                                    $maintenance_sql = "SELECT * FROM structural_issues WHERE inspection_id = $mainid";
                                                    $maintenance_result = $conn->query($maintenance_sql);

                                                            if ($maintenance_result->num_rows > 0) {
                                                                while ($maintenance_row = $maintenance_result->fetch_assoc()) {
                                                                    ?>
                                                                    <legend class="toggles"><i class="bi bi-exclamation-circle"></i> Structural issues (<?php echo $maintenance_row['priority'] ?>) <span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                                                                        <div class="col-xxl-3 col-md-6">
                                                                            <div>
                                                                                <label for="iconInput" class="form-label">Observation</label>
                                                                                <div class="form-icon">
                                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"><?php echo $maintenance_row['observation'] ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-xxl-3 col-md-6">
                                                                            <div>
                                                                                <label for="exampleFormControlTextarea5" class="form-label">Recommendation</label>
                                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"><?php echo $maintenance_row['recommendation'] ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xxl-12 col-md-12">
                                                                            <div class="card shadow-lg border-0 rounded-3">
                                                                                <div class="card-body text-center">
                                                                                    <label for="readonlyInput" class="form-label fw-bold text-primary">Image</label>
                                                                                    <div class="position-relative">
                                                                                        <a href="<?php echo $base_url . $maintenance_row['uploaded_image']; ?>" download>
                                                                                            <img src="<?php echo $base_url . $maintenance_row['uploaded_image']; ?>" class="img-fluid rounded" alt="Tower Image" style="width: 200px;">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                
                                                                                                <?php
                                                                }
                                                            } else {
                                                                echo "No data found in structural_issues.";
                                                            }
                                                    ?>
                                                <hr style="height: 4px;">
                                                <h3>Maintenance Issues -
                                                Tower (MAINTENANCE)</h3>
                                                <p>The following issues identified are considered lower priority deviations that do not require
                                                        immediate attention but should be considered as part of future tower maintenance activities.
                                                    </p>


                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover custom-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Category & Item Description</th>
                                                                    <th>Non-Compliant Item & Recommendation</th>
                                                                    <th>Photo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                    $structural_sql = "SELECT * FROM maintenance_issues_tower WHERE inspection_id = $mainid";
                                                                    $structural_result = $conn->query($structural_sql);
                                                                    if ($structural_result->num_rows > 0) {
                                                                    
                                                                    while ($row = $structural_result->fetch_assoc()) {
                                                                        ?>
                                                                        <tr>
                                                                        <td style="width:20%;">
                                                                    <p><i class="fa-solid fa-leaf"></i> <?php echo $row['category_description'] ?></p>
                                                                        </td>
                                                                        <td>
                                                                        <p><?php echo $row['non_compliant_item'] ?></p>
                                                                        </td>
                                                                        <td class="images-tow">
                                                                            <a href="<?php echo $base_url . $row['photo']; ?>" download>
                                                                                <img src="<?php echo $base_url . $row['photo']; ?>" style="width:100px;">
                                                                            </a>
                                                                        </td>

                                                                    </tr>

                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo "No data found in structural_issues.";
                                                                }
                                                                ?>
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <hr style="height: 4px;">
                                                    <h3>Deficiency Schedule</h3>
                                                    <div class="table-responsive">
                                             
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover custom-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Deficiency</th>
                                                                    <th>Elevation (ft)</th>
                                                                    <th>Location</th>
                                                                    <th>Notes</th>
                                                                    <th>Category</th>
                                                                    <th>Image</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                     $structural_sql = "SELECT * FROM deficiency_schedule WHERE inspection_id = $mainid";
                                                                     $structural_result = $conn->query($structural_sql);
                                                                     if ($structural_result->num_rows > 0) {
                                                                    
                                                                        while ($row = $structural_result->fetch_assoc()) {
                                                                            ?>
                                                                            <tr>
                                                                            <td style="width:20%;">
                                                                                <p><i class="fa-solid fa-leaf"></i> <?php echo $row['deficiency'] ?></p>
                                                                            </td>
    
                                                                            <td>
                                                                            <p><?php echo $row['elevation'] ?></p>
                                                                            </td>
    
                                                                            <td>
                                                                            <p><?php echo $row['location'] ?></p>
                                                                            </td>
    
                                                                            <td>
                                                                            <p><?php echo $row['notes'] ?></p>
                                                                            </td>
    
                                                                            <td>
                                                                            <p><?php echo $row['category'] ?></p>
                                                                            </td>
    
                                                                            <td class="images-tow">
                                                                            <a href="<?php echo $base_url . $row['image']; ?>" download>
                                                                                <img src="<?php echo $base_url . $row['image']; ?>" style="width:100px;">
                                                                            </a>
                                                                            </td>

                                                                        </tr>
    
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        echo "No data found in structural_issues.";
                                                                    }
                                                                ?>
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>



                                                    <hr style="height: 4px;">

                                                    <!-- ------------------------- Annex J condition checklist------------------------- -->

                                                    <h3> TIA-222-h Annex J condition checklist</h3>
                                                <div class="table-responsive">
                                                        <table class="table table-striped table-hover custom-table">
                                                            <thead>
                                                            <tr class="table-header">
                                                                <th><i class="fa-solid fa-tasks"></i> Inspection Item</th>
                                                                <th><i class="fa-solid fa-check-circle"></i> Condition</th>
                                                                <th><i class="fa-solid fa-clipboard"></i> Item Number / Notes</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-road"></i> A. Site Access Road</th></tr>
                                                            <?php
                                                                $structural_sql = "SELECT * FROM site_condition_checklist WHERE inspection_id = $mainid AND notes = 'site_conditions'";
                                                                $structural_result = $conn->query($structural_sql);


                                                                    $data = $structural_result->fetch_all(MYSQLI_ASSOC);

                                                                ?>
                                                            <tr>
                                                                <td><i class="fa-solid fa-lock"></i> <?php echo $data[0]['inspection_item'] ?> </td>
                                                                <td><p class="pass"><?php echo $data[0]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[0]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-gem"></i> <?php echo $data[1]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[1]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[1]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-water"></i> <?php echo $data[2]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[2]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[2]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-border-all"></i> B. Compound</th></tr>
                                                            <tr>


                                                                <td><i class="fa-solid fa-gem"></i> <?php echo $data[3]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[3]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[3]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-water"></i> <?php echo $data[4]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[4]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[4]['item_number_notes'] ?></td>

                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-cubes"></i> <?php echo $data[5]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[5]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[5]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-bolt"></i> <?php echo $data[6]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $data[6]['item_condition'] ?></p></td>
                                                                <td><?php echo $data[6]['item_number_notes'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>

                                                    <hr style="height: 4px;">
                                                    <!-- -------------------------Guyed Anchor Compound--------------------------- -->

                                                
                                                <div class="table-responsive">
                                                        <table class="table table-striped table-hover custom-table">
                                                        <thead>
                                                          
                                                              <h3>II. GUYED ANCHOR COMPOUNDS</h3>
                                                            <tr class="table-header">
                                                                <th><i class="fa-solid fa-tasks"></i> Inspection Item</th>
                                                                <th><i class="fa-solid fa-check-circle"></i> Condition</th>
                                                                <th><i class="fa-solid fa-clipboard"></i> Item Number / Notes</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                            <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-anchor"></i> A. Guy Anchors</th></tr>
                                                            <?php
                                                                $structural_sql = "SELECT * FROM site_condition_checklist WHERE inspection_id = $mainid AND notes = 'guyed_anchor_compounds'";
                                                                $structural_result = $conn->query($structural_sql);
                                                                $dataguy = $structural_result->fetch_all(MYSQLI_ASSOC);
                                                                // echo "<pre>"; print_r($dataguy); die;

                                                                ?>
                                                            <tr>
                                                                <td><i class="fa-solid fa-gem"></i><?php echo $dataguy[0]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[0]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[0]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-water"></i> <?php echo $dataguy[1]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[1]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[1]['item_number_notes'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><i class="fa-solid fa-link"></i><?php echo $dataguy[2]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[2]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[2]['item_number_notes'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><i class="fa-solid fa-shield-alt"></i> <?php echo $dataguy[3]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[3]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[3]['item_number_notes'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><i class="fa-solid fa-bolt"></i> <?php echo $dataguy[4]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[4]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[4]['item_number_notes'] ?></td>
                                                            </tr>




                                                            <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-link"></i> B. Guy Wires</th></tr>
                                                            <tr>
                                                                <td><i class="fa-solid fa-paint-brush"></i>  <?php echo $dataguy[5]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[5]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[5]['item_number_notes'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td><i class="fa-solid fa-circle"></i>  <?php echo $dataguy[6]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[6]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[6]['item_number_notes'] ?></td>
                                                            </tr>


                                                            <tr>
                                                                <td><i class="fa-solid fa-sync"></i>  <?php echo $dataguy[7]['inspection_item'] ?> </td>
                                                                <td><p class="pass"><?php echo $dataguy[7]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[7]['item_number_notes'] ?></td>
                                                            </tr>


                                                            <tr>
                                                                <td><i class="fa-solid fa-plug"></i>  <?php echo $dataguy[8]['inspection_item'] ?></td>
                                                                <td><p class="pass"><?php echo $dataguy[8]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[8]['item_number_notes'] ?></td>
                                                            </tr>


                                                            <tr>
                                                                <td><i class="fa-solid fa-cog"></i>  <?php echo $dataguy[9]['inspection_item'] ?> </td>
                                                                <td><p class="pass"><?php echo $dataguy[9]['item_condition'] ?></p></td>
                                                                <td><?php echo $dataguy[9]['item_number_notes'] ?></td>
                                                            </tr>

                                                        </tbody>
                                                        </table>
                                                    </div>

                                                    <!-- ------------------------- STRUCTURE CONDITIONS--------------------------- -->

                                                    <hr style="height: 4px;">
                                                 
                                                <div class="table-responsive">
                                                        <table class="table table-striped table-hover custom-table">
                                                        <thead>
                                                            <h3>III. STRUCTURE CONDITIONS</h3>
                                                       
                                                        <tr class="table-header">
                                                            <th><i class="fa-solid fa-tasks"></i> Inspection Item</th>
                                                            <th><i class="fa-solid fa-check-circle"></i> Condition</th>
                                                            <th><i class="fa-solid fa-clipboard"></i> Item Number / Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-cube"></i> A. Tower Base Foundation</th></tr>

                                                        <?php
                                                            $structural_sql = "SELECT * FROM site_condition_checklist WHERE inspection_id = $mainid AND notes = 'structure_conditions'";
                                                            $structural_result = $conn->query($structural_sql);
                                                            $datastruct = $structural_result->fetch_all(MYSQLI_ASSOC);
                                                            // echo "<pre>"; print_r($datastruct); die;

                                                        ?>
                                                        <tr>
                                                            <td><i class="fa-solid fa-cubes"></i> <?php echo $datastruct[0]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[0]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[0]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>
                                                            <td><i class="fa-solid fa-fill"></i> <?php echo $datastruct[1]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[1]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[1]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>
                                                            <td><i class="fa-solid fa-square"></i> <?php echo $datastruct[2]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[2]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[2]['item_number_notes'] ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td><i class="fa-solid fa-bolt"></i><?php echo $datastruct[3]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[3]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[3]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>
                                                            <td><i class="fa-solid fa-cog"></i> <?php echo $datastruct[4]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[4]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[4]['item_number_notes'] ?></td>
                                                        </tr>



                                                        <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-bolt"></i> B. Grounding
                                                        </th></tr>
                                                        <tr>
                                                        <td><i class="fa-solid fa-plug"></i> <?php echo $datastruct[5]['inspection_item'] ?></td>
                                                        <td><p class="fail"><?php echo $datastruct[5]['item_condition'] ?></p></td>
                                                        <td><?php echo $datastruct[5]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>
                                                        <td><i class="fa-solid fa-stream"></i><?php echo $datastruct[6]['inspection_item'] ?></td>
                                                        <td><p class="fail"><?php echo $datastruct[6]['item_condition'] ?></p></td>
                                                        <td><?php echo $datastruct[6]['item_number_notes'] ?></td>
                                                        </tr>

                                                        <tr>
                                                        <td><i class="fa-solid fa-bolt"></i> <?php echo $datastruct[7]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[7]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[7]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-cubes"></i> C. Members

                                                        </th></tr>
                                                        <tr>


                                                            <td><i class="fa-solid fa-exclamation-triangle"></i> <?php echo $datastruct[8]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[8]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[8]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>


                                                            <td><i class="fa-solid fa-bolt"></i> <?php echo $datastruct[9]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[9]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[9]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>


                                                            <td><i class="fa-solid fa-bars"></i> <?php echo $datastruct[10]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[10]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[10]['item_number_notes'] ?></td>
                                                        </tr>




                                                        <tr> <th colspan="3" style="text-align: left;font-size: 12px;color: #000;"><i class="fa-solid fa-paint-brush"></i> D. Finish

                                                        </th></tr>
                                                        <tr>


                                                            <td><i class="fa-solid fa-paint-roller"></i> <?php echo $datastruct[11]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[11]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[11]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>


                                                            <td><i class="fa-solid fa-tint"></i> <?php echo $datastruct[12]['inspection_item'] ?> </td>
                                                            <td><p class="fail"><?php echo $datastruct[12]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[12]['item_number_notes'] ?></td>
                                                        </tr>


                                                        <tr>


                                                            <td><i class="fa-solid fa-water"></i> <?php echo $datastruct[12]['inspection_item'] ?></td>
                                                            <td><p class="fail"><?php echo $datastruct[13]['item_condition'] ?></p></td>
                                                            <td><?php echo $datastruct[13]['item_number_notes'] ?></td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                    </div>

                                                <!-- --------------------------coaxial-layout---------------------------- -->
                                                <div style="display: flex; flex-direction: column; align-items: center; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1200px; margin: 20px auto;">
                                                    <h2 style="color: #333; margin-bottom: 15px;">
                                                        <i class="fa-solid fa-sitemap"></i> Coaxial Layout
                                                    </h2>

                                                    <?php
                                                        $structural_sql = "SELECT * FROM coaxial_layout WHERE inspection_id = $mainid";
                                                        $structural_result = $conn->query($structural_sql);
                                                        $datastruct = $structural_result->fetch_all(MYSQLI_ASSOC);
                                                    ?>

                                                    <img src="<?php echo $base_url . $datastruct[0]['image']; ?>" alt="Coaxial Layout" 
                                                        style="max-width: 100%; height: auto; border-radius: 5px; border: 2px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                                                </div>

                                                <!-- ------------------------------- Anchor Guard System--------------------------------- -->

                                                <hr style="height: 4px;">

                                                <table class="table table-striped table-hover custom-table">
                                                    <h3>Anchor Guard System</h3>
                                                        <?php
                                                            $structural_sql = "SELECT * FROM anchor_guard_system WHERE inspection_id = $mainid";
                                                            $structural_result = $conn->query($structural_sql);
                                                            $datastruct = $structural_result->fetch_all(MYSQLI_ASSOC);
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                        <td width="25%"><label for=""><i class="fa-solid fa-calendar-check"></i> Test Date :</label></td>
                                                        <td width="32%"><p><?php echo $datastruct[0]['test_date'] ?></p></td>
                                                        <td width="25%"><label for=""><i class="fa-solid fa-user-check"></i> Test Performed By :</label></td>
                                                        <td width="32%"><p><?php echo $datastruct[0]['test_performed_by'] ?></p></td>
                                                        </tr>
                                                        <tr>
                                                        <td width="25%"><label for=""><i class="fa-solid fa-plug"></i> Anode Condition :</label></td>
                                                        <td width="32%"><p><?php echo $datastruct[0]['anode_condition'] ?></p></td>
                                                        <td width="19%"><label for=""><i class="fa-solid fa-paint-roller"></i> Protective Coating Integrity :</label></td>
                                                        <td width="32%"><p><?php echo $datastruct[0]['protective_coating_integrity'] ?></p></td>
                                                        </tr>


                                                    </tbody>


                                                    </table>

                                                    <!-- -------------------------DC voltage------------------------- -->
                                                    <table class="table table-striped table-hover custom-table">
                                                        <h3> DC Voltage Readings (mV) on test points C TO G</h3>

                                                        <thead>
                                                            <tr>
                                                                <th><i class="fa-solid fa-anchor"></i> Anchor</th>
                                                                <th><i class="fa-solid fa-tachometer-alt"></i> Measurement (mV)</th>
                                                            </tr>
                                                            </thead>
                                                                <?php
                                                                    $structural_sql = "SELECT * FROM dc_voltage_reading WHERE inspection_id = $mainid";
                                                                    $structural_result = $conn->query($structural_sql);
                                                                    $datastruct = $structural_result->fetch_all(MYSQLI_ASSOC);
                                                                    ?>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_one']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor1']  ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_two']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor2']  ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_three']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor3']  ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_four']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor4']  ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_five']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor5']  ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><?php echo $datastruct[0]['anchor_six']  ?></td>
                                                                            <td><?php echo $datastruct[0]['measurementAnchor6']  ?></td>
                                                                        </tr>
                                                                    </tbody>


                                                        </table>
                                                        <div class="row">
                                                        <div class="col-xxl-3 col-md-6">
                                                            <div>
                                                                <label for="iconInput" class="form-label mt-3">Observation</label>
                                                                <div class="form-icon">
                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"><?php echo $datastruct[0]['observation'];  ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-3 col-md-6">
                                                            <div>
                                                                <label for="iconInput" class="form-label mt-3">Notes on system performance</label>
                                                                <div class="form-icon">
                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"><?php echo $datastruct[0]['notes_of_system_performance'];  ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-3 col-md-6">
                                                            <div>
                                                                <label for="iconInput" class="form-label mt-3">Signs of degradation or failure</label>
                                                                <div class="form-icon">
                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"><?php echo $datastruct[0]['sign_of_degradation'];  ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xxl-3 col-md-6">
                                                            <div>
                                                                <label for="iconInput" class="form-label mt-3">Conclusions and Recommendation</label>
                                                                <div class="form-icon">
                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"><?php echo $datastruct[0]['conclusions_and_recommendation'];  ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xxl-3 col-md-6">
                                                            <div>
                                                                <label for="iconInput" class="form-label mt-3">Summary of findings</label>
                                                                <div class="form-icon">
                                                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="5"><?php echo $datastruct[0]['summary_of_findings'];  ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>

<!-- 
                                                     


                                                        <!-- -------------------------------Tension, Plumb and Twist Report----------------------------------->


                                     <div class="slide2-txt">
                                                <h3>Tension, Plumb and Twist Report</h3>
                                            <div class="clear"></div>
                                        <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                                        <?php
                                                $structural_sql = "SELECT * FROM tension_plumb_and_twist WHERE inspection_id = $mainid";
                                                $structural_result = $conn->query($structural_sql);
                                                $datatension = $structural_result->fetch_all(MYSQLI_ASSOC);
                                            ?>
                                            <tbody>
                                            <tr>
                                            <td width="25%"><label for=""><i class="fa-solid fa-map-marker-alt"></i> Site Name</label></td>
                                            <td width="32%"><p><?php echo $datatension[0]['site_name']  ?></p></td>
                                            <td width="25%"><label for=""><i class="fa-solid fa-id-badge"></i> Site ID</label></td>
                                            <td width="32%"><p><?php echo $datatension[0]['site_id']  ?></p></td>
                                            </tr>
                                            <tr>
                                            <td width="25%"><label for=""><i class="fa-solid fa-user"></i> Customer</label></td>
                                            <td width="32%"><p><?php echo $datatension[0]['customer']  ?></p></td>
                                            <td width="25%"><label for=""><i class="fa-solid fa-map"></i> Site Address</label></td>
                                            <td width="32%"><p><?php echo $datatension[0]['site_address']  ?></p></td>
                                            </tr>


                                            <tr>
                                                <td width="25%"><label for=""><i class="fa-solid fa-calendar-check"></i> Date Complete</label></td>
                                                <td width="32%"><p><?php echo $datatension[0]['date_completed']  ?></p></td>
                                                <td width="25%"><label for=""><i class="fa-solid fa-temperature-high"></i> Temprature</label></td>
                                                <td width="32%"><p><?php echo $datatension[0]['temperature']  ?></p></td>
                                                </tr>


                                                <tr>
                                                <td width="25%"><label for=""><i class="fa-solid fa-wind"></i> Wind Speed</label></td>
                                                <td width="32%"><p><?php echo $datatension[0]['wind_speed']  ?></p></td>
                                                <td width="25%"><label for=""><i class="fa-solid fa-compass"></i> Wind Direction</label></td>
                                                <td width="32%"><p><?php echo $datatension[0]['wind_direction']  ?></p></td>
                                                </tr>

                                                <tr>
                                                    <td width="25%"><label for=""><i class="fa-solid fa-user-check"></i> Completed By</label></td>
                                                    <td width="32%"><p><?php echo $datatension[0]['completed_by']  ?></p></td>
                                                    <td width="25%"></td>
                                                    <td width="32%"></td>

                                                    </tr>


                                        </tbody>
                                    </table>
                                </div>


                                                <hr style="height: 4x;">
<div class="table-responsive">
  <table class="table table-striped table-hover custom-table">
  <thead>
     <h4 style="font-weight: bold;"> <i class="fa-solid fa-road"></i> Anchor A</h4>
      <tr>
          <th> GUY LEVEL</th>
          <th>GUY ELEV (ft)</th>
          <th>WIRE SIZE (in)</th>
          <th>ANCHOR DISTANCE</th>
          <th>TYPE-STRAND</th>
          <th>INITIAL TENSION</th>
          <th>DESIRED TENSION</th>
          <th>MEASURED TENSION</th>
          <th>GUY STAR (L/R)</th>
          <th>Result</th>
      </tr>
  </thead>

  <tbody>
      <!-- 10 rows for Anchor A -->
      <?php
      $i = 1;
      $structural_sql = "SELECT * FROM tbl_anchor_last WHERE inspection_id = $mainid AND note = 'anchor_A'";
      $structural_result = $conn->query($structural_sql);
      if ($structural_result->num_rows > 0) {
        while ($structurerow = $structural_result->fetch_assoc()) {
            ?>
             <tr>
          <td><?php echo $i; ?></td>
          <td><p><?php echo $structurerow['guy_elev']; ?></p></td>
          <td><p><?php echo $structurerow['wire_size']; ?></p></td>
          <td><p><?php echo $structurerow['anchor_distance']; ?></p></td>
          <td><p>EHS</p></td>
          <td><p><?php echo $structurerow['initial_tension']; ?></p></td>
          <td><p><?php echo $structurerow['desired_tension']; ?></p></td>
          <td><p><?php echo $structurerow['measured_tension']; ?></p></td>
          <td><p><?php echo $structurerow['guy_star']; ?></p></td>
          <td><p class="pass"><?php echo $structurerow['result']; ?></p></td>
      </tr>
               

            <?php
            $i++;
        }
    } else {
        echo "No data found in structural_issues.";
    }
?>
</table>
</div>

<hr style="height:4px;">
<div class="table-responsive">
  <table class="table table-striped table-hover custom-table">
   <thead>
   <h4 style="font-weight: bold;"> <i class="fa-solid fa-road"></i> Anchor B</h4>

      <tr>
        <th> GUY LEVEL</th>
        <th>GUY ELEV (ft)</th>
        <th>WIRE SIZE (in)</th>
        <th>ANCHOR DISTANCE</th>
        <th>TYPE-STRAND</th>
        <th>INITIAL TENSION</th>
        <th>DESIRED TENSION</th>
        <th>MEASURED TENSION</th>
        <th>GUY STAR (L/R)</th>
        <th>Result</th>
      </tr>
  </thead>

  <tbody>
      <!-- 10 rows for Anchor A -->
      <?php
      $structural_sql = "SELECT * FROM tbl_anchor_last WHERE inspection_id = $mainid AND note = 'anchor_B'";
      $structural_result = $conn->query($structural_sql);
      if ($structural_result->num_rows > 0) {
        while ($structurerow = $structural_result->fetch_assoc()) {
            ?>
             <tr>
          <td>1</td>
          <td><p><?php echo $structurerow['guy_elev']; ?></p></td>
          <td><p><?php echo $structurerow['wire_size']; ?></p></td>
          <td><p><?php echo $structurerow['anchor_distance']; ?></p></td>
          <td><p>EHS</p></td>
          <td><p><?php echo $structurerow['initial_tension']; ?></p></td>
          <td><p><?php echo $structurerow['desired_tension']; ?></p></td>
          <td><p><?php echo $structurerow['measured_tension']; ?></p></td>
          <td><p><?php echo $structurerow['guy_star']; ?></p></td>
          <td><p class="pass"><?php echo $structurerow['result']; ?></p></td>
      </tr>
               

            <?php
        }
    } else {
        echo "No data found in structural_issues.";
    }
?>
</table>
</div>

<!-- ----------------------Anchor C------------------- -->
 
<hr style="height:4px;">
<div class="table-responsive">
  <table class="table table-striped table-hover custom-table">
  <thead>
   <h4 style="font-weight: bold;"> <i class="fa-solid fa-road"></i> Anchor C</h4>

      <tr>
        <th> GUY LEVEL</th>
        <th>GUY ELEV (ft)</th>
        <th>WIRE SIZE (in)</th>
        <th>ANCHOR DISTANCE</th>
        <th>TYPE-STRAND</th>
        <th>INITIAL TENSION</th>
        <th>DESIRED TENSION</th>
        <th>MEASURED TENSION</th>
        <th>GUY STAR (L/R)</th>
        <th>Result</th>
      </tr>
  </thead>

  <tbody>
      <!-- 10 rows for Anchor A -->
      <?php
      $structural_sql = "SELECT * FROM tbl_anchor_last WHERE inspection_id = $mainid AND note = 'anchor_C'";
      $structural_result = $conn->query($structural_sql);
      if ($structural_result->num_rows > 0) {
        while ($structurerow = $structural_result->fetch_assoc()) {
            ?>
             <tr>
          <td>1</td>
          <td><p><?php echo $structurerow['guy_elev']; ?></p></td>
          <td><p><?php echo $structurerow['wire_size']; ?></p></td>
          <td><p><?php echo $structurerow['anchor_distance']; ?></p></td>
          <td><p>EHS</p></td>
          <td><p><?php echo $structurerow['initial_tension']; ?></p></td>
          <td><p><?php echo $structurerow['desired_tension']; ?></p></td>
          <td><p><?php echo $structurerow['measured_tension']; ?></p></td>
          <td><p><?php echo $structurerow['guy_star']; ?></p></td>
          <td><p class="pass"><?php echo $structurerow['result']; ?></p></td>
      </tr>
               

            <?php
        }
    } else {
        echo "No data found in structural_issues.";
    }
?>
    
</table>
</div>

                                                                    

                                                    
                                      
                                
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                 

                    


                   
        

                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-4">
                    <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                    <p class="text-muted">Choose your layout</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Vertical</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                    <span class="d-flex h-100 flex-column gap-1">
                                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                            <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                        </span>
                                        <span class="bg-light d-block p-1"></span>
                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1">
                                                <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                            </span>
                                        </span>
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Two Column</h5>
                        </div>
                        <!-- end col -->
                    </div>

                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                    <p class="text-muted">Choose Light or Dark Scheme.</p>

                    <div class="colorscheme-cardradio">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check card-radio dark">
                                    <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-soft-light d-block p-1"></span>
                                                    <span class="bg-soft-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                        <p class="text-muted">Choose Fluid or Boxed layout.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Fluid</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed">
                                    <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                                        <span class="d-flex gap-1 h-100 border-start border-end">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Boxed</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                        <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                        <div class="btn-group radio" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                    <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-primary d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                        <p class="text-muted">Choose a size of Sidebar.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small" value="sm">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-soft-primary mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-view">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                        <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Default</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                            </span>
                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Detached</h5>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-color">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                        <p class="text-muted">Choose Ligth or Dark Sidebar Color.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

<?php 
include('includes/footer.php');
?>