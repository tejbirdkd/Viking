<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// echo "<pre>"; print_r($_SESSION); die;
include('connect.php');
?>

<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/vm_dev/";

$is_logged_in = isset($_SESSION['user_id']); // Check if user is logged in
@$uId = $_SESSION['user_id'];// Check if user is logged in
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form </title>

    <!-- Bootstrap CSS -->
    <link href="img/faviconxx.png" rel="icon">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?var-9222666" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    .upload-img {
    border-radius: 5px;
}
                    button#login-tab {
                    margin: 0!important;
                }
                .modal-body {
                    background: #323232;
                }
                .nav-link.active {
                    border: none;
                    border-bottom: 4px solid #000000 !important;
                }
                .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                    border-color: none;
                    isolation: none;
                    border: none !important;
                }
                button.btn.btn-success.w-100 {
                    height: 45px;
                }
                .modal-header {
                    border: none !important;
                    background: #4e4e4e;
                }
                .nav-link.active {
                    border: none;
                    border-bottom: 4px solid #d1d1d1 !important;
                    background: #4e4e4e !important;
                    color: #fff !important;
                }
                .nav-link:hover {
                    transition: 0.25s;
                    border: none;
                    color: #fff !important;
                }
                .modal-dialog {
                        max-width: 350px;
                        margin: 1.75rem auto;
                    }
            body.dark th,
            body.dark td {
                border: 1px solid #5e5e5e;
                padding: 10px;
                font-size: 13px;
                font-weight: 400;
                color: #ffffff;
                text-transform: capitalize;
                text-align: left;
                border-bottom: none;
                border-left: none;
            }


            th,
            td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                font-size: 13px;
                font-weight: 400;
                color: #332f2f;
                text-transform: capitalize;
                border-top: 0;
                border-left: 0;
            }

            .table-responsive thead th {
                border-top: none !important;
            }

            table {
                border-collapse: separate !important;
                text-align: center;
                width: 100%;
                border-radius: 5px !important;
                overflow: hidden;
                border-spacing: 0 !important;
                border: 1px solid #ccc !important;
            }

            body.dark table {
                border-collapse: separate !important;
                text-align: center;
                width: 100%;
                border-radius: 5px !important;
                overflow: hidden;
                border-spacing: 0 !important;
                border: 1px solid #747070 !important;
            }

            .table-responsive {
                margin-top: 15px;
            }

            .form-control,
            .form-select {
                border-radius: 5px !important;
                height: 47px;
            }

                /* table {
                text-align: center;
                width: 100%;
                border: 1px solid #686666 !important;
                border-collapse: separate;
            } */
            th {
                position: sticky;
                top: 0;
                /* Don't forget this, required for the stickiness */
                box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
            }

            body.dark th {
                background: linear-gradient(45deg, #181616, transparent);
            }

            .row.mb-3 {
                position: inherit;
            }
        /*
            .error {
                color: red ! important;
            } */

            .mb-3 {
                position: relative;
                margin-bottom: 28px !important;
            }

            table {
                border-collapse: collapse;
                text-align: center;
            }

            th,
            td {
                border: 1px solid #e0e0e0;
                padding: 10px;
                font-size: 13px;
                font-weight: 400;
                color: #332f2f;
                text-transform: capitalize;
            }

            th {
                text-transform: capitalize;
            }

            input[type="text"] {
                width: 100%;
                border-radius: 4px;
            }



            fieldset {
                min-width: 0;
                padding: revert;
                margin: inherit;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-top: 35px;
            }

            legend {
                float: inherit;
                width: initial;
                padding: 0 5px;
                margin-bottom: .5rem;
                font-size: 20px;
            }


            .custom-radio {
                display: flex;
                align-items: center;
                cursor: pointer;
                padding: 13px;
                border: 1px solid #717171;
                border-radius: 5px;
                margin-bottom: 10px;
                gap: 5px;
            }

            .custom-radio .form-check .form-check-input {
            float: left;
            margin-left: 0;
            }

                .custom-radio .form-check-label {
                    margin-bottom: 0;
                    cursor: pointer;
                    width: 100%;
                }
                .custom-radio .form-check-input {
                width: 2em;
                height: 1em;
            }

            .custom-radio .form-check-input {
                width: 2em;
                height: 15px;
                margin-top: 2px;
            }
            textarea.form-control {
                min-height: calc(1.5em +(.75rem + 2px));
                height: auto;
            }


            .section-4 th,
            .section-4 td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }

            .section-4 th {
                background-color: #7a7a7a;
                color: white;
                text-align: center;
            }

            .header {
                font-weight: bold;
                text-align: center;
                font-style: italic;
                background-color: #7a7a7a;
                color: white;
                padding: 10px;
                border-radius: 5px;
                text-align: left;
            }

            .add-row {
                margin-top: 10px;
                padding: 10px;
                background-color: #7a7a7a;
                color: white;
                border: none;
                cursor: pointer;
                font-size: 16px;
                border-radius: 5px;
            }

            .remove-row {
                padding: 5px;
                background-color: red;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 3px;
            }

            table {
                border-collapse: collapse;
                text-align: center;
                width: 100%;
            }

            textarea {
                resize: vertical;
                width: 100%;
            }

            .table-responsive table {
                width: 100%;
                margin-bottom: 0;
            }

            .table-responsive thead th {
                position: sticky;
                top: 0;
                z-index: 10;

                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
            }

            .table-responsive .table-header th {
                position: sticky;
                top: 0;
                z-index: 10;

                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
            }

            /* For nested headers */
            .table-responsive .table-header:nth-child(2) th {
                top: 43px;
                /* Adjust based on the height of your first header row */
            }

            /* For section headers in tables */
            .table-responsive th[colspan="3"] {
                position: sticky;
                z-index: 9;
            }
            .custom-radio .form-check-input {
            margin-left: 0!important;
            }
            @media (max-width:768px) {
                .table-responsive input.form-control {
                    width: 150px;
                }

                .table-responsive select {
                    width: 150px;
                }

                input#inspection_date {
                    width: 100%;
                }

                input#tower_photo {
                    width: 100%;
                }

                table .form-select {
                    width: 200px !important;
                }
                h2.heading.mb-0 {
            text-align: center;
            font-size: 20px;
            }

            legend {
                font-size: 15px;
            }
            .tabs textarea.form-control {
                width: 100%;
            }
            table td p {
                margin-bottom: 0;
            }
            table td p {
                width: 220px;
            }
            .tables select.form-select {
                width: 200px !important;
            }
            input[type="date"] {
                padding-top: 10px;
                width: 100% !important;
            }
            .custom-radio .form-check-input {
                margin-left: 0;
                width: 2em;
                height: 1em;
            }
            }

                    label.error {
                    display: block;
                    color: #d3a9a9 ! important;
                    font-size: 14px;
                    margin-top: 5px;
                }
</style>

<body class="dark">

<?php if (!$is_logged_in): ?>
  <!-- Auth Modal -->
  <div class="modal fade" id="authModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-0">
          <ul class="nav nav-tabs w-100" id="authTab" role="tablist">

            <li class="nav-item text-center">
              <button class="nav-link active w-100" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
            </li>
            <li class="nav-item text-center">
              <button class="nav-link w-100" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button">Sign Up</button>
            </li>
          </ul>
        </div>
        <div class="modal-body">
          <div class="tab-content">
            <!-- Signup Form -->
            <div class="tab-pane fade" id="signup">
            <form method="POST" action="signup.php">
                <div class="row">
                <?php if (!empty($_SESSION['signup_error'])): ?>
            <div class="alert alert-danger w-100" role="alert">
                <?= $_SESSION['signup_error'] ?>
            </div>
            <?php unset($_SESSION['signup_error']); ?>
        <?php endif; ?>
            <div class="mb-3"><input type="text" name="name" class="form-control col-sm-12" placeholder="Full Name" required></div>
            <div class="mb-3"><input type="email" name="email" class="form-control col-sm-12" placeholder="Email" required></div>
            <div class="mb-3"><input type="text" name="company" class="form-control col-sm-12" placeholder="Company " required></div>
            <div class="mb-3"><input type="password" name="password" class="form-control col-sm-12" placeholder="Password" required></div>
            <div class="mb-3"><button type="submit" class="btn btn-success w-100 col-sm-12">Sign Up</button></div>
                </div>
            </form>
            </div>
            <!-- Login Form -->
            <div class="tab-pane fade show active" id="login">
              <form method="POST" action="login.php">
                <div class="row">
                <?php if (!empty($_SESSION['login_error'])): ?>
                    <div class="alert alert-danger w-100" role="alert">
                        <?= $_SESSION['login_error'] ?>
                    </div>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>
                <div class="mb-3"><input type="email" name="email" class="form-control col-sm-12" placeholder="Email" required></div>
                <div class="mb-3"><input type="password" name="password" class="form-control col-sm-12" placeholder="Password" required></div>
                <div class="mb-3"><button type="submit" class="btn btn-success w-100 col-sm-12">Login</button></div>
                <p style="text-align: center;"><a style="color:#fff" href="#">Forget Password ?</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>

    <!-- PreLoader -->
    <div id="preloader">
        <div id="status" class="loading-page">
            <img src="img/viking1.png" class="load-logo">
        </div>
    </div>
    <!--Preloader-->


    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
        <div class="modess">
            <div class="mode">
                <!-- <div> Dark Mode </div> -->
            </div>
        </div>

        <a class="navbar-brand" href="index.php">
                <img src="img/viking1.png" class="logo" alt="">
            </a>
<!-- //////////////////////////////////--Drop Down--////////////////////////////////////////////////// -->
<?php if ($is_logged_in): ?>

<div style="position: relative; display: inline-block;">
  <h5 style="margin: 0;color: white; cursor: pointer;font-size:30px;"
      onmouseover="this.nextElementSibling.style.display='block'"
      onmouseout="this.nextElementSibling.style.display='none'">
    <i class="bi bi-person-circle"></i>
  </h5>

  <div style="display: none; position: absolute; background-color: #f9f9f9; min-width: 200px;right:0;border-radius:4px; box-shadow: 0px 8px 16px rgba(0,0,0,0.2); z-index: 1;"
       onmouseover="this.style.display='block'"
       onmouseout="this.style.display='none'">

    <!-- <a href="#" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Profile Information</a> -->
    <a href="submitted_form.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Submitted Form Details</a>
    <a href="logout.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Logout</a>

  </div>
</div>

<?php endif; ?>



<!-- //////////////////////////////////--Drop Down--////////////////////////////////////////////////// -->
        </div>




    </nav>

    <!--Navbar end-->


    <div class="section-bnr inner-banner">
        <img src="img/line-pattern.png" style="position: absolute;top: 0;z-index: 0;width: 100%;">
        <!--<img src="img/svg/illu-gabel.svg" style="position: absolute;width: 200px;top: 24%;left: 20px;">
        <img src="img/svg/illu-getraenk.svg" style="position: absolute;width: 200px;top: 22%;right: 0px;">-->
        <div class="container position-relative" style="z-index: 2;">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="s-heading text-center">
                        <p class="">TIA-222-I MAINTENANCE AND CONDITION ASSESSMENT REPORT </p>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <form class="" name="contact_form" id="savealldata" method="post">

    <div class="pb-5 mb-5 position-relative" style="z-index: 9;">
    <?php
        if(!empty($uId))
         {
        $sql = "SELECT * FROM tower_inspection WHERE user_id = $uId AND form_type = 'draft'";
        $querry = $conn->query($sql);
        $tinspec = $querry->fetch_assoc();
        @$_SESSION['formid'] = $tinspec['id'];
        // $_SESSION['formid'];
        // echo "<pre>"; print_r($tinspec); die;
            }
        ?>
        <div class="container" style="margin-top: -65px;">
            <div class="row g-0 mt-4">

                <div class="col-lg-6 d-md-block d-none">
                    <img src="img/tower.JPG" class="shadow" style="width: 100%;height: 100%; object-fit: cover;border-top-left-radius: 5px;
                    border-bottom-left-radius: 5px;border-top-left-radius: 0;">
                                </div>
                                <div class="col-lg-6 d-flex">
                                    <div class="pt-4 row px-md-4 shadow w-100 bg-w" style="border-top-right-radius: 5px;
                            border-bottom-right-radius: 5px;">


                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="inspection_date" class="form-label"><i class="bi bi-calendar-date"></i>
                                    Inspection Date</label>
                                <input type="date" class="form-control tbs-input border" id="inspection_date"
                                    name="inspection_date" min="2025-03-06" value="<?php echo (!empty($tinspec['inspection_date'])) ? date('Y-m-d', strtotime($tinspec['inspection_date'])) : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="inspector_name" class="form-label"><i class="bi bi-person"></i> Inspector
                                    Name</label>
                                <input type="text" class="form-control tbs-input border" id="inspector_name"
                                    name="inspector_name" value="<?php echo (!empty($tinspec['inspector_name'])) ? $tinspec['inspector_name'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="inspection_company" class="form-label"><i class="bi bi-building"></i>
                                    Inspection Company</label>
                                <input type="text" class="form-control tbs-input border" id="inspection_company"
                                    name="inspection_company" value="<?php echo (!empty($tinspec['inspection_company'])) ? $tinspec['inspection_company'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="client_name" class="form-label"><i class="bi bi-people"></i> Client
                                    Name</label>
                                <input type="text" class="form-control tbs-input border" id="client_name"
                                    name="client_name" value="<?php echo (!empty($tinspec['client_name'])) ? $tinspec['client_name'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="tower_owner" class="form-label"><i class="bi bi-briefcase"></i> Tower
                                    Owner</label>
                                <input type="text" class="form-control tbs-input border" id="tower_owner"
                                    name="tower_owner" value="<?php echo (!empty($tinspec['tower_owner'])) ? $tinspec['tower_owner'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="tower_location" class="form-label"><i class="bi bi-geo-alt"></i> Tower
                                    Location</label>
                                <input type="text" class="form-control tbs-input border" id="tower_location"
                                    name="tower_location" value="<?php echo (!empty($tinspec['tower_location'])) ? $tinspec['tower_location'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="tower_id_name" class="form-label"><i class="bi bi-hash"></i> Tower
                                    ID/Name</label>
                                <input type="text" class="form-control tbs-input border" id="tower_id_name" name="tower_id_name"
                                value="<?php echo (!empty($tinspec['tower_id_name'])) ? $tinspec['tower_id_name'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6">
                                <label for="tower_type" class="form-label"><i class="bi bi-broadcast-pin"></i> Tower
                                    Type</label>
                                    <select class="form-select" id="tower_type" name="tower_type">
                                    <option value="">Select Tower Type</option>
                                    <option value="Guyed" <?php echo (isset($tinspec['tower_type']) && $tinspec['tower_type'] == 'Guyed') ? 'selected' : ''; ?>>Guyed</option>
                                    <option value="Self-Supporting" <?php echo (isset($tinspec['tower_type']) && $tinspec['tower_type'] == 'Self-Supporting') ? 'selected' : ''; ?>>Self-Supporting</option>
                                    <option value="Monopole" <?php echo (isset($tinspec['tower_type']) && $tinspec['tower_type'] == 'Monopole') ? 'selected' : ''; ?>>Monopole</option>
                                </select>
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="tower_height" class="form-label"><i class="bi bi-rulers"></i> Tower
                                    Height</label>
                                <input type="text" class="form-control tbs-input border" id="tower_height"
                                    name="tower_height" value="<?php echo (!empty($tinspec['tower_height'])) ? $tinspec['tower_height'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-6 position-relative">
                                <label for="year_of_construction" class="form-label"><i
                                        class="bi bi-calendar-check"></i> Year of Construction</label>
                                <input type="text" class="form-control tbs-input border" id="year_of_construction"
                                    name="year_of_construction" value="<?php echo (!empty($tinspec['year_of_construction'])) ? $tinspec['year_of_construction'] : ''; ?>">
                            </div>

                            <div class="form-group mb-3 col-sm-12 d-flex align-items-center justify-content-between">
                                <div style="flex: 1;">
                                    <label for="tower_photo" class="form-label">
                                        <i class="bi bi-camera"></i> Photo of Tower
                                    </label>
                                    <input type="file" class="form-control" id="tower_photo" name="tower_photo" style="padding-top: 18px !important;">
                                </div>

                                <?php if (!empty($tinspec['tower_photo'])): ?>
                                    <div style="margin-left: 20px;">
                                        <img src="<?php echo $base_url . $tinspec['tower_photo']; ?>" alt="Tower Photo" style="width: 100px; height: auto; border: 1px solid #ccc; border-radius: 4px;">
                                    </div>
                                <?php endif; ?>
                            </div>


                            <div class="form-group mb-3 col-sm-12">
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                            <th colspan="2"><b>Structural</b></th>
                                            <th colspan="2"><b>Maintenance</b></th>
                                        </tr>
                                        <tr>
                                            <th>Critical</th>
                                            <th>Non-Critical</th>
                                            <th>Critical</th>
                                            <th>Non-Critical</th>
                                        </tr>
                                        <tr>
                                            <td>
                                            <select class="form-select" id="structural_critical" name="structural_critical">
                                                <option>Select</option>
                                                <option value="Yes" <?php echo (!empty($tinspec['structural_critical']) && $tinspec['structural_critical'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo (!empty($tinspec['structural_critical']) && $tinspec['structural_critical'] == 'No') ? 'selected' : ''; ?>>No</option>
                                            </select>
                                            </td>
                                            <td>
                                            <select class="form-select" id="structural_non_critical" name="structural_non_critical">
                                                <option>Select</option>
                                                <option value="Yes" <?php echo (!empty($tinspec['structural_non_critical']) && $tinspec['structural_non_critical'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo (!empty($tinspec['structural_non_critical']) && $tinspec['structural_non_critical'] == 'No') ? 'selected' : ''; ?>>No</option>
                                            </select>
                                            </td>
                                            <td>
                                            <select class="form-select" id="maintenance_critical" name="maintenance_critical">
                                                <option>Select</option>
                                                <option value="Yes" <?php echo (!empty($tinspec['maintenance_critical']) && $tinspec['maintenance_critical'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo (!empty($tinspec['maintenance_critical']) && $tinspec['maintenance_critical'] == 'No') ? 'selected' : ''; ?>>No</option>
                                            </select>
                                            </td>
                                            <td>
                                            <select class="form-select" id="maintenance_non_critical" name="maintenance_non_critical">
                                                <option>Select</option>
                                                <option value="Yes" <?php echo (!empty($tinspec['maintenance_non_critical']) && $tinspec['maintenance_non_critical'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo (!empty($tinspec['maintenance_non_critical']) && $tinspec['maintenance_non_critical'] == 'No') ? 'selected' : ''; ?>>No</option>
                                            </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <section class="section-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading mb-0">Non Compliant maintenance and structural issues.</h2>

 <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
    LEFT JOIN maintenance_issues t2
    ON t1.id = t2.inspection_id
    WHERE t1.form_type = 'draft' AND t1.user_id = $uId
    ORDER BY t2.id ASC";


    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $data = [];
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        // echo "<pre>";
        // echo "Array[1]\n";
        // print_r($data);
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
?>
                        <fieldset>
                            <legend class="toggles"><i class="bi bi-exclamation-triangle-fill"></i> Maintenance issues
                                (Critical) <span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                            <div class="tabs">
                                <div class="row">
                                    <p>Priority</p>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-eye"></i>
                                            Observation</label>
                                        <textarea id="" class="form-control" rows="5" name="maintenance_critical_observation[]"
                                            placeholder="Enter text to save"><?= isset($data[0]['observation']) ? htmlspecialchars($data[0]['observation']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-lightbulb"></i>
                                            Recommendation</label>
                                        <textarea id="" class="form-control" rows="5"  name="maintenance_critical_recommendation[]"
                                            placeholder="Enter text to save"><?= isset($data[0]['recommendation']) ? htmlspecialchars($data[0]['recommendation']) : '' ?></textarea>
                                    </div>

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload
                                            Image</label>
                                        <div class="col-ting">
                                           <!-- Critical Observation Section -->
                                                <div class="image-upload-container">
                                                    <input type="hidden" id="preloadedImages" name="preloaded_image_critical[0]" value="<?= isset($data[0]['uploaded_image']) ? htmlspecialchars($data[0]['uploaded_image']) : '' ?>">
                                                    <input type="file" id="multiImageUpload" name="maintenance_critical_image[0][]" multiple style="display: none;" accept="image/*">
                                                    <button type="button" class="upload-img" onclick="document.getElementById('multiImageUpload').click();">
                                                        Select Images (Max 4)
                                                    </button>
                                                    <div id="imagePreviewContainer" class="d-flex flex-wrap mt-3">
                                                        <?php if(isset($data[0]['uploaded_image']) && !empty($data[0]['uploaded_image'])):
                                                            $critical_images = explode('|', $data[0]['uploaded_image']);
                                                            foreach($critical_images as $image):
                                                                if(!empty($image)): ?>
                                                                    <div class="image-preview-item">

                                                                    </div>
                                                                <?php endif;
                                                            endforeach;
                                                        endif; ?>
                                                    </div>
                                                </div>

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function () {
                                                        const previewContainer = document.getElementById('imagePreviewContainer');
                                                        const preloaded = document.getElementById('preloadedImages').value;

                                                        // Show preloaded images from PHP
                                                        if (preloaded) {
                                                            const imagePaths = preloaded.split('|');
                                                            imagePaths.forEach(path => {
                                                                const previewDiv = document.createElement('div');
                                                                previewDiv.className = 'image-preview position-relative m-2';
                                                                previewDiv.style.width = '80px';
                                                                previewDiv.style.height = '80px';

                                                                const img = document.createElement('img');
                                                                img.src = path;
                                                                img.style.width = '100%';
                                                                img.style.height = '100%';
                                                                img.style.objectFit = 'cover';
                                                                img.className = 'rounded';

                                                                const removeButton = document.createElement('button');
                                                                removeButton.innerHTML = '&times;';
                                                                removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                                removeButton.style.transform = 'translate(8%, -16%)';
                                                                removeButton.onclick = function () {
                                                                    previewDiv.remove();
                                                                };

                                                                previewDiv.appendChild(img);
                                                                previewDiv.appendChild(removeButton);
                                                                previewContainer.appendChild(previewDiv);
                                                            });
                                                        }

                                                        // Handle new image uploads
                                                        document.getElementById('multiImageUpload').addEventListener('change', function (event) {
                                                            const files = event.target.files;
                                                            const maxImages = 4;
                                                            const currentImages = previewContainer.querySelectorAll('.image-preview').length;

                                                            if (files.length + currentImages > maxImages) {
                                                                alert(`You can only upload up to ${maxImages} images in total.`);
                                                                event.target.value = ''; // Clear the input
                                                                return;
                                                            }

                                                            Array.from(files).forEach((file) => {
                                                                const reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    const previewDiv = document.createElement('div');
                                                                    previewDiv.className = 'image-preview position-relative m-2';
                                                                    previewDiv.style.width = '80px';
                                                                    previewDiv.style.height = '80px';

                                                                    const img = document.createElement('img');
                                                                    img.src = e.target.result;
                                                                    img.style.width = '100%';
                                                                    img.style.height = '100%';
                                                                    img.style.objectFit = 'cover';
                                                                    img.className = 'rounded';

                                                                    const removeButton = document.createElement('button');
                                                                    removeButton.innerHTML = '&times;';
                                                                    removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                                    removeButton.style.transform = 'translate(8%, -16%)';
                                                                    removeButton.onclick = function () {
                                                                        previewDiv.remove();
                                                                    };

                                                                    previewDiv.appendChild(img);
                                                                    previewDiv.appendChild(removeButton);
                                                                    previewContainer.appendChild(previewDiv);
                                                                };
                                                                reader.readAsDataURL(file);
                                                            });
                                                        });
                                                    });
                                                </script>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="toggles"><i class="bi bi-exclamation-circle"></i> Maintenance issues
                                (Non-Critical) <span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                            <div class="tabs">
                                <div class="row">
                                    <p>Priority</p>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-eye"></i>
                                            Observation</label>
                                        <textarea id="" class="form-control" rows="5" name="maintenance_non_critical_observation[]"
                                            placeholder="Enter text to save"><?= isset($data[1]['observation']) ? htmlspecialchars($data[1]['observation']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-lightbulb"></i>
                                            Recommendation</label>
                                        <textarea id="" class="form-control" rows="5" name="maintenance_non_critical_recommendation[]"
                                            placeholder="Enter text to save"><?= isset($data[1]['recommendation']) ? htmlspecialchars($data[1]['recommendation']) : '' ?></textarea>
                                    </div>

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload
                                            Image</label>
                                            <div class="col-ting">
                                            <!-- Non-Critical Observation Section -->
                                            <div class="image-upload-container">
                                                    <input type="hidden" id="preloadedImagesNonCritical" name="preloaded_image_non_critical[0]"
                                                        value="<?= isset($data[1]['uploaded_image']) ? htmlspecialchars($data[1]['uploaded_image']) : '' ?>">
                                                    <input type="file" id="multiImageUpload1" name="maintenance_non_critical_image[0][]" multiple style="display: none;" accept="image/*">
                                                    <button type="button" class="upload-img" onclick="document.getElementById('multiImageUpload1').click();">
                                                        Select Images (Max 4)
                                                    </button>
                                                    <div id="imagePreviewContainer1" class="d-flex flex-wrap mt-3">
                                                        <?php
                                                        if(isset($data[1]['uploaded_image']) && !empty($data[1]['uploaded_image'])):
                                                            // First, clean the image string by removing empty values
                                                            $non_critical_images = array_filter(explode('|', $data[1]['uploaded_image']));
                                                            // Then remove any duplicates
                                                            $non_critical_images = array_unique($non_critical_images);

                                                            foreach($non_critical_images as $image):
                                                                if(!empty($image)): ?>
                                                                    <!-- <div class="image-preview-item">
                                                                        <img src="<?= htmlspecialchars($image) ?>" alt="Non-Critical Observation Image"
                                                                            class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;">
                                                                        <button type="button" class="btn btn-sm btn-danger remove-image"
                                                                                data-image="<?= htmlspecialchars($image) ?>">×</button>
                                                                    </div> -->
                                                                <?php endif;
                                                            endforeach;
                                                        endif; ?>
                                                    </div>
                                                </div>

                                            <script>
                                                        document.addEventListener("DOMContentLoaded", function () {
                                                            const previewContainer1 = document.getElementById('imagePreviewContainer1');
                                                            const preloadedNonCritical = document.getElementById('preloadedImagesNonCritical').value;

                                                            if (preloadedNonCritical) {
                                                                const imagePaths = preloadedNonCritical.split('|');
                                                                imagePaths.forEach(path => {
                                                                    const previewDiv = document.createElement('div');
                                                                    previewDiv.className = 'image-preview position-relative m-2';
                                                                    previewDiv.style.width = '80px';
                                                                    previewDiv.style.height = '80px';

                                                                    const img = document.createElement('img');
                                                                    img.src = path;
                                                                    img.style.width = '100%';
                                                                    img.style.height = '100%';
                                                                    img.style.objectFit = 'cover';
                                                                    img.className = 'rounded';

                                                                    const removeButton = document.createElement('button');
                                                                    removeButton.innerHTML = '&times;';
                                                                    removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                                    removeButton.style.transform = 'translate(8%, -16%)';
                                                                    removeButton.onclick = function () {
                                                                        previewDiv.remove();
                                                                    };

                                                                    previewDiv.appendChild(img);
                                                                    previewDiv.appendChild(removeButton);
                                                                    previewContainer1.appendChild(previewDiv);
                                                                });
                                                            }

                                                            // Handle newly selected images (this part you already have, kept unchanged)
                                                            document.getElementById('multiImageUpload1').addEventListener('change', function(event) {
                                                                const files = event.target.files;
                                                                const maxImages = 4;
                                                                const currentImages = previewContainer1.querySelectorAll('.image-preview').length;

                                                                if (files.length + currentImages > maxImages) {
                                                                    alert(`You can only upload up to ${maxImages} images in total.`);
                                                                    event.target.value = ''; // Clear the input
                                                                    return;
                                                                }

                                                                Array.from(files).forEach((file) => {
                                                                    const reader = new FileReader();
                                                                    reader.onload = function(e) {
                                                                        const previewDiv = document.createElement('div');
                                                                        previewDiv.className = 'image-preview position-relative m-2';
                                                                        previewDiv.style.width = '80px';
                                                                        previewDiv.style.height = '80px';

                                                                        const img = document.createElement('img');
                                                                        img.src = e.target.result;
                                                                        img.style.width = '100%';
                                                                        img.style.height = '100%';
                                                                        img.style.objectFit = 'cover';
                                                                        img.className = 'rounded';

                                                                        const removeButton = document.createElement('button');
                                                                        removeButton.innerHTML = '&times;';
                                                                        removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                                        removeButton.style.transform = 'translate(8%, -16%)';
                                                                        removeButton.onclick = function () {
                                                                            previewDiv.remove();
                                                                        };

                                                                        previewDiv.appendChild(img);
                                                                        previewDiv.appendChild(removeButton);
                                                                        previewContainer1.appendChild(previewDiv);
                                                                    };
                                                                    reader.readAsDataURL(file);
                                                                });
                                                            });
                                                        });
                                                    </script>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <!-- ///////////////////////////////--Mainatance section completed--/////////////////////////////////// -->


                        <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
    LEFT JOIN structural_issues t2
    ON t1.id = t2.inspection_id
    WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.priority = 'critical'
    ORDER BY t2.id ASC";


    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $data = [];
        while ($row = $query->fetch_assoc()) {
            $datastr[] = $row;
        }

        // echo "<pre>";
        // echo "Array[1]\n";
        // print_r($datastr);
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
?>
                        <fieldset>
                            <legend class="toggles"><i class="bi bi-shield-exclamation"></i> Structural issues
                                (Critical)<span class="icon"><i class="bi bi-plus-circle"></i></span> </legend>
                            <div class="tabs">
                                <div class="row">
                                    <p>Priority</p>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-eye"></i>
                                            Observation</label>
                                        <textarea id="" class="form-control" rows="5" name="structural_critical_observation[]"
                                            placeholder="Enter text to save"><?= isset($datastr[0]['observation']) ? htmlspecialchars($datastr[0]['observation']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-lightbulb"></i>
                                            Recommendation</label>
                                        <textarea id="" class="form-control" rows="5" name="structural_critical_recommendation[]"
                                            placeholder="Enter text to save"><?= isset($datastr[0]['recommendation']) ? htmlspecialchars($datastr[0]['recommendation']) : '' ?></textarea>
                                    </div>

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload
                                            Image</label>
                                            <div class="col-ting">

                                                 <?php
                                               $preloadedCritical = (!empty($datastr[0]['uploaded_image'])) ?
                                               explode('|', $datastr[0]['uploaded_image']) :
                                               [];
                                            //    echo "<pre>"; print_r();
                                           ?>
                                                <div class="image-upload-container">
                                                    <input type="file" id="multiImageUpload2" name="structural_critical_image[0][]" multiple style="display: none;" accept="image/*">
                                                    <button type="button" class="upload-img" onclick="document.getElementById('multiImageUpload2').click();">
                                                        Select Images (Max 4)
                                                    </button>

                                                    <!-- Hidden input to keep old images -->
                                                    <?php foreach ($preloadedCritical as $key => $img): ?>
                                                        <input type="hidden" name="existing_structural_critical_images[<?= $key ?>][]" value="<?= $img ?>">
                                                    <?php endforeach; ?>

                                                    <div id="imagePreviewContainer2" class="d-flex flex-wrap mt-3">
                                                        <?php foreach ($preloadedCritical as $img):
                                                             ?>
                                                            <div class="image-previewss position-relative m-2" style="width:80px; height:80px;">
                                                                <img src="<?= $img ?>" style="width:100%; height:100%; object-fit:cover;" class="rounded">
                                                                <button type="button" class="btn-cross position-absolute top-0 end-0" style="transform: translate(8%, -16%);" onclick="this.parentElement.remove()">&times;</button>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>

                                            <script>
                                                document.getElementById('multiImageUpload2').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainer2');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = '';
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-previewss position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                            <?php
                            if ($uId) {
                                $sql = "SELECT * FROM tower_inspection t1
                                LEFT JOIN structural_issues t2
                                ON t1.id = t2.inspection_id
                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.priority = 'non-critical'
                                ORDER BY t2.id  ASC";

                                $query = $conn->query($sql);

                                if ($query && $query->num_rows > 0) {
                                    $data = [];
                                    while ($row = $query->fetch_assoc()) {
                                        $datastrnon[] = $row;
                                    }
                                    //  echo "<pre>";
                                    // echo "Array[1]\n";
                                    // print_r($datastrnon);
                                    // echo "</pre>";
                                } else {
                                    // No data found
                                }
                            }
                            ?>

                        <fieldset>
                            <legend class="toggles"><i class="bi bi-shield-exclamation"></i> Structural issues (Non-Critical)<span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                            <div class="tabs">
                                  <?php
                                        if (empty($datastrnon)) {
                                            // Add a default blank issue if none exist
                                            $datastrnon = [
                                                [
                                                    'priority' => 'non-critical',
                                                    'observation' => '',
                                                    'recommendation' => '',
                                                    'uploaded_image' => ''
                                                ]
                                            ];
                                        }
                                    ?>

                                <?php foreach ($datastrnon as $index => $issue): ?>
                                    <div class="row">
                                        <p>Priority</p>

                                        <div class="form-group mb-3 col-sm-4 position-relative">
                                            <label class="form-label"><i class="bi bi-eye"></i> Observation</label>
                                            <textarea class="form-control" rows="5" name="structural_non_critical_observation[]" placeholder="Enter text to save"><?= htmlspecialchars(isset($issue['observation']) ? $issue['observation'] : '') ?>
                                            </textarea>
                                        </div>

                                        <div class="form-group mb-3 col-sm-4 position-relative">
                                            <label class="form-label"><i class="bi bi-lightbulb"></i> Recommendation</label>
                                            <textarea class="form-control" rows="5" name="structural_non_critical_recommendation[]" placeholder="Enter text to save"><?= htmlspecialchars(isset($issue['recommendation']) ? $issue['recommendation'] : '') ?></textarea>
                                        </div>

                                        <div class="form-group mb-3 col-sm-4 position-relative">
                                            <label class="form-label"><i class="bi bi-image"></i> Upload Image</label>
                                            <div class="col-ting">
                                                <?php
                                                    $preloadedNonCritical = (!empty($issue['uploaded_image'])) ? explode('|', $issue['uploaded_image']) : [];
                                                ?>
                                                <div class="image-upload-container">
                                                    <input type="file" id="multiImageUpload<?= $index ?>" name="structural_non_critical_image[<?= $index ?>][]" multiple style="display: none;" accept="image/*">
                                                    <button type="button" class="upload-img" onclick="document.getElementById('multiImageUpload<?= $index ?>').click();">
                                                        Select Images (Max 4)
                                                    </button>

                                                    <?php foreach ($preloadedNonCritical as $key => $img): ?>
                                                        <input type="hidden" name="existing_structural_non_critical_images[<?= $index ?>][<?= $key ?>]" value="<?= $img ?>">
                                                    <?php endforeach; ?>

                                                    <div id="imagePreviewContainer<?= $index ?>" class="d-flex flex-wrap mt-3">
                                                        <?php foreach ($preloadedNonCritical as $img): ?>
                                                            <div class="image-preview position-relative m-2" style="width:80px; height:80px;">
                                                                <img src="<?= $img ?>" style="width:100%; height:100%; object-fit:cover;" class="rounded">
                                                                <button type="button" class="btn-cross position-absolute top-0 end-0" style="transform: translate(8%, -16%);" onclick="this.parentElement.remove()">&times;</button>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <script>
                                                document.getElementById('multiImageUpload').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainer2');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </fieldset>






                        <div id="additionalFieldsets"></div>
                        <!-- <button class="add-row" type="button" onclick="addFieldset()"><i class="bi bi-plus-circle"></i> Add More</button> -->
                               <!-- <script>
                          let fieldsetCount = 0;

                            function addFieldset() {
                                const container = document.getElementById('additionalFieldsets');
                                const fieldset = document.createElement('fieldset');

                                const imageInputId = `multiImageUpload_${fieldsetCount}`;
                                const imagePreviewId = `imagePreviewContainer_${fieldsetCount}`;

                                fieldset.innerHTML = `
                                    <legend class="toggles"><i class="bi bi-shield"></i> Structural Issue</legend>
                                    <div class="tabs">
                                        <div class="row">
                                            <p>Priority</p>
                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                <label><i class="bi bi-eye"></i> Observation</label>
                                                <textarea class="form-control" rows="5" name="structural__non_critical_observation[]" placeholder="Enter text to save"></textarea>
                                            </div>
                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                <label><i class="bi bi-lightbulb"></i> Recommendation</label>
                                                <textarea class="form-control" rows="5" name="structural_non_critical_recommendation[]" placeholder="Enter text to save"></textarea>
                                            </div>
                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                <label><i class="bi bi-image"></i> Upload Image</label>
                                                <div class="col-ting">
                                                    <div class="image-upload-container">
                                                        <input type="file" id="${imageInputId}" name="structural_non_critical_image[${fieldsetCount}][]" multiple style="display: none;" accept="image/*">
                                                        <button type="button" class="upload-img" onclick="document.getElementById('${imageInputId}').click();">Select Images (Max 4)</button>
                                                        <div id="${imagePreviewId}" class="d-flex flex-wrap mt-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="remove-row" type="button" onclick="removeFieldset(this)"><i class="bi bi-trash"></i></button>
                                `;

                                container.appendChild(fieldset);

                                // Add event listener to handle image preview
                                document.getElementById(imageInputId).addEventListener('change', function(event) {
                                    const files = event.target.files;
                                    const previewContainer = document.getElementById(imagePreviewId);

                                    if (files.length > 4) {
                                        alert('You can only upload up to 4 images.');
                                        event.target.value = '';
                                        return;
                                    }

                                    previewContainer.innerHTML = '';
                                    Array.from(files).forEach((file) => {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            const previewDiv = document.createElement('div');
                                            previewDiv.className = 'image-preview position-relative m-2';
                                            previewDiv.style.width = '80px';
                                            previewDiv.style.height = '80px';

                                            const img = document.createElement('img');
                                            img.src = e.target.result;
                                            img.style.width = '100%';
                                            img.style.height = '100%';
                                            img.style.objectFit = 'cover';
                                            img.className = 'rounded';

                                            const removeButton = document.createElement('button');
                                            removeButton.innerHTML = '&times;';
                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                            removeButton.style.transform = 'translate(8%, -16%)';
                                            removeButton.onclick = function() {
                                                previewDiv.remove();
                                            };

                                            previewDiv.appendChild(img);
                                            previewDiv.appendChild(removeButton);
                                            previewContainer.appendChild(previewDiv);
                                        };
                                        reader.readAsDataURL(file);
                                    });
                                });

                                // Toggle visibility of tab content
                                $('.toggles').off().on('click', function () {
                                    $(this).next('.tabs').slideToggle('slow');
                                });

                                fieldsetCount++;
                            }

                        </script> -->

                                                <!-- //////////////////////---add mroe field--///////////////////////////////////-->
                                                 <div id="fieldsetTemplate" style="display: none;">
                                                <fieldset class="repeatable-fieldset">
                                                    <legend class="toggles"><i class="bi bi-shield-exclamation"></i> Structural issues (Non Critical)
                                                        <span class="icon"><i class="bi bi-plus-circle"></i></span>
                                                    </legend>
                                                    <div class="tabs">
                                                        <div class="row">
                                                            <p>Priority</p>
                                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                                <label class="form-label"><i class="bi bi-eye"></i> Observation</label>
                                                                <textarea class="form-control" rows="5" name="structural_non_critical_observation[]" placeholder="Enter text to save"></textarea>
                                                            </div>
                                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                                <label class="form-label"><i class="bi bi-lightbulb"></i> Recommendation</label>
                                                                <textarea class="form-control" rows="5" name="structural_non_critical_recommendation[]" placeholder="Enter text to save"></textarea>
                                                            </div>
                                                            <div class="form-group mb-3 col-sm-4 position-relative">
                                                                <label class="form-label"><i class="bi bi-image"></i> Upload Image</label>
                                                                <div class="col-ting">
                                                                    <div class="image-upload-container">
                                                                        <input type="file" class="multiImageUpload" name="structural_non_critical_image[]" multiple style="display: none;" accept="image/*">
                                                                        <button type="button" class="upload-img">Select Images (Max 4)</button>
                                                                        <div class="imagePreviewContainer d-flex flex-wrap mt-3"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger remove-fieldset mt-2">
                                                        <i class="bi bi-trash"></i> Remove Section
                                                    </button>
                                                </fieldset>
                                            </div>
                                            <button class="add-row" type="button" onclick="addFieldset()"><i class="bi bi-plus-circle"></i> Add More</button>

                                            <script>
                                                let imageInputIndex = 1;

                                                function addFieldset() {
                                                    const template = document.getElementById('fieldsetTemplate').innerHTML;
                                                    const container = document.getElementById('additionalFieldsets');
                                                    const newSection = document.createElement('div');
                                                    newSection.innerHTML = template;

                                                    const fileInput = newSection.querySelector('.multiImageUpload');
                                                    const uploadBtn = newSection.querySelector('.upload-img');
                                                    const previewContainer = newSection.querySelector('.imagePreviewContainer');

                                                    fileInput.name = `structural_non_critical_image[${imageInputIndex++}][]`;

                                                    uploadBtn.onclick = function () {
                                                        fileInput.click();
                                                    };

                                                    const deleteBtn = newSection.querySelector('.remove-fieldset');
                                                    deleteBtn.addEventListener('click', () => {
                                                        newSection.remove();
                                                    });

                                                    fileInput.addEventListener('change', function (event) {
                                                        const files = event.target.files;
                                                        const maxImages = 4;

                                                        if (files.length > maxImages) {
                                                            alert(`You can only upload up to ${maxImages} images.`);
                                                            event.target.value = '';
                                                            return;
                                                        }

                                                        previewContainer.innerHTML = '';

                                                        Array.from(files).forEach(file => {
                                                            const reader = new FileReader();
                                                            reader.onload = function (e) {
                                                                const previewDiv = document.createElement('div');
                                                                previewDiv.className = 'image-preview position-relative m-2';
                                                                previewDiv.style.width = '80px';
                                                                previewDiv.style.height = '80px';

                                                                const img = document.createElement('img');
                                                                img.src = e.target.result;
                                                                img.style.width = '100%';
                                                                img.style.height = '100%';
                                                                img.style.objectFit = 'cover';
                                                                img.className = 'rounded';

                                                                const removeBtn = document.createElement('button');
                                                                removeBtn.innerHTML = '&times;';
                                                                removeBtn.className = 'btn-cross position-absolute top-0 end-0';
                                                                removeBtn.style.transform = 'translate(8%, -16%)';
                                                                removeBtn.onclick = function () {
                                                                    previewDiv.remove();
                                                                };

                                                                previewDiv.appendChild(img);
                                                                previewDiv.appendChild(removeBtn);
                                                                previewContainer.appendChild(previewDiv);
                                                            };
                                                            reader.readAsDataURL(file);
                                                        });
                                                    });

                                                    container.appendChild(newSection);
                                                }

                                            </script>




                        <div class="header" style="margin-top: 30px;"><i class="bi bi-tools"></i> Maintenance Issues -
                            Tower (MAINTENANCE)</div>
                        <p>The following issues identified are considered lower priority deviations that do not require
                            immediate attention but should be considered as part of future tower maintenance activities.
                        </p>
                            <?php
                            if ($uId) {
                                $sql = "SELECT * FROM tower_inspection t1
                                LEFT JOIN maintenance_issues_tower t2
                                ON t1.id = t2.inspection_id
                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId
                                ORDER BY t2.id ASC";


                                $query = $conn->query($sql);

                                if ($query && $query->num_rows > 0) {
                                    $data = [];
                                    while ($row = $query->fetch_assoc()) {
                                        $datatower[] = $row;
                                    }

                                    // echo "<pre>";
                                    // echo "Array[1]\n";
                                    // print_r($data);
                                    // echo "</pre>";
                                } else {
                                    // echo "No draft inspection data found.";
                                }
                            }
                            ?>


                        <fieldset>
                            <legend class="toggles" style="padding-bottom: 20px;"><i class="bi bi-shield-exclamation"></i> Category & Item Description
                                Critical<span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                            <div class="tabs">
                                <div class="row">

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-eye"></i>
                                        2.2.1 Guy Anchors Vegetation	</label>
                                        <textarea id="" class="form-control" rows="5" name="category_description[]"
                                            placeholder="Enter text to save"><?= isset($datatower[0]['category_description']) ? htmlspecialchars($datatower[0]['category_description']) : '' ?></textarea>
                                    </div>


                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-lightbulb"></i>
                                        Non-Compliant Item & Recommendation	</label>
                                        <textarea id="" class="form-control" rows="5" name="non_compliant_item[]"
                                            placeholder="Enter text to save"><?= isset($datatower[0]['non_compliant_item']) ? htmlspecialchars($datatower[0]['non_compliant_item']) : '' ?></textarea>
                                    </div>

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload
                                            Image</label>
                                            <div class="col-ting">
                                            <div class="image-upload-container">
                                                <!-- For the first item (index 0) -->
                                                <input type="hidden" name="existing_photos[0]" value="<?= isset($datatower[0]['photo']) ? htmlspecialchars($datatower[0]['photo']) : '' ?>">
                                                <input type="file" id="multiImageUploam1" name="photo[0][]" multiple style="display: none;" accept="image/*">
                                                <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploam1').click();">
                                                    Select Images (Max 4)
                                                </button>
                                                <div id="imagePreviewContainerm1" class="d-flex flex-wrap mt-3">
                                                <?php if (!empty($datatower[0]['photo'])):
                                                    $existingPhotos = explode(',', $datatower[0]['photo']);
                                                    foreach ($existingPhotos as $img): ?>
                                                        <div class="image-preview position-relative m-2" style="width: 80px; height: 80px;">
                                                            <img src="<?= htmlspecialchars($img) ?>" style="width:100%; height:100%; object-fit:cover;" class="rounded">
                                                        </div>
                                                    <?php endforeach;
                                                endif; ?>
                                                </div>
                                            </div>

                                            <script>
                                                document.getElementById('multiImageUploam1').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainerm1');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });


                                            </script>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend class="toggles" style="padding-bottom: 20px;"><i class="bi bi-shield-exclamation"></i> Category & Item Description
                                Critical<span class="icon"><i class="bi bi-plus-circle"></i></span></legend>
                            <div class="tabs">
                                <div class="row">

                                   <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-eye"></i>
                                        2.2.2 Construction Materials	</label>
                                        <textarea id="" class="form-control" rows="5" name="category_description[]"
                                            placeholder="Enter text to save"><?= isset($datatower[1]['category_description']) ? htmlspecialchars($datatower[1]['category_description']) : '' ?></textarea>
                                    </div>


                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-lightbulb"></i>
                                        Non-Compliant Item & Recommendation	</label>
                                        <textarea id="" class="form-control" rows="5" name="non_compliant_item[]"
                                            placeholder="Enter text to save"><?= isset($datatower[1]['non_compliant_item']) ? htmlspecialchars($datatower[1]['non_compliant_item']) : '' ?></textarea>
                                    </div>

                                    <div class="form-group mb-3 col-sm-4 position-relative">
                                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload
                                            Image</label>
                                            <div class="col-ting">
                                            <div class="image-upload-container">
                                            <input type="hidden" name="existing_photos[1]" value="<?= isset($datatower[1]['photo']) ? htmlspecialchars($datatower[1]['photo']) : '' ?>">
                                                <input type="file" id="multiImageUploadm2" name="photo[1][]" multiple style="display: none;" accept="image/*">
                                                <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploadm2').click();">
                                                    Select Images (Max 4)
                                                </button>
                                                <div id="imagePreviewContainerm2" class="d-flex flex-wrap mt-3">
                                                <?php if (!empty($datatower[1]['photo'])):
                                                    $existingPhotos = explode(',', $datatower[1]['photo']);
                                                    foreach ($existingPhotos as $img): ?>
                                                        <div class="image-preview position-relative m-2" style="width: 80px; height: 80px;">
                                                            <img src="<?= htmlspecialchars($img) ?>" style="width:100%; height:100%; object-fit:cover;" class="rounded">
                                                        </div>
                                                    <?php endforeach;
                                                endif; ?>
                                                </div>
                                            </div>

                                            <script>
                                                document.getElementById('multiImageUploadm2').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainerm2');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });

                                                document.querySelectorAll('.btn-cross').forEach(button => {
                                                    button.addEventListener('click', function() {
                                                        const previewDiv = this.parentElement;
                                                        const imgSrc = previewDiv.querySelector('img').src;

                                                        // Add to a hidden field of removed images if needed
                                                        const removedInput = document.createElement('input');
                                                        removedInput.type = 'hidden';
                                                        removedInput.name = 'removed_photos[]';
                                                        removedInput.value = imgSrc;
                                                        document.getElementById('yourFormId').appendChild(removedInput);

                                                        previewDiv.remove();
                                                    });
                                                });
                                            </script>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>



                        <!-- <div class="table-responsive">
                            <table class="table table-striped" id="maintenanceTable">
                                <thead style="position: sticky;top: 0" class="thead-dark">
                                    <tr>
                                        <th class="header">Category & Item Description</th>
                                        <th class="header">Non-Compliant Item & Recommendation</th>
                                        <th class="header">Photo</th>
                                        <th class="header">Remove</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <p>2.2.1 Guy Anchors Vegetation</p>
                                        <input type="hidden" name="category_description[]" value="2.2.1 Guy Anchors Vegetation">
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="4" name="non_compliant_item[]" placeholder="The guy anchor areas are overgrown with vegetation. Recommend vegetation be removed, ground scrubbed, weed barrier applied, and 4”-6” of rock added around the anchors."></textarea>
                                    </td>
                                    <td>
                                    <div class="col-ting">
                                            <div class="image-upload-container">
                                                <input type="file" id="multiImageUploada1" name="photo[]" multiple style="display: none;" accept="image/*">
                                                <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploada1').click();">
                                                    Select Images (Max 4)
                                                </button>
                                                <div id="imagePreviewContainera1" class="d-flex flex-wrap mt-3"></div>
                                            </div>

                                            <script>
                                                document.getElementById('multiImageUploada1').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainera1');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>


                                        </div>

                                    </td>
                                    <td>
                                        <button class="remove-row" onclick="removeRow(this)"><i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>2.2.2 Construction Materials</p>
                                        <input type="hidden" name="category_description[]" value="2.2.2 Construction Materials">
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="4" name="non_compliant_item[]" placeholder="Construction materials are present on a field access path and in the corner of the compound. Recommend materials be removed or consolidated within the compound fencing."></textarea>
                                    </td>
                                    <td>

                                    <div class="col-ting">
                                            <div class="image-upload-container">
                                                <input type="file" id="multiImageUploada2" name="photo[]" multiple style="display: none;" accept="image/*">
                                                <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploada2').click();">
                                                    Select Images (Max 4)
                                                </button>
                                                <div id="imagePreviewContainera2" class="d-flex flex-wrap mt-3"></div>
                                            </div>

                                            <script>
                                                document.getElementById('multiImageUploada2').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainera2');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>


                                        </div>


                                    </td>
                                    <td>
                                        <button class="remove-row" onclick="removeRow(this)"><i class="bi bi-trash"></i>
                                            </button>
                                    </td>
                            </table>
                        </div>
                            <button class="add-row" type="button" onclick="addRowToMaintenanceTable()"><i
                                    class="bi bi-plus-circle"></i> Add More</button>
                            <script>
                                function addRowToMaintenanceTable() {
                                    const table = document.getElementById("maintenanceTable");
                                    const newRow = table.insertRow(-1);

                                    const cell1 = newRow.insertCell(0);
                                    const cell2 = newRow.insertCell(1);
                                    const cell3 = newRow.insertCell(2);
                                    const cell4 = newRow.insertCell(3);

                                    cell1.innerHTML = '<textarea class="form-control" name="category_description[]" rows="4" placeholder="Enter category & item description"></textarea>';
                                    cell2.innerHTML = '<textarea class="form-control" name="non_compliant_item[]" rows="4" placeholder="Enter non-compliant item & recommendation"></textarea>';
                                    cell3.innerHTML = '<input type="file" name="photo[]">';
                                    cell4.innerHTML = '<button class="remove-row" onclick="removeRow(this)"><i class="bi bi-trash"></i></button>';
                                }

                                function removeRow(button) {
                                    const row = button.parentElement.parentElement;
                                    row.remove();
                                }
                            </script>
 -->



                    <!-- </form> -->
                </div>
            </div>
        </div>
    </section>


    <section class="section-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading mb-5 text-center">Deficiency Schedule</h2>
                    <?php
                            if ($uId) {
                                $sql = "SELECT * FROM tower_inspection t1
                                LEFT JOIN deficiency_schedule t2
                                ON t1.id = t2.inspection_id
                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId
                                ORDER BY t2.id ASC";


                                $query = $conn->query($sql);

                                if ($query && $query->num_rows > 0) {
                                    $data = [];
                                    while ($row = $query->fetch_assoc()) {
                                        $data[] = $row;
                                    }

                                    // echo "<pre>";
                                    // echo "Array[1]\n";
                                    // print_r($data);
                                    // echo "</pre>";
                                } else {
                                    // echo "No draft inspection data found.";
                                }
                            }
                            ?>

                    <div class="table-responsive">
                        <table id="deficiencyTable">
                            <thead>
                                <tr>
                                    <th>Deficiency</th>
                                    <th>Elevation (ft)</th>
                                    <th>Location</th>
                                    <th>Notes</th>
                                    <th>Category</th>
                                    <th>Upload Image</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tr>
                            <td><input type="text" name="deficiency[]" class="form-control" value="<?php echo (!empty($data[0]['deficiency'])) ? $data[0]['deficiency'] : ''; ?>"></td>
                            <td><input type="text" name="elevation[]" class="form-control" value="<?php echo (!empty($data[0]['elevation'])) ? $data[0]['elevation'] : ''; ?>"></td>
                            <td><input type="text" name="location[]" class="form-control" value="<?php echo (!empty($data[0]['location'])) ? $data[0]['location'] : ''; ?>"></td>
                            <td><input type="text" name="notes[]" class="form-control" value="<?php echo (!empty($data[0]['notes'])) ? $data[0]['notes'] : ''; ?>"></td>
                            <td>
                                <select class="form-select" name="category[]">
                                    <option value="">Select Category</option>
                                    <option value="Maintenance issues (Critical)" <?= (!empty($data[0]['category']) && $data[0]['category'] == 'Maintenance issues (Critical)') ? 'selected' : ''; ?>>Maintenance issues (Critical)</option>
                                    <option value="Maintenance issues (Non-Critical)" <?= (!empty($data[0]['category']) && $data[0]['category'] == 'Maintenance issues (Non-Critical)') ? 'selected' : ''; ?>>Maintenance issues (Non-Critical)</option>
                                    <option value="Structural issues (Critical)" <?= (!empty($data[0]['category']) && $data[0]['category'] == 'Structural issues (Critical)') ? 'selected' : ''; ?>>Structural issues (Critical)</option>
                                    <option value="Structural issues (Non Critical)" <?= (!empty($data[0]['category']) && $data[0]['category'] == 'Structural issues (Non Critical)') ? 'selected' : ''; ?>>Structural issues (Non Critical)</option>
                                </select>
                            </td>

                                <td>
                                    <!-- <input type="file" name="" class="form-control"> -->

                                    <div class="col-ting">
                                    <div class="image-upload-container">
                                            <input type="file" id="multiImageUploadds1" name="image[0][]" multiple style="display: none;" accept="image/*">
                                            <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploadds1').click();">
                                                Select Images (Max 4)
                                            </button>

                                            <div id="imagePreviewContainerds1" class="d-flex flex-wrap mt-3">
                                                <?php
                                                if (!empty($data[0]['image'])) {
                                                    $images = explode('|', $data[0]['image']);
                                                    foreach ($images as $img) {
                                                        echo '<div class="me-2 mb-2">';
                                                        echo '<img src="' . $img . '" alt="Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ccc;">';
                                                        echo '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                            <script>
                                                document.getElementById('multiImageUploadds1').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainerds1');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>


                                        </div>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                            <td><input type="text" name="deficiency[]" class="form-control" value="<?php echo (!empty($data[1]['deficiency'])) ? $data[1]['deficiency'] : ''; ?>"></td>
                            <td><input type="text" name="elevation[]" class="form-control" value="<?php echo (!empty($data[1]['elevation'])) ? $data[1]['elevation'] : ''; ?>"></td>
                            <td><input type="text" name="location[]" class="form-control" value="<?php echo (!empty($data[1]['location'])) ? $data[1]['location'] : ''; ?>"></td>
                            <td><input type="text" name="notes[]" class="form-control" value="<?php echo (!empty($data[1]['notes'])) ? $data[1]['notes'] : ''; ?>"></td>
                            <td>
                                <select class="form-select" name="category[]">
                                    <option value="">Select Category</option>
                                    <option value="Maintenance issues (Critical)" <?= (!empty($data[1]['category']) && $data[1]['category'] == 'Maintenance issues (Critical)') ? 'selected' : ''; ?>>Maintenance issues (Critical)</option>
                                    <option value="Maintenance issues (Non-Critical)" <?= (!empty($data[1]['category']) && $data[1]['category'] == 'Maintenance issues (Non-Critical)') ? 'selected' : ''; ?>>Maintenance issues (Non-Critical)</option>
                                    <option value="Structural issues (Critical)" <?= (!empty($data[1]['category']) && $data[1]['category'] == 'Structural issues (Critical)') ? 'selected' : ''; ?>>Structural issues (Critical)</option>
                                    <option value="Structural issues (Non Critical)" <?= (!empty($data[1]['category']) && $data[1]['category'] == 'Structural issues (Non Critical)') ? 'selected' : ''; ?>>Structural issues (Non Critical)</option>
                                </select>
                            </td>
                                <td>
                                    <!-- <input type="file" name="image[]" class="form-control"> -->

                                    <div class="col-ting">
                                    <div class="image-upload-container">
                                        <input type="file" id="multiImageUploadds2" name="image[1][]" multiple style="display: none;" accept="image/*">
                                        <button type="button" class="upload-img" onclick="document.getElementById('multiImageUploadds2').click();">
                                            Select Images (Max 4)
                                        </button>

                                        <div id="imagePreviewContainerds2" class="d-flex flex-wrap mt-3">
                                            <?php
                                            if (!empty($data[1]['image'])) {
                                                $images = explode('|', $data[1]['image']);
                                                foreach ($images as $img) {
                                                    echo '<div class="me-2 mb-2">';
                                                    echo '<img src="' . $img . '" alt="Image" width="100" height="100" style="object-fit: cover; border: 1px solid #ccc;">';
                                                    echo '</div>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>


                                            <script>
                                                document.getElementById('multiImageUploadds2').addEventListener('change', function(event) {
                                                    const files = event.target.files;
                                                    const previewContainer = document.getElementById('imagePreviewContainerds2');
                                                    const maxImages = 4;

                                                    if (files.length > maxImages) {
                                                        alert(`You can only upload up to ${maxImages} images.`);
                                                        event.target.value = ''; // Clear the input
                                                        return;
                                                    }

                                                    previewContainer.innerHTML = ''; // Clear previous previews

                                                    Array.from(files).forEach((file, index) => {
                                                        const reader = new FileReader();
                                                        reader.onload = function(e) {
                                                            const previewDiv = document.createElement('div');
                                                            previewDiv.className = 'image-preview position-relative m-2';
                                                            previewDiv.style.width = '80px';
                                                            previewDiv.style.height = '80px';

                                                            const img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.style.width = '100%';
                                                            img.style.height = '100%';
                                                            img.style.objectFit = 'cover';
                                                            img.className = 'rounded';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.innerHTML = '&times;';
                                                            removeButton.className = 'btn-cross position-absolute top-0 end-0';
                                                            removeButton.style.transform = 'translate(8%, -16%)';
                                                            removeButton.onclick = function() {
                                                                previewDiv.remove();
                                                            };

                                                            previewDiv.appendChild(img);
                                                            previewDiv.appendChild(removeButton);
                                                            previewContainer.appendChild(previewDiv);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    });
                                                });
                                            </script>


                                        </div>

                                </td>
                                <td><button class="remove-row" onclick="this.parentElement.parentElement.remove()"><i
                                            class="bi bi-trash"></i></button></td>
                            </tr>
                        </table>
                    </div>
                    <button class="add-row" type="button" onclick="addRow()"><i class="bi bi-plus-circle"></i> Add
                        Row</button>

                </div>
            </div>
        </div>
    </section>



<!--
        /////////////////
        ///////////-completed///////////
        //////////////////////////// -->

        <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
            LEFT JOIN site_condition_checklist t2
            ON t1.id = t2.inspection_id
            WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.notes = 'site_conditions'";

    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $data = [];
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        // echo "<pre>";
        // echo "Array[1]\n";
        // print_r($data[0]['id']);
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
?>
    <section class="section-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading mb-5 text-center">TIA-222-h Annex J condition checklist </h2>

                    <!-- Section I: Site Conditions -->
                    <div class="table-responsive">
                        <table class="tables">
                            <thead>
                                <tr class="table-header">
                                    <th class="font-sd" colspan="3" style="font-weight: 500;"><i
                                            class="bi bi-geo"></i>I. SITE CONDITIONS (Ground level)</th>
                                </tr>
                                <tr class="table-header">
                                    <th>Inspection Item</th>
                                    <th>Condition</th>
                                    <th>Item Number / Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="3" style="text-align: left;">A. Site Access Road</th>
                                </tr>
                                <tr>
                                    <td>Gate / Lock</td>
                                    <input type="hidden" name="inspection_item[]" value="Gate / Lock">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[0]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[0]['item_number_notes']) ? htmlspecialchars($data[0]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>
                                        <!-- --------------------section one----------------------- -->

                                        <tr>
                                    <td>Aggregate / Weed Barrier</td>
                                    <input type="hidden" name="inspection_item[]" value="Aggregate / Weed Barrier">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[1]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[1]['item_number_notes']) ? htmlspecialchars($data[1]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>

                                </tr>
                                        <!-- --------------------section two----------------------- -->
                                <tr>
                                    <td>Settlement / Drainage</td>
                                    <input type="hidden" name="inspection_item[]" value="Settlement / Drainage">
                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[2]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[0]['item_number_notes']) ? htmlspecialchars($data[0]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>
                                        <!-- --------------------section three----------------------- -->

                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">B. Compound</th>
                                </tr>
                                <tr>


                                    <td>Aggregate / Weed Barrier </td>
                                    <input type="hidden" name="inspection_item[]" value="Aggregate / Weed Barrier">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[3]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[3]['item_number_notes']) ? htmlspecialchars($data[3]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>
                                        <!-- --------------------section four----------------------- -->

                                <tr>
                                    <td>Settlement / Drainage</td>
                                    <input type="hidden" name="inspection_item[]" value="Settlement / Drainage">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[4]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[4]['item_number_notes']) ? htmlspecialchars($data[4]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>

                                </tr>
                                        <!-- --------------------section five----------------------- -->

                                <tr>
                                    <td>Owner / Client Assets</td>
                                    <input type="hidden" name="inspection_item[]" value="Owner / Client Assets">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[5]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[5]['item_number_notes']) ? htmlspecialchars($data[5]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>
                                        <!-- --------------------section six----------------------- -->

                                <tr>
                                    <td>Owner/Client Grounding
                                    </td>
                                    <input type="hidden" name="inspection_item[]" value="Owner/Client Grounding">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[6]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes[]"
                                            value="<?= isset($data[6]['item_number_notes']) ? htmlspecialchars($data[6]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>
                                        <!-- --------------------section seven----------------------- -->


                                <tr>
                                    <td>Fence/gate
                                    </td>
                                    <input type="hidden" name="inspection_item[]" value="Fence/gate">

                                    <td>
                                        <select class="form-select" name="item_condition[]">
                                            <option value="" disabled <?= empty($data[6]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes[]" placeholder="Item" value="<?= isset($data[6]['item_number_notes']) ? htmlspecialchars($data[6]['item_number_notes']) : '' ?>"></td>
                                </tr>
                                        <!-- --------------------section seven----------------------- -->

                            </tbody>
                        </table>
                    </div>

                    <?php
                            if ($uId) {
                                $sql = "SELECT * FROM tower_inspection t1
                                        LEFT JOIN site_condition_checklist t2
                                        ON t1.id = t2.inspection_id
                                        WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.notes = 'guyed_anchor_compounds'";

                                $query = $conn->query($sql);

                                if ($query && $query->num_rows > 0) {
                                    $data = [];
                                    while ($row = $query->fetch_assoc()) {
                                        $data[] = $row;
                                    }

                                    // echo "<pre>";
                                    // echo "Array[1]\n";
                                    // print_r($data[0]['id']);
                                    // echo "</pre>";
                                } else {
                                    // echo "No draft inspection data found.";
                                }
                            }
                            ?>

                    <!-- Section II: Guyed Anchor Compounds -->
                    <div class="table-responsive">
                        <table class="tables">
                            <thead>
                                <tr class="table-header">
                                    <th class="font-sd" colspan="3" style="font-weight: 500;">II. GUYED ANCHOR COMPOUNDS
                                    </th>
                                </tr>
                                <tr class="table-header">
                                    <th>Inspection Item</th>
                                    <th>Condition</th>
                                    <th>Item Number / Notes</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">A. Guy Anchors</th>
                                </tr>
                                <tr>


                                    <td>Aggregate / Weed Barrier</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Aggregate / Weed Barrier">
                                    <!-- ////////////////////////////////////////// -->

                                     <!-- //////////////////////////////////////////////// -->
                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[0]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[0]['item_number_notes']) ? htmlspecialchars($data[0]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>

                                <tr>


                                    <td>Settlement / Drainage</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Settlement / Drainage">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[1]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[1]['item_number_notes']) ? htmlspecialchars($data[1]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Anchor Rod(s)</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Anchor Rod(s)">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[2]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[2]['item_number_notes']) ? htmlspecialchars($data[2]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Corrosion Control Installation</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Corrosion Control Installation">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[3]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[3]['item_number_notes']) ? htmlspecialchars($data[3]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Grounding</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Grounding">

                                    <td>
                                    <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[3]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_guyed[]" placeholder="Item"></td>
                                </tr>




                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">B. Guy Wires
                                    </th>
                                </tr>
                                <tr>


                                    <td>Finish</td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Finish">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[5]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[5]['item_number_notes']) ? htmlspecialchars($data[5]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>

                                <tr>


                                    <td>Cable Thimbles
                                    </td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Cable Thimbles">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[6]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[6]['item_number_notes']) ? htmlspecialchars($data[6]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Turnbuckles
                                    </td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Turnbuckles">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[7]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[7]['item_number_notes']) ? htmlspecialchars($data[7]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Cable Connectors
                                    </td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Cable Connectors">
                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[8]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[8]['item_number_notes']) ? htmlspecialchars($data[8]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>


                                <tr>


                                    <td>Shackles, bolts, pins, cotter pins
                                    </td>
                                    <input type="hidden" name="inspection_item_guyed[]" value="Shackles, bolts, pins, cotter pins">

                                    <td>
                                        <select class="form-select" name="item_condition_guyed[]">
                                        <option value="" disabled <?= empty($data[9]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                            value="<?= isset($data[9]['item_number_notes']) ? htmlspecialchars($data[9]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                    </td>
                                </tr>

                                <tr>


                                                <td>Guy wire safeties
                                                </td>
                                                <input type="hidden" name="inspection_item_guyed[]" value="Guy wire safeties">

                                                <td>
                                                <select class="form-select" name="item_condition_guyed[]">
                                                <option value="" disabled <?= empty($data[10]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="item_number_notes_guyed[]"
                                                    value="<?= isset($data[10]['item_number_notes']) ? htmlspecialchars($data[10]['item_number_notes']) : '' ?>"
                                                    placeholder="Item">
                                            </td>
                                                </tr>



                            </tbody>
                        </table>
                    </div>

                    <?php
                            if ($uId) {
                                $sql = "SELECT * FROM tower_inspection t1
                                        LEFT JOIN site_condition_checklist t2
                                        ON t1.id = t2.inspection_id
                                        WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.notes = 'structure_conditions'";

                                $query = $conn->query($sql);

                                if ($query && $query->num_rows > 0) {
                                    $data = [];
                                    while ($row = $query->fetch_assoc()) {
                                        $data[] = $row;
                                    }

                                    // echo "<pre>";
                                    // echo "Array[1]\n";
                                    // print_r($data[0]['id']);
                                    // echo "</pre>";
                                } else {
                                    // echo "No draft inspection data found.";
                                }
                            }
                            ?>
                    <!-- Section III: Structure Conditions -->
                    <div class="table-responsive">
                        <table class="tables">
                            <thead>
                                <tr class="table-header">
                                    <th class="font-sd" colspan="3">III. STRUCTURE CONDITIONS</th>
                                </tr>
                                <tr class="table-header">
                                    <th>Inspection Item</th>
                                    <th>Condition</th>
                                    <th>Item Number / Notes</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">A. Tower Base Foundation</th>
                                </tr>
                                <tr>


                                    <td>Base Condition</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Base Condition">
                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[0]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[0]['item_condition']) && $data[0]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[0]['item_number_notes']) ? htmlspecialchars($data[0]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Grouting Condition</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Grouting Condition">


                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[1]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[1]['item_condition']) && $data[1]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[1]['item_number_notes']) ? htmlspecialchars($data[1]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Concrete Condition</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Concrete Condition">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[2]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[2]['item_condition']) && $data[2]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[2]['item_number_notes']) ? htmlspecialchars($data[2]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Anchor Bolts</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Anchor Bolts">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[3]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[3]['item_condition']) && $data[3]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[3]['item_number_notes']) ? htmlspecialchars($data[3]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Leveling Nuts</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Leveling Nuts">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[4]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[4]['item_condition']) && $data[4]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[4]['item_number_notes']) ? htmlspecialchars($data[4]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>



                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">B. Grounding
                                    </th>
                                </tr>
                                <tr>


                                    <td>Connections</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Connections">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[5]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[5]['item_condition']) && $data[5]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[5]['item_number_notes']) ? htmlspecialchars($data[5]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Ground Lead(s) Condition</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Ground Lead(s) Condition">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[6]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[6]['item_condition']) && $data[6]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[6]['item_number_notes']) ? htmlspecialchars($data[6]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Lightning Rod</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Lightning Rod">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[7]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[7]['item_condition']) && $data[7]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[7]['item_number_notes']) ? htmlspecialchars($data[7]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>




                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">C. Members

                                    </th>
                                </tr>
                                <tr>


                                    <td>Bent, Loose, Missing, Etc</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Bent, Loose, Missing, Etc">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[8]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[8]['item_condition']) && $data[8]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[8]['item_number_notes']) ? htmlspecialchars($data[8]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Loose and/or missing bolts</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Loose and/or missing bolts">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[9]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[9]['item_condition']) && $data[9]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[9]['item_number_notes']) ? htmlspecialchars($data[9]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Tower Legs</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Tower Legs">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[10]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[10]['item_condition']) && $data[10]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[10]['item_number_notes']) ? htmlspecialchars($data[10]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>




                                <tr>
                                    <th colspan="3" class="ed" style="text-align: left;">D. Finish

                                    </th>
                                </tr>
                                <tr>


                                    <td>Paint and/or galvanizing condition</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Paint and/or galvanizing condition">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[11]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[11]['item_condition']) && $data[11]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[11]['item_condition']) && $data[11]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[11]['item_condition']) && $data[11]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[11]['item_number_notes']) ? htmlspecialchars($data[11]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Rust and/or corrosion conditions</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Rust and/or corrosion conditions">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[12]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[12]['item_condition']) && $data[12]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[12]['item_condition']) && $data[12]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[12]['item_condition']) && $data[12]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[12]['item_number_notes']) ? htmlspecialchars($data[12]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>


                                <tr>


                                    <td>Water collection in members</td>
                                    <input type="hidden" name="inspection_item_Structure[]" value="Water collection in members">

                                    <td>
                                        <select class="form-select" name="item_condition_Structure[]">
                                        <option value="" disabled <?= empty($data[13]['item_condition']) ? 'selected' : '' ?>>Select Condition</option>
                                            <option value="Pass" <?= (isset($data[13]['item_condition']) && $data[13]['item_condition'] == 'Pass') ? 'selected' : '' ?>>Pass</option>
                                            <option value="Fail" <?= (isset($data[13]['item_condition']) && $data[13]['item_condition'] == 'Fail') ? 'selected' : '' ?>>Fail</option>
                                            <option value="N/A" <?= (isset($data[13]['item_condition']) && $data[13]['item_condition'] == 'N/A') ? 'selected' : '' ?>>N/A</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="item_number_notes_Structure[]"
                                            value="<?= isset($data[13]['item_number_notes']) ? htmlspecialchars($data[13]['item_number_notes']) : '' ?>"
                                            placeholder="Item">
                                        </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
            LEFT JOIN coaxial_layout t2
            ON t1.id = t2.inspection_id
            WHERE t1.form_type = 'draft' AND t1.user_id = $uId";

    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc(); // just fetch one row
        // echo "<pre>";
        // print_r($row['image']); // this will work now
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}


?>
    <section class="section-6">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading mb-5 text-center">Coaxial Layout</h2>


                    <div class="form-group mb-3 col-sm-12 position-relative">
                        <label for="tower_height" class="form-label"><i class="bi bi-image"></i> Upload Image</label>
                        <div class="col-ting">
                            <div class="control-group file-upload" id="file-upload1">
                                <div class="image-box text-center">
                                    <p><i class="bi bi-cloud-arrow-up"></i> Upload image </p>
                                    <img src="" alt="">

                                </div>
                                <div class="controls" style="display: none;">
                                    <input type="file" name="coaxial_image" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php if (!empty($row['image']) && file_exists($row['image'])): ?>
                                    <img src="<?php echo $base_url . $row['image']; ?>" alt="Uploaded Image" style="max-height: 150px;">
                                <?php endif; ?>


                </div>
            </div>
        </div>
    </section>
    <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
            LEFT JOIN anchor_guard_system t2
            ON t1.id = t2.inspection_id
            WHERE t1.form_type = 'draft' AND t1.user_id = $uId";

    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc(); // just fetch one row
        // echo "<pre>";
        // print_r($row); // this will work now
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
// die;

?>
    <section class="section-8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="heading mb-5 text-center">Anchor Guard System </h2>

                        <!-- Test Date and Test Performed By -->
                        <div class="row mb-3">
                            <div class="form-group mb-3 col-sm-2 position-relative">
                                <label for="inspection_date" class="form-label"><i class="bi bi-calendar-date"></i> Test
                                    Date:</label>
                                    <input type="date" class="form-control tbs-input border" name="test_date" min="2025-03-06"
                                    value="<?php echo isset($row['test_date']) ? $row['test_date'] : ''; ?>" required>
                            </div>

                            <div class="form-group mb-3 col-sm-2 position-relative">
                                <label for="inspection_date" class="form-label"><i class="bi bi-person"></i> Test
                                    Performed By</label>
                                    <input type="text" class="form-control tbs-input border" name="test_performed"
                                    value="<?php echo isset($row['test_performed_by']) ? $row['test_performed_by'] : ''; ?>">
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group position-relative mb-4">
                                    <label class="form-label">Anode Condition</label>
                                    <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="anodeCondition" id="anodeAcceptable" value="Acceptable"
                                        <?php echo (isset($row['anode_condition']) && $row['anode_condition'] == 'Acceptable') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="anodeAcceptable">Acceptable</label>


                                        <input class="form-check-input" type="radio" name="anodeCondition" id="anodeNeedsReplacement" value="Needs Replacement"
                                            <?php echo (isset($row['anode_condition']) && $row['anode_condition'] == 'Needs Replacement') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="anodeNeedsReplacement">Needs Replacement</label>


                                    </div>


                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group position-relative mb-2">
                                    <label class="form-label">Protective Coating Integrity</label>
                                    <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="coatingIntegrity" id="coatingSatisfactory" value="Satisfactory"
                                        <?php echo (isset($row['protective_coating_integrity']) && $row['protective_coating_integrity'] == 'Satisfactory') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="coatingSatisfactory">Satisfactory</label>


                                    <input class="form-check-input" type="radio" name="coatingIntegrity" id="coatingDeteriorated" value="Deteriorated"
                                        <?php echo (isset($row['protective_coating_integrity']) && $row['protective_coating_integrity'] == 'Deteriorated') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="coatingDeteriorated">Deteriorated</label>
                                    </div>

                                </div>
                            </div>



                        </div>


                        <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
            LEFT JOIN dc_voltage_reading t2
            ON t1.id = t2.inspection_id
            WHERE t1.form_type = 'draft' AND t1.user_id = $uId";

    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc(); // just fetch one row
        // echo "<pre>";
        // print_r($row); // this will work now
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
// die;

?>
                        <!-- DC Voltage Readings -->
                        <h5 class="mb-3">DC Voltage Readings (V) on test points C TO G</h5>

                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Anchor</th>
                                    <th>Measurement (V)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>Anchor 1</td>
                                    <input type="hidden" name="anchor_one" value="Anchor 1">
                                    <td><input type="text" class="form-control" name="measurementAnchor1"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor1'] ?? '') ?>"></td>
                                </tr>
                                <tr>
                                    <td>Anchor 2</td>
                                    <input type="hidden" name="anchor_two" value="Anchor 2">

                                    <td><input type="text" class="form-control" name="measurementAnchor2"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor2'] ?? '') ?>"></td>
                                </tr>
                                <tr>
                                    <td>Anchor 3</td>
                                    <input type="hidden" name="anchor_three" value="Anchor 3">

                                    <td><input type="text" class="form-control" name="measurementAnchor3"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor3'] ?? '') ?>"></td>
                                </tr>
                                <tr>
                                    <td>Anchor 4</td>
                                    <input type="hidden" name="anchor_four" value="Anchor 4">

                                    <td><input type="text" class="form-control" name="measurementAnchor4"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor4'] ?? '') ?>"></td>
                                </tr>
                                <tr>
                                    <td>Anchor 5</td>
                                    <input type="hidden" name="anchor_five" value="Anchor 5">

                                    <td><input type="text" class="form-control" name="measurementAnchor5"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor5'] ?? '') ?>"></td>
                                </tr>
                                <tr>
                                    <td>Anchor 6</td>
                                    <input type="hidden" name="anchor_six" value="Anchor 6">

                                    <td><input type="text" class="form-control" name="measurementAnchor6"
                                            placeholder="Enter measurement" value="<?= htmlspecialchars($row['measurementAnchor6'] ?? '') ?>"></td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Observations -->
                        <div class="row mb-3">
                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="observations" class="form-label"><i class="bi bi-eye"></i>
                                        Observations</label>
                                        <textarea class="form-control" id="observations" name="observations" rows="3"
                                        placeholder="Enter observations"><?= htmlspecialchars($row['observation'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="systemPerformance" class="form-label"><i class="bi bi-gear"></i> Notes
                                        on system performance</label>
                                        <textarea class="form-control" id="systemPerformance" name="systemPerformance" rows="3"
                                        placeholder="Enter notes"><?= htmlspecialchars($row['notes_of_system_performance'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="degradationSigns" class="form-label"><i
                                            class="bi bi-exclamation-triangle"></i> Signs of degradation or
                                        failure</label>
                                        <textarea class="form-control" id="degradationSigns" name="degradationSigns" rows="3"
                                        placeholder="Enter signs observed"><?= htmlspecialchars($row['sign_of_degradation'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="conclusions" class="form-label"><i class="bi bi-check-circle"></i>
                                        Conclusions and Recommendations</label>
                                        <textarea class="form-control" id="conclusions" name="conclusions" rows="3"
                                        placeholder="Enter conclusions and recommendations"><?= htmlspecialchars($row['conclusions_and_recommendation'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="summary" class="form-label"><i class="bi bi-list-check"></i> Summary of
                                        findings</label>
                                        <textarea class="form-control" id="summary" name="summary" rows="3"
                                        placeholder="Enter summary"><?= htmlspecialchars($row['summary_of_findings'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <div class="form-group position-relative">
                                    <label for="correctiveActions" class="form-label"><i class="bi bi-tools"></i>
                                        Corrective actions required</label>
                                        <textarea class="form-control" id="correctiveActions" name="correctiveActions" rows="3"
                                        placeholder="Enter corrective actions"><?= htmlspecialchars($row['corrective_action_required'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>



                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
if ($uId) {
    $sql = "SELECT * FROM tower_inspection t1
            LEFT JOIN tension_plumb_and_twist t2
            ON t1.id = t2.inspection_id
            WHERE t1.form_type = 'draft' AND t1.user_id = $uId";

    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc(); // just fetch one row
        // echo "<pre>";
        // print_r($row); // this will work now
        // echo "</pre>";
    } else {
        // echo "No draft inspection data found.";
    }
}
// die;

?>
    <section class="section-9">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="bg-w">
                        <!-- Tension, Plumb and Twist Report -->
                        <h2 class="heading mb-5 text-center">Tension, Plumb and Twist Report</h2>


                        <div class="row mb-4">

                        <div class="mb-3 col-md-4">
                            <label for="siteName" class="form-label"><i class="bi bi-building"></i> Site
                                Name</label>
                            <input type="text" class="form-control" id="siteName" name="site_name" placeholder="Enter site name" value="<?= htmlspecialchars($row['site_name'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="siteId" class="form-label"><i class="bi bi-hash"></i> Site ID</label>
                            <input type="text" class="form-control" id="siteId" name="site_id" placeholder="Enter site ID" value="<?= htmlspecialchars($row['site_id'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="customer" class="form-label"><i class="bi bi-person"></i>
                                Customer</label>
                            <input type="text" class="form-control" name="customer" id="customer"
                                placeholder="Enter customer name" value="<?= htmlspecialchars($row['customer'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="siteAddress" class="form-label"><i class="bi bi-geo-alt"></i> Site
                                Address</label>
                            <input type="text" class="form-control" id="siteAddress" name="site_address"
                                placeholder="Enter site address" value="<?= htmlspecialchars($row['site_address'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="dateCompleted" class="form-label"><i class="bi bi-calendar-date"></i>
                                Date Completed</label>
                            <input type="date" class="form-control" id="dateCompleted" name="date_completed" style="height: 47px;" value="<?= htmlspecialchars($row['date_completed'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="temperature" class="form-label"><i class="bi bi-thermometer-half"></i>
                                Temperature</label>
                            <input type="text" class="form-control" id="temperature" name="temperature"
                                placeholder="Enter temperature" value="<?= htmlspecialchars($row['temperature'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="windSpeed" class="form-label"><i class="bi bi-wind"></i> Wind
                                Speed</label>
                            <input type="text" class="form-control" id="windSpeed" name="wind_speed"
                                placeholder="Enter wind speed" value="<?= htmlspecialchars($row['wind_speed'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="windDirection" class="form-label"><i class="bi bi-compass"></i> Wind
                                Direction</label>
                            <input type="text" class="form-control" id="windDirection" name="wind_direction"
                                placeholder="Enter wind direction" value="<?= htmlspecialchars($row['wind_direction'] ?? '') ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="completedBy" class="form-label"><i class="bi bi-person-check"></i>
                                Completed By</label>
                            <input type="text" class="form-control" id="completedBy" name="completed_by" placeholder="Enter name" value="<?= htmlspecialchars($row['completed_by'] ?? '') ?>">
                        </div>
                        </div>

                            <!-- <button style="width: 100%;" type="submit" class="btn btn-site" id="submit_button">Submit</button>
                             </form> -->

                            <!-- Anchor A Table -->
                            <h3 class="mt-4">Anchor A</h3>
                            <div class="table-responsive mb-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>GUY LEVEL</th>
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
                                    <?php
                                    if ($uId) {
                                        $sql = "SELECT * FROM tower_inspection t1
                                                LEFT JOIN tbl_anchor_last t2
                                                ON t1.id = t2.inspection_id
                                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.note = 'anchor_A'";

                                        $query = $conn->query($sql);

                                        if ($query && $query->num_rows > 0) {
                                            $data = [];
                                            while ($row = $query->fetch_assoc()) {
                                                $data[] = $row;
                                            }

                                            // echo "<pre>";
                                            // echo "Array[1]\n";
                                            // print_r($data[0]);
                                            // echo "</pre>";
                                        } else {
                                            // echo "No draft inspection data found.";
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <!-- 10 rows for Anchor A -->
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[0]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[0]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[0]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[0]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[0]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[0]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[0]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[0]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[1]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[1]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[1]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[1]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[1]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[1]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[1]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[1]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[2]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[2]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[2]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[2]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[2]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[2]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[2]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[2]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                        <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[3]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[3]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[3]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[3]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[3]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[3]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[3]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[0]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[4]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[4]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[4]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[4]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[4]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[4]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[4]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[4]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[5]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[5]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[5]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[5]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[5]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[5]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[5]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[5]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[6]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[6]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[6]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[6]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[6]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[6]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[6]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[6]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="guy_elev[]" placeholder="Elevation" value="<?= htmlspecialchars($data[7]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size[]"  placeholder="Size" value="<?= htmlspecialchars($data[7]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance[]"  placeholder="Distance" value="<?= htmlspecialchars($data[7]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension[]"  placeholder="Initial" value="<?= htmlspecialchars($data[7]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension[]"  placeholder="Desired" value="<?= htmlspecialchars($data[7]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension[]"  placeholder="Measured" value="<?= htmlspecialchars($data[7]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star[]"  placeholder="L/R" value="<?= htmlspecialchars($data[7]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[7]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>


                            <!-- Anchor B Table -->
                            <h3 class="mt-4">Anchor B</h3>
                            <div class="table-responsive mb-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>GUY LEVEL</th>
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
                                    <?php
                                    if ($uId) {
                                        $sql = "SELECT * FROM tower_inspection t1
                                                LEFT JOIN tbl_anchor_last t2
                                                ON t1.id = t2.inspection_id
                                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.note = 'anchor_B'";

                                        $query = $conn->query($sql);

                                        if ($query && $query->num_rows > 0) {
                                            $data = [];
                                            while ($row = $query->fetch_assoc()) {
                                                $data[] = $row;
                                            }

                                            // echo "<pre>";
                                            // echo "Array[1]\n";
                                            // print_r($data[0]);
                                            // echo "</pre>";
                                        } else {
                                            // echo "No draft inspection data found.";
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <!-- 10 rows for Anchor B -->
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[0]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[0]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[0]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[0]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[0]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[0]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[0]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[0]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[1]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[1]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[1]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[1]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[1]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[1]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[1]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[1]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[2]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[2]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[2]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[2]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[2]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[2]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[2]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[2]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[3]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[3]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[3]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[3]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[3]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[3]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[3]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[3]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[4]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[4]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[4]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[4]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[4]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[4]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[4]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[4]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[5]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[5]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[5]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[5]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[5]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[5]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[5]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[5]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[6]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[6]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[6]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[6]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[6]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[6]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[6]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[6]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorb[]" placeholder="Elevation" value="<?= htmlspecialchars($data[7]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorb[]"  placeholder="Size" value="<?= htmlspecialchars($data[7]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorb[]"  placeholder="Distance" value="<?= htmlspecialchars($data[7]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorb[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorb[]"  placeholder="Initial" value="<?= htmlspecialchars($data[7]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorb[]"  placeholder="Desired" value="<?= htmlspecialchars($data[7]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorb[]"  placeholder="Measured" value="<?= htmlspecialchars($data[7]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorb[]"  placeholder="L/R" value="<?= htmlspecialchars($data[7]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[7]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Repeat up to GUY LEVEL 10 -->
                                        <!-- For brevity, only 2 rows are shown; add 8 more rows similarly -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Anchor C Table -->
                            <h3 class="mt-4">Anchor C</h3>
                            <div class="table-responsive mb-2">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>GUY LEVEL</th>
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
                                    <?php
                                    if ($uId) {
                                        $sql = "SELECT * FROM tower_inspection t1
                                                LEFT JOIN tbl_anchor_last t2
                                                ON t1.id = t2.inspection_id
                                                WHERE t1.form_type = 'draft' AND t1.user_id = $uId AND t2.note = 'anchor_C'";

                                        $query = $conn->query($sql);

                                        if ($query && $query->num_rows > 0) {
                                            $data = [];
                                            while ($row = $query->fetch_assoc()) {
                                                $data[] = $row;
                                            }

                                            // echo "<pre>";
                                            // echo "Array[1]\n";
                                            // print_r($data[0]);
                                            // echo "</pre>";
                                        } else {
                                            // echo "No draft inspection data found.";
                                        }
                                    }
                                    ?>
                                    <tbody>
                                        <!-- 8 rows for Anchor C -->
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[0]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[0]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[0]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[0]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[0]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[0]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[0]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[0]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[1]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[1]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[1]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[1]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[1]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[1]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[1]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[1]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[2]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[2]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[2]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[2]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[2]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[2]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[2]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[2]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[3]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[3]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[3]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[3]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[3]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[3]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[3]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[3]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[4]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[4]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[4]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[4]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[4]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[4]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[4]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[4]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[5]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[5]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[5]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[5]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[5]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[5]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[5]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[5]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[6]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[6]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[6]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[6]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[6]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[6]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[6]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[6]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="guy_elev_anchorc[]" placeholder="Elevation" value="<?= htmlspecialchars($data[7]['guy_elev'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="wire_size_anchorc[]"  placeholder="Size" value="<?= htmlspecialchars($data[7]['wire_size'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="anchor_distance_anchorc[]"  placeholder="Distance" value="<?= htmlspecialchars($data[7]['anchor_distance'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="type_strand_anchorc[]"  value="EHS" disabled></td>
                                            <td><input type="text" class="form-control" name="initial_tension_anchorc[]"  placeholder="Initial" value="<?= htmlspecialchars($data[7]['initial_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="desired_tension_anchorc[]"  placeholder="Desired" value="<?= htmlspecialchars($data[7]['desired_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="measured_tension_anchorc[]"  placeholder="Measured" value="<?= htmlspecialchars($data[7]['measured_tension'] ?? '') ?>"></td>
                                            <td><input type="text" class="form-control" name="guy_star_anchorc[]"  placeholder="L/R" value="<?= htmlspecialchars($data[7]['guy_star'] ?? '') ?>"></td>
                                            <?php $selectedResult = $data[7]['result'] ?? ''; ?>

                                            <td>
                                                <select class="form-select" name="result[]">
                                                    <option value="" disabled <?= $selectedResult == '' ? 'selected' : '' ?>>Select Condition</option>
                                                    <option value="Pass" <?= strtolower($selectedResult) == 'pass' ? 'selected' : '' ?>>Pass</option>
                                                    <option value="Fail" <?= strtolower($selectedResult) == 'fail' ? 'selected' : '' ?>>Fail</option>
                                                    <option value="N/A" <?= strtolower($selectedResult) == 'n/a' ? 'selected' : '' ?>>N/A</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Repeat up to GUY LEVEL 8 -->
                                        <!-- For brevity, only 2 rows are shown; add 6 more rows similarly -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- <button style="width: 100%;" type="submit" class="btn btn-site" id="submit_button">Submit</button>
                            </form> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <button style="width: 100%;" type="submit" class="btn btn-site" id="submit_button">Submit</button>

                </div>

            </div>
        </div>
                            <!-- </form> -->
    </section>


    </form>

    <footer class="py-5 position-relative" style="background-color: #000!important;overflow: hidden;">
        <img src="img/footer-dot.png" style="position: absolute;bottom: 0;left: 0;">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <a href="#"><img src="img/viking1.png" style="width: 150px;"></a>
                    <!-- <ul class="list-unstyled mt-4" style="font-family: 'Raleway';font-size: 14px;">
                        <li class="mb-2 text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                    </ul> -->
                </div>



            </div>
        </div>
    </footer>

    <!-- Popper and Bootstrap JS -->
    <!--important for bootstrap 4 slider-->
<!-- Show modal if not logged in -->
<?php if (!$is_logged_in): ?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var myModal = new bootstrap.Modal(document.getElementById('authModal'));
    myModal.show();
  });
</script>
<?php endif; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/formsubmit.js?var=123454"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
let autosaveTimer;

$(document).on('change input', '#savealldata input, #savealldata select, #savealldata textarea', function() {
    console.log("Changed:", $(this).attr('name'));
    clearTimeout(autosaveTimer);
    autosaveTimer = setTimeout(function () {
        autosaveInspection();
    }, 1000);
});

function autosaveInspection() {
    let formData = new FormData($('#savealldata')[0]);

    $.ajax({
        url: 'autosave.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log("Auto-saved at " + new Date().toLocaleTimeString());
        },
        error: function(xhr) {
            console.log("Auto-save failed");
        }
    });
}
</script>

    <script>

$(document).ready(function () {
    $("#savealldata").validate({
        rules: {
            inspection_date: { required: true },
            inspector_name: { required: true },
            inspection_company: { required: true },
            client_name: { required: true },
            tower_owner: { required: true },
            tower_location: { required: true },
            tower_id_name: { required: true },
            tower_type: { required: true },
            tower_height: { required: true, number: true, min: 1 },
            year_of_construction: { required: true, digits: true},
            // tower_photo: { required: true },
            // "maintenance_critical_observation[]": { required: true },
            // "maintenance_critical_recommendation[]": { required: true },
            // "maintenance_critical_image[]": { required: true },

            // "maintenance_non_critical_observation[]": { required: true },
            // "maintenance_non_critical_recommendation[]": { required: true },
            // "maintenance_non_critical_image[]": { required: true },

            // "structural_critical_observation[]": { required: true },
            // "structural_critical_recommendation[]": { required: true },
            // "structural_critical_image[]": { required: true },

            // "structural_non_critical_observation[]": { required: true },
            // "structural_non_critical_recommendation[]": { required: true },
            // "structural_non_critical_image[]": { required: true }




        },
        messages: {
            inspection_date: "Please select an inspection date.",
            inspector_name: "Inspector name is required.",
            inspection_company: "Inspection company is required.",
            client_name: "Client name is required.",
            tower_owner: "Tower owner is required.",
            tower_location: "Tower location is required.",
            tower_id_name: "Tower ID/Name is required.",
            tower_type: "Please select a tower type.",
            tower_height: {
                required: "Tower height is required.",
                number: "Please enter a valid height.",
                min: "Height must be greater than 0."
            },
            year_of_construction: {
                required: "Year of construction is required.",
                digits: "Please enter a valid 4-digit year.",
            },
            // "maintenance_critical_observation[]": "Please enter maintenance critical observation.",
            // "maintenance_critical_recommendation[]": "Please enter maintenance critical recommendation.",
            // "maintenance_critical_image[]": "Please select an image.",

            // "maintenance_non_critical_observation[]": "Please enter maintenance non-critical observation.",
            // "maintenance_non_critical_recommendation[]": "Please enter maintenance non-critical recommendation.",
            // "maintenance_non_critical_image[]": "Please select an image.",

            // "structural_critical_observation[]": "Please enter structural critical observation.",
            // "structural_critical_recommendation[]": "Please enter structural critical recommendation.",
            // "structural_critical_image[]": "Please select an image.",

            // "structural_non_critical_observation[]": "Please enter structural non-critical observation.",
            // "structural_non_critical_recommendation[]": "Please enter structural non-critical recommendation.",
            // "structural_non_critical_image[]": "Please select an image."

        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            element.css("border", "2px solid red");
        },
        success: function (label, element) {
            $(element).css("border", "");
        },
        submitHandler: function (form) {
            let formData = new FormData(form);

            $.ajax({
                    url: "save_inspection.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        // console.log(response.status);
                        // return
                        try {
                            // let result = JSON.parse(response);
                            // var result = JSON.parse(response);

                            if (result.status === "success") {
                                Swal.fire({
                                    title: "Success!",
                                    text: result.message,
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    $("#savealldata")[0].reset();
                                    $(".required").css("border", "");
                                    // Redirect with base64 encoded ID
                                    window.location.href = result.redirect;
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: result.message,
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            }
                        } catch (e) {
                            console.log("Error parsing response:", e);
                        }
                    }

                    // error: function (xhr, status, error) {
                    //     console.log("AJAX Error:", xhr.responseText);
                    // },
                });
        },
    });
});









</script>

    <!--header-top-fixed start-->
    <script>
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 50) {
                $('.navbar-fixed').addClass('navbar-fixed-top shadow-sm');
            } else {
                $('.navbar-fixed').removeClass('navbar-fixed-top shadow-sm');
            }

        });
    </script>
    <!--header-top-fixed End-->



    <script>
        // header-top-fixed Start

        $(window).scroll(function () {
            if ($(window).scrollTop() >= 54) {
                $(".navbar-light").addClass("shadow");
            } else {
                $(".navbar-light").removeClass("shadow");
            }
        });

        // header-top-fixed End
    </script>
    <script>
        $(window).on("load", function () {
            $("#status").delay(1000).fadeOut("slow");
            $("#preloader").delay(1000).fadeOut("slow");
            $("body").delay(1000).css({
                overflow: "visible",
            });
        });
    </script>
    <script src="js/jquery.validate.js"></script>


    <script>
        $(".image-box").click(function (event) {
            var previewImg = $(this).children("img");

            $(this)
                .siblings()
                .children("input")
                .trigger("click");

            $(this)
                .siblings()
                .children("input")
                .change(function () {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var urll = e.target.result;
                        $(previewImg).attr("src", urll);
                        previewImg.parent().css("background", "transparent");
                        previewImg.show();
                        previewImg.siblings("p").hide();
                    };
                    reader.readAsDataURL(this.files[0]);
                });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let dateInput = document.getElementById("date_of_event");

            let today = new Date();
            today.setDate(today.getDate() + 1);

            // let minDate = today.toISOString().split("T")[0];

            // dateInput.setAttribute("min", minDate);
        });
    </script>

    <script>
        function addRow() {
            let table = document.getElementById("deficiencyTable");
            let newRow = table.insertRow(-1);

            for (let i = 0; i < 4; i++) {
                let cell = newRow.insertCell(i);
                let input = document.createElement("input");
                input.type = "text";
                input.className = "form-control";
                cell.appendChild(input);
            }

            let categoryCell = newRow.insertCell(4);
            let select = document.createElement("select");
            select.className = "form-select";
            select.innerHTML = `
            <option>Select Category</option>
            <option value="1">Maintenance issues (Critical)</option>
            <option value="2">Maintenance issues (Non-Critical)</option>
            <option value="3">Structural issues (Critical)</option>
            <option value="4">Structural issues (Non Critical)</option>
        `;
            categoryCell.appendChild(select);

            let fileCell = newRow.insertCell(5);
            let fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.className = "form-control";
            fileCell.appendChild(fileInput);

            let removeCell = newRow.insertCell(6);
            let removeButton = document.createElement("button");
            removeButton.innerHTML = '<i class="bi bi-trash"></i>';
            removeButton.className = "remove-row";
            removeButton.onclick = function () { table.deleteRow(newRow.rowIndex); };
            removeCell.appendChild(removeButton);
        }



        var body = document.querySelector('body');
        var mode = document.querySelector('.mode');

        mode.addEventListener('click', function () {
            body.classList.toggle('dark');
            mode.classList.toggle('off');
            mode.classList.add('scaling');
            setTimeout(function () {
                mode.classList.remove('scaling');
            }, 520);
        });


        $('.toggles').click(function (e) {
            $(this).parent().find('div.tabs').slideToggle('slow');
            //$('.tabs').toggle('slow');
        });
    </script>


</body>

</html>