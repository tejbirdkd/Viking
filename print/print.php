
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include('../connect.php');

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/vm_dev/";

$request_uri = $_SERVER['REQUEST_URI'];
$explode_uri = explode('?', $request_uri);

if (isset($explode_uri[1])) {
    parse_str($explode_uri[1], $params); 
 
        $mainid = base64_decode($params['id']);
        // echo $mainid;  die;
   
} else {
    echo "Invalid URL format.";
}
if ($mainid > 0) {
  $inspection_sql = "SELECT * FROM tower_inspection WHERE id = $mainid";
  $inspection_result = $conn->query($inspection_sql);

  if ($inspection_result->num_rows > 0) {
      $inspection_data = $inspection_result->fetch_assoc();
      // echo "<pre>" . print_r($inspection_data, true) . "</pre>";
  } else {
      echo "No data found in tower_inspection.";
  }


//code
} else {
  echo "Invalid inspection ID.";
}


?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Form</title>
    	<link rel="shortcut icon" type="image/x-icon" href="https://registrations.thehabitatstrust.org/images/fav.ico">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="./index_files/style.css">
    <style type="text/css">
                      .intro p {
                    position: relative;
                    font-size: 16px;
                    line-height: 25px;
                    }
                    .intro {
                        background-image: url(index_files/bg-abt.png);
                        padding:10px;
                        background-size: cover;
                        position: relative;
                    }
                    .intro:before {
                        background: #fffffff7;
                        inset: 0;
                        position: absolute;
                        content: '';
                    }
                    tbody {
                        background: #f6fbff;
                    }
                          h2 { background: linear-gradient(135deg, #2196F3, #6610f2); color: #fff; padding: 15px; border-radius: 5px; text-align: center; }
                            .table th { background-color: #2196F3; color: #fff; }
                            .table td { vertical-align: middle; }
                            .icon { color: #2196F3; margin-right: 5px; }
                    th.font-sd {
                        font-size: 15px!important;
                        color: #000;
                        font-weight: 700 !important;
                    }
                    .stepsForm label.label {
                        font-size: 16px;
                        color: #333333;
                        line-height: 22px;
                        display: block;
                        font-weight: 500;
                        text-transform: uppercase;
                        margin-top: 18px !important;
                        margin-bottom: 5px;
                        letter-spacing: 1px;
                    }
                    .form-wrp h1 {
                      background-color: #EEEEEE;
                      font-size: 1.2em;
                      padding: 5px;
                      color: #049658;
                      font-weight:600;
                    }
                    .stepsForm td,p {
                      margin: 2px 0;
                      padding: 0;
                      color: #444;
                      line-height: 24px;
                    }
                    .form-wrp h2 {
                        padding: 10px 18px;
                        font-weight: 600;
                        font-size: 18px;
                        border-radius: 0px;
                        color: #fff;
                        font-family: inherit;
                        margin:25px 0 0;
                        text-align: left;
                    }
                    .stepsForm b {
                      color: #000;
                      font-size: 13px;
                    }
                    p.pass {
                        color: green !important;
                        font-weight: 600;
                    }

                    p.fail {
                        color: red !important;
                        font-weight: 600;
                    }
                    .slide2-txt strong {
                      margin:10px 0;
                    }
                    .table-style tr td {
                        border-bottom: 1px solid #d2e8fa;
                        border-left: 1px solid #d2e8fa;
                        padding: 6px 12px;
                        font-size: 14px;
                        font-weight: 400;
                    }
                    .table-style th {
                        background: #c0e3fe;
                        padding: 10px 5px;
                        border: 1px solid #d2e8fa;
                        border-right: none;
                        font-size: 13px;
                        color: #000;
                        text-align: left;
                        font-weight: 600;
                        text-transform: uppercase;
                    }

                    /* Add styles for Pass and Fail text */
                    .table-style tr td p {
                        color: inherit;
                    }

                    /* Style for Pass text */
                    .table-style tr td p[class="pass"],
                    .table-style tr td p:has(span:contains("Pass")) {
                        color: #28a745 !important;
                        font-weight: 600;
                    }

                    /* Style for Fail text */
                    .table-style tr td p[class="fail"],
                    .table-style tr td p:has(span:contains("Fail")) {
                        color: #dc3545 !important;
                        font-weight: 600;
                    }

                    td.images-tow {
                        display: flex;
                        gap: 4px;
                    }
                    td.images-tow img {
                        width: 100%;
                    }
                    .table-style tr td:last-child, .table-style th:last-child {
                      border-right: 1px solid #d2e8fa;
                    }
                    .slide2-txt b, .slide3-txt b {
                      display: block;
                      margin: 10px 0;
                    }
                    .slide3-txt .table-style b {
                      display: inline-block;
                    }
                    p.title {
                        font-family: Calibri;
                        font-size: 16px;
                        font-weight: 400;
                        color: #009336;
                        font-style: italic;
                        background: #d4fec8;
                        padding-left: 11px;
                        border: 1px solid #ccc;
                        border-bottom: 0;
                    }
                    .slide2-txt p.sec-des {
                      font-size: 13px;
                      font-weight: 600;
                      line-height: 20px;
                      color: #333;
                    }
                    .red-txt {
                        font-size: 14px;
                        color: #FF1D25;
                        margin: 31px 0 0 0;
                        font-weight: bold;
                    }
                    p {
                        font-size: 14px;
                        font-weight: 400;
                    }



                    .stepsForm td, p{line-height: inherit; margin: 0; padding: 0}

                      @media print
                      {
                        .printbutton
                        {
                        display:none;
                          }
                        }

                    /* Enhanced Heading Styles */
                    .heading {
                        background: linear-gradient(135deg, #2196F3, #6610f2);
                        color: #fff;
                        padding: 15px 25px;
                        border-radius: 8px;
                        margin-bottom: 30px;
                        box-shadow: 0 4px 15px rgba(33, 150, 243, 0.2);
                        text-transform: uppercase;
                        font-weight: 600;
                        letter-spacing: 1px;
                    }

                    /* Input Box Styling with Icon Support */
                    .form-group {
                        position: relative;
                    }

                    .form-control, .form-select {
                        padding-left: 40px;
                        height: 48px;
                        border-radius: 6px;
                        border: 1px solid #e0e0e0;
                        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
                        transition: all 0.3s ease;
                    }

                    .form-control:focus, .form-select:focus {
                        border-color: #2196F3;
                        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
                    }

                    /* Icon Styling */
                    .form-group:before {
                        font-family: "Font Awesome 5 Free";
                        font-weight: 900;
                        position: absolute;
                        left: 14px;
                        top: 38px;
                        color: #2196F3;
                        z-index: 1;
                    }

                    /* Specific Icons for Different Input Types */
                    .form-group.date-input:before {
                        content: "\f073"; /* Calendar icon */
                    }

                    .form-group.name-input:before {
                        content: "\f007"; /* User icon */
                    }

                    .form-group.company-input:before {
                        content: "\f1ad"; /* Building icon */
                    }

                    .form-group.location-input:before {
                        content: "\f3c5"; /* Map marker icon */
                    }

                    .form-group.id-input:before {
                        content: "\f02a"; /* Barcode icon */
                    }

                    .form-group.height-input:before {
                        content: "\f538"; /* Ruler vertical icon */
                    }

                    .form-group.year-input:before {
                        content: "\f133"; /* Calendar alt icon */
                    }

                    /* Table Styling Enhancement */
                    .table {
                        background: #fff;
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                    }

                    .table th {
                        background: linear-gradient(135deg, #2196F3, #6610f2);
                        color: #fff;
                        font-weight: 600;
                        text-transform: uppercase;
                        padding: 15px;
                    }

                    /* Section Headers */
                    .section-header {
                        background: linear-gradient(135deg, #2196F3, #6610f2);
                        color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        margin-bottom: 25px;
                        box-shadow: 0 4px 15px rgba(33, 150, 243, 0.2);
                    }

                    .section-header h2 {
                        margin: 0;
                        font-size: 24px;
                        font-weight: 600;
                    }

                    /* Fieldset Enhancement */
                    fieldset {
                        border: 2px solid #e0e0e0;
                        border-radius: 8px;
                        padding: 20px;
                        margin-bottom: 30px;
                        background: #fff;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
                    }

                    legend {
                        background: linear-gradient(135deg, #2196F3, #6610f2);
                        color: #fff;
                        padding: 8px 15px;
                        border-radius: 5px;
                        font-weight: 600;
                    }

                    /* Button Enhancement */
                    .btn-site {
                        background: linear-gradient(135deg, #2196F3, #6610f2);
                        color: #fff;
                        padding: 12px 30px;
                        border-radius: 6px;
                        border: none;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
                        transition: all 0.3s ease;
                    }

                    .btn-site:hover {
                        transform: translateY(-2px);
                        box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
                    }

                    /* Dark Mode Enhancement */
                    .dark .heading,
                    .dark .section-header,
                    .dark legend {
                        background: linear-gradient(135deg, #1a237e, #311b92);
                    }

                    .dark .form-control,
                    .dark .form-select {
                        background-color: #1e1e1e;
                        border-color: #333;
                        color: #fff;
                    }

                    .dark .table {
                        background-color: #1e1e1e;
                    }

                    .dark .table th {
                        background: linear-gradient(135deg, #1a237e, #311b92);
                    }
                    h2.bb {
                        border-top-left-radius: 5px;
                        border-top-right-radius: 5px;
                    }
                            .table-style
                            {
                                border-bottom-left-radius: 5px;
                                border-bottom-right-radius: 5px;
                        border-collapse: separate !important;
                        overflow: hidden;
                        border-spacing: 0;
                            }
                            .table-style1
                            {
                              border-top-left-radius: 5px;
                                border-top-right-radius: 5px;
                            }
                            .bb1
                            {
                                border-radius: 5px !important;
                            }
                            .border1 {
                        border-top-left-radius: 5px;
                        border-top-right-radius: 5px;
                    }
                            table.table-style.table-style2 {
                        border-bottom-right-radius: 0 !important;
                        border-bottom-left-radius: 0px;
                        border-top-left-radius: 5px;
                        border-top-right-radius: 5px;
                    }
                    /*
                            .table-style tr:last-child td {
                        border-bottom-right-radius: 5px;
                        border-bottom-left-radius: 5px;
                    }
                    */
                            .table-style img
                            {
                            border-radius: 5px;
                            }
</style>
</head>
<body>
    <div class="form-wrp" style="width:900px; margin:0px auto;">
    <section class="form-content-sec">
    <div class="wrapper">
      <div class="species-wrp">
        <div class="row">
        <div class="col-12 printbutton"> <button type="button" onclick="window.print()" class="sf-button next-btn" style="float:right; padding:10px 10px; cursor:pointer;"><i class="fa-solid fa-print"></i> Print Full Form</button></div>
        
          <div class="logo col-3"> <a href="#"> <img src="index_files/logo.png" style="width: 150px;"> </a> </div>
        <!-- <a href="printedit.php?id=<?php echo base64_encode($inspection_data['id']); ?>"><button class="btn btn-warning">Edit</button></a> -->

          <div class="frm-heading col-9">
            <h2 style="margin-bottom: 0;" class="bb"><i class="fa-solid fa-file-alt"></i> TIA-222-I MAINTENANCE AND CONDITION ASSESSMENT REPORT  </h2>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <!-- step 1 -->
        <div class="stepsForm">
          <div class="row">
            <div class="col-12 col-mob-12">
              <div>
                <div>
                    <table class="table-style " width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                        <tr>
                        <td width="25%"><label for=""><i class="fas fa-calendar-alt icon"> </i>Inspection Date :</label></td>
                        <td width="32%"><p> <?php echo $inspection_data['inspection_date']; ?></p></td>


                        <td width="25%"><label for=""><i class="fas fa-user icon"></i> Inspector Name :</label></td>
                        <td width="32%"><p> <?php echo $inspection_data['inspector_name']; ?></p></td>
                        </tr>

                        <tr>
                        <td width="25%"><label for=""><i class="fas fa-building icon"></i> Client Name :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['client_name']; ?></p></td>


                        <td width="25%"><label for=""><i class="fas fa-user-tie" style="color: #2196F3;"> </i> Tower Owner :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['tower_owner']; ?></p></td>
                        </tr>


                        <tr>
                        <td width="25%"><label for=""><i class="fas fa-map-marker-alt" style="color: #2196F3;"></i> Tower Location :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['tower_location']; ?></p></td>

                        <td width="25%"><label for=""><i class="fas fa-id-badge icon"></i> Tower ID/Name :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['tower_id_name']; ?></p></td>


                        </tr>


                        <tr>
                        <td width="25%"><label for=""><i class="fas fa-broadcast-tower" style="color: #2196F3;"></i> Tower Type :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['tower_type']; ?></p></td>

                        <td width="25%"><label for=""><i class="fas fa-ruler-vertical" style="color: #2196F3;"></i> Tower Height :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['tower_height']; ?></p></td>
                        </tr>
                        <tr>
                        <td width="25%"><label for=""><i class="fas fa-calendar-check icon"></i> Year of Construction :</label></td>
                        <td width="32%"><p><?php echo $inspection_data['year_of_construction']; ?></p></td>
                        <td width="25%"></td>
                        <td width="32%"></td>

                      </tr>


                    </tbody></table>

                    <table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 8px;">
                      <tbody><tr>
                          <th colspan="2"><b><i class="fa-solid fa-diagram-project"></i> Structural</b></th>
                          <th colspan="2"><b><i class="fa-solid fa-screwdriver-wrench"></i> Maintenance</b></th>
                      </tr>
                      <tr>
                          <th><i class="fa-solid fa-triangle-exclamation"></i> Critical</th>
                          <th><i class="fa-solid fa-clipboard-check"></i> Non-Critical</th>
                          <th><i class="fa-solid fa-triangle-exclamation"></i> Critical</th>
                          <th><i class="fa-solid fa-clipboard-check"></i> Non-Critical</th>
                      </tr>
                      <tr>
                          <td><?php echo $inspection_data['structural_critical']; ?></td>
                          <td><?php echo $inspection_data['structural_non_critical']; ?></td>
                          <td><?php echo $inspection_data['maintenance_critical']; ?></td>
                          <td><?php echo $inspection_data['maintenance_non_critical']; ?></td>
                      </tr>
                  </tbody></table>
                </div>
                <div class="clear"> </div>
                <div class="intro1">
                <h2 style="margin-top: 20px;" class="bb1"><i class="fas fa-info-circle"></i> Introduction</h2>
                <div class="intro">
                  <p style="text-align: left;">The above-noted tower was inspected following the general guidelines set forth by the TIA-222-I Annex J: Tower Maintenance and Inspection Procedures. Standard industry and manufacturer specifications were also observed during this assessment. A tower climb was completed by Viking Maintenance personnel and a visual inspection of the installation was performed from this vantage point. It should be noted that most observations are based on a visual inspection conducted during the tower climb. It was not within the scope of this work to physically check or closely observe every member, bolt, connection, or similar component.<br>

                    Both the procedures of the inspection and the preparation of this report were carried out per the requirements of Annex J: Maintenance and Condition Assessment Procedures of the TIA-222-I standard. The standard recommends routine inspections of self-support towers at intervals not exceeding three years, with shorter intervals advised for Class III (Public Safety) Structures or after severe wind, ice storms, or other extreme conditions. Contained herein are the findings and recommendations resulting from the inspection.</p>
                    <p style="text-align: left; font-weight: 700; font-size: 14px;"><i class="fa-solid fa-exclamation-triangle"></i> Limitations and Exceptions</p>
                    <p style="text-align: left;">Subsurface components were not excavated or otherwise assessed during this inspection.</p>
                    <p>The findings and recommendations in this report should not be interpreted as verification of the compliance of the structure, its components, or attachments with any governmental, industry, or other standards.</p>
                    <p>This report does not offer any guarantees, either explicit or implied, regarding the current or future performance, capacity, or structural integrity of the tower or its components.</p>
               </div>

            </div>

                <div class="clear"> </div>

                <div class="non-com">

              <h2 class="bb1"><i class="fa-solid fa-exclamation-circle"></i> Non Compliant maintenance and structural issues.</h2>
                <div class="clear"> </div>
                <?php
                $maintenance_sql = "SELECT * FROM maintenance_issues WHERE inspection_id = $mainid";
                $maintenance_result = $conn->query($maintenance_sql);
              
                        if ($maintenance_result->num_rows > 0) {
                            while ($maintenance_row = $maintenance_result->fetch_assoc()) {
                                ?>
                                              <label class="label" for=""><i class="fa-solid fa-exclamation-triangle"></i> Maintenance issues (<?php echo $maintenance_row['priority'] ?>) </label>
                                <p class="title border1"><i class="fa-solid fa-star"></i> Priority</p>

                                <div>
                                  <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-eye"></i> Observation</th>
                                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-lightbulb"></i> Recommendation</th>
                                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-image"></i> Image</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td> <?php echo $maintenance_row['observation'] ?></td>
                                        <td><?php echo $maintenance_row['recommendation'] ?></td> 
                                        <td>
                                                    <?php
                                                    $images = explode('|', $maintenance_row['uploaded_image']);
                                                    foreach ($images as $img) {
                                                        // Add full URL if not already full
                                                        $fullImage = (strpos($img, 'http') === 0) ? $img : $base_url . $img;
                                                        echo '<img src="' . $fullImage . '" style="height:100px; margin:5px;">';
                                                    }
                                                    ?>
                                                </td>

                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="clear"></div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No data found in maintenance_issues.";
                        }
                ?>
               

                <!-- ////////////////////// -->

                <!-- <div class="clear"> </div>
                <label class="label" for="" style="margin-top: 10px;"><i class="fa-solid fa-clipboard-list"></i> Maintenance issues (Non-Critical) </label>
                <p class="title border1"><i class="fa-solid fa-star"></i> Priority</p>

                <div>
                  <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-eye"></i> Observation</th>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-lightbulb"></i> Recommendation</th>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-image"></i> Image</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> By using technology to recognize individual elephants and gather critical field reports, we aim to secure long-term solutions for peaceful human-elephant coexistence.</td>
                        <td>By using technology to recognize individual elephants and gather critical field reports, we aim to secure long-term solutions for peaceful human-elephant coexistence.</td>
                        <td><img src="index_files/testing-img.jpg"></td>

                      </tr>
                    </tbody>
                  </table>
                  <div class="clear"></div>
                </div> -->

                <?php
                    
                        $structural_sql = "SELECT * FROM structural_issues WHERE inspection_id = $mainid";
                        $structural_result = $conn->query($structural_sql);

                        if ($structural_result->num_rows > 0) {
                            // echo "<h3>Structural Issues:</h3>";
                            while ($structurerow = $structural_result->fetch_assoc()) {
                                ?>
                                <div class="clear"> </div>
                                    <label class="label" for="" style="margin-top: 10px;"><i class="fa-solid fa-exclamation-triangle"></i> Structural issues (<?php echo $structurerow['priority'] ?>)</label>
                                    <p class="title border1"><i class="fa-solid fa-star"></i> Priority</p>

                                    <div>
                                      <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-eye"></i> Observation</th>
                                            <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-lightbulb"></i> Recommendation</th>
                                            <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-image"></i> Image</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                             <td> <?php echo $structurerow['observation'] ?></td>
                                        <td><?php echo $structurerow['recommendation'] ?></td> 
                                        <td>
                                           
                                                    <?php
                                                    $images = explode('|', $structurerow['uploaded_image']);
                                                    foreach ($images as $img) {
                                                        // Add full URL if not already full
                                                        $fullImage = (strpos($img, 'http') === 0) ? $img : $base_url . $img;
                                                        echo '<img src="' . $fullImage . '" style="height:75px; margin:5px;">';
                                                    }
                                                    ?>
                                        </td>



                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="clear"></div>
                                    </div>
                                <?php
                            }
                        } else {
                            echo "No data found in structural_issues.";
                        }
                ?>

                


                <!-- <div class="clear"> </div>
                <label class="label" for="" style="margin-top: 10px;"><i class="fa-solid fa-clipboard-list"></i> Structural issues (Non Critical) </label>
                <p class="title border1"><i class="fa-solid fa-star"></i> Priority</p>

                <div>
                  <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-eye"></i> Observation</th>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-lightbulb"></i> Recommendation</th>
                        <th width="25%" valign="middle" style="text-align:left;"><i class="fa-solid fa-image"></i> Image</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> By using technology to recognize individual elephants and gather critical field reports, we aim to secure long-term solutions for peaceful human-elephant coexistence.</td>
                        <td>By using technology to recognize individual elephants and gather critical field reports, we aim to secure long-term solutions for peaceful human-elephant coexistence.</td>
                        <td><img src="index_files/testing-img.jpg"></td>

                      </tr>
                    </tbody>
                  </table>
                  <div class="clear"></div>
                </div> -->
</div>


              <div class="maintenance-issue">
                <div class="slide2-txt">
                  <!-- form step two -->
                  <h2 class="bb1"><i class="fa-solid fa-tools"></i> Maintenance Issues - Tower (MAINTENANCE)</h2>
                 <p class="sec-des">The following issues identified are considered lower priority deviations that do not require immediate attention but should be considered as part of future tower maintenance activities.</p>
												<br>


                        <table  class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
                          <tbody><tr>
                              <th><i class="fa-solid fa-list-alt"></i> Category &amp; Item Description</th>
                              <th><i class="fa-solid fa-exclamation-circle"></i> Non-Compliant Item &amp; Recommendation</th>
                              <th><i class="fa-solid fa-camera"></i> Photo</th>
                          </tr>
                          <?php
                              $structural_sql = "SELECT * FROM maintenance_issues_tower WHERE inspection_id = $mainid";
                              $structural_result = $conn->query($structural_sql);
                              if ($structural_result->num_rows > 0) {
                                
                                while ($row = $structural_result->fetch_assoc()) {
                                    ?>
                                   
                                   <td style="width:20%;">
                                 <p><i class="fa-solid fa-leaf"></i> <?php echo $row['category_description'] ?></p>
                                  </td>
                                  <td>
                                    <p><?php echo $row['non_compliant_item'] ?></p>
                                  </td>
                                  <td>
                                            <?php
                                            $images = explode(',', $row['photo']);
                                            foreach ($images as $img) {
                                                $fullImage = (strpos($img, 'http') === 0) ? $img : $base_url . $img;
                                                echo '<img src="' . $fullImage . '" style="height:75px; margin:5px;">';
                                            }
                                            ?>
                                        </td>
                               </tr>
                    
                                    <?php
                                }
                            } else {
                                echo "No data found in structural_issues.";
                            }
                          ?>
                          <!-- <tr>
                              <td style="width:20%;">
                                 <p><i class="fa-solid fa-leaf"></i> 2.2.1 Guy Anchors Vegetation</p>
                              </td>
                              <td>
                                <p>The guy anchor areas are overgrown with vegetation. Recommend vegetation be removed, ground scrubbed, weed barrier applied, and 4"-6" of rock added around the anchors.</p>
                              </td>
                              <td class="images-tow">
                                <img src="index_files/testing-img.jpg">
                                <img src="index_files/testing-img.jpg">
                              </td>
                          </tr> -->
                          <!-- <tr>
                            <td style="width: 20%;">
                                 <p><i class="fa-solid fa-hard-hat"></i> 2.2.2 Construction Materials</p>
                              </td>
                              <td>
                                <p>The guy anchor areas are overgrown with vegetation. Recommend vegetation be removed, ground scrubbed, weed barrier applied, and 4"-6" of rock added around the anchors.</p>
                              </td>
                              <td class="images-tow">
                                <img src="index_files/testing-img.jpg">
                                <img src="index_files/testing-img.jpg">
                              </td>
                          </tr> -->
                      </tbody></table>

                        </div>
                        </div>
                        <div class="clear"></div>



                        <div class="Deficiency-schdule">
                          <div class="slide2-txt">
                            <!-- form step two -->
                            <h2 class="bb"><i class="fa-solid fa-clipboard-check"></i> Deficiency Schedule</h2>


                            <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                              <tbody>
                                  <tr>
                                      <th>Deficiency</th>
                                      <th>Elevation (ft)</th>
                                      <th>Location</th>
                                      <th>Notes</th>
                                      <th>Category</th>
                                      <th style="width: 20%;">Uploaded Image</th>
                                  </tr>
                                  <?php
                                  $structural_sql = "SELECT * FROM deficiency_schedule WHERE inspection_id = $mainid";
                                  $structural_result = $conn->query($structural_sql);
                                  if ($structural_result->num_rows > 0) {
                                      echo "<h3>Structural Issues:</h3>";
                                      while ($row = $structural_result->fetch_assoc()) {
                                          ?>
                                          <tr>
                                              <td style="width: 25%;">
                                                  <p><i class="fa-solid fa-lock-open"></i> <?php echo $row['deficiency']; ?></p>
                                              </td>
                                              <td><p><?php echo $row['elevation']; ?></p></td>
                                              <td><p><?php echo $row['location']; ?></p></td>
                                              <td><p><?php echo $row['notes']; ?></p></td>
                                              <td>
                                                  <p><i class="fa-solid fa-exclamation-triangle"></i> <?php echo $row['category']; ?></p>
                                              </td>
                                              <td>
                                                  <?php
                                                  $base_url = "https://bot.dkddev.com/vm_dev/"; // Make sure this is correct
                                                  $images = explode('|', $row['image']); // Use | instead of ,
                                                  foreach ($images as $img) {
                                                      $img = trim($img);
                                                      if ($img != '') {
                                                          $fullImage = (strpos($img, 'http') === 0) ? $img : $base_url . $img;
                                                          echo '<img src="' . $fullImage . '" width="75px" style="margin:5px;">';
                                                      }
                                                  }
                                                  ?>
                                              </td>
                                          </tr>
                                          <?php
                                      }
                                  } else {
                                      echo "<tr><td colspan='6'>No data found in structural_issues.</td></tr>";
                                  }
                                  ?>
                              </tbody>
                          </table>



                          </div>

                        </div>



                        <div class="clear"></div>



                        <div class="Annex-j">
                          <div class="slide2-txt">
                            <!-- form step two -->
                            <h2 class="bb"><i class="fa-solid fa-clipboard-list"></i> TIA-222-h Annex J condition checklist</h2>


                            <table  class="table-style" width="100%" cellpadding="0" cellspacing="0">
                              <thead>
                                  <tr class="table-header">
                                      <th class="font-sd" colspan="3" style="font-weight: 500;"><i class="fa-solid fa-mountain"></i> I. SITE CONDITIONS (Ground level)</th>
                                  </tr>
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

            <br>


      <table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
        <thead>
            <tr class="table-header">
                <th class="font-sd" colspan="3" style="font-weight: 500;"><i class="fa-solid fa-anchor"></i> II. GUYED ANCHOR COMPOUNDS</th>
            </tr>
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

<br>



<table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
  <thead>
      <tr class="table-header">
          <th class="font-sd" colspan="3"><i class="fa-solid fa-broadcast-tower"></i> III. STRUCTURE CONDITIONS</th>
      </tr>
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

                        </div>


                        <div class="clear"></div>


                        <div class="coaxial-layout">
                          <div class="slide2-txt">
                            <!-- form step two -->
                            <h2 class="bb1"><i class="fa-solid fa-sitemap"></i> Coaxial Layout</h2>

                            <?php
                                  $structural_sql = "SELECT * FROM coaxial_layout WHERE inspection_id = $mainid";
                                  $structural_result = $conn->query($structural_sql);
                                  $datastruct = $structural_result->fetch_all(MYSQLI_ASSOC);
                            ?>
                            <img src="<?php echo $base_url . $datastruct[0]['image'] ?>" style="width: 100%;    border-radius: 5px;">


                            </div>

                        </div>

                        <div class="anchor-sec">
                          <div class="slide2-txt">
                            <!-- form step two -->
                            <h2 class="bb1"><i class="fa-solid fa-shield-alt"></i> Anchor Guard System</h2>
                            <div class="clear"></div>
                          <table class="table-style" width="100%" cellpadding="0" cellspacing="0" style="margin-top: 5px;">
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


                          </tbody></table>



<br>

                          <label class="label" for=""><i class="fa-solid fa-bolt"></i> DC Voltage Readings (mV) on test points C TO G</label>
                          <table class="table-style table-style2" width="100%" cellpadding="0" cellspacing="0">
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


                        <table class="table-style" width="100%" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                            <td width="25%"><label for=""><i class="fa-solid fa-eye"></i> Observations</label></td>
                            <td width="32%"><p><?php echo $datastruct[0]['observation']  ?></p></td>
                            <td width="25%"><label for=""><i class="fa-solid fa-clipboard-list"></i> Notes on system performance</label></td>
                            <td width="32%"><p><?php echo $datastruct[0]['notes_of_system_performance']  ?></p></td>
                            </tr>
                            <tr>
                            <td width="25%"><label for=""><i class="fa-solid fa-exclamation-triangle"></i> Signs of degradation or failure</label></td>
                            <td width="32%"><p><?php echo $datastruct[0]['sign_of_degradation']  ?></p></td>
                            <td width="25%"><label for=""><i class="fa-solid fa-lightbulb"></i> Conclusions and Recommendation</label></td>
                            <td width="32%"><p><?php echo $datastruct[0]['conclusions_and_recommendation']  ?></p></td>
                            </tr>

                            <tr>
                              <td width="25%"><label for=""><i class="fa-solid fa-search"></i> Summary of findings</label></td>
                              <td width="32%"><p><?php echo $datastruct[0]['summary_of_findings']  ?></p></td>
                              <td width="25%"><label for=""><i class="fa-solid fa-tools"></i> Corrective actions required</label></td>
                              <td width="32%"><p><?php echo $datastruct[0]['corrective_action_required']  ?></p></td>
                              </tr>


                        </tbody></table>


                      </div>
                      </div>


                      <div class="plumb-twist">


                        <div class="anchor-sec">
                          <div class="slide2-txt">
                            <!-- form step two -->
                            <h2 class="bb"><i class="fa-solid fa-ruler-combined"></i> Tension, Plumb and Twist Report</h2>
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


                          </tbody></table>
<br>

<label class="label" for=""><i class="fa-solid fa-anchor"></i> Anchor A</label>

<table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
  <thead>
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
      $structural_sql = "SELECT * FROM tbl_anchor_last WHERE inspection_id = $mainid AND note = 'anchor_A'";
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

    


  </tbody>
</table>


<br>


<label class="label" for=""><i class="fa-solid fa-anchor"></i> Anchor B</label>

<table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
  <thead>

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


  </tbody>
</table>

<br>


<label class="label" for=""><i class="fa-solid fa-anchor"></i> Anchor C</label>

<table class="table-style table-style1" width="100%" cellpadding="0" cellspacing="0">
  <thead>
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
      <tr>
          <td>1</td>
          <td><p>Elevation</p></td>
          <td><p>Size</p></td>
          <td><p>Testing</p></td>
          <td><p>Testing</p></td>
          <td><p>Testing</p></td>
          <td><p>Testing</p></td>
          <td><p>Testing</p></td>
          <td><p>Testing</p></td>
          <td><p class="pass">Pass</p></td>
      </tr>
      

  </tbody>
</table>

                      </div>





              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </section></div>

</body></html>