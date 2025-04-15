<?php

session_start();
include('connect.php');
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$company = $_SESSION['company'];


$sql = "SELECT * FROM tower_inspection WHERE user_id = $user_id AND form_type = 'public'";

$result = $conn->query($sql);
?>

<?php
$is_logged_in = isset($_SESSION['user_id']); // Check if user is logged in
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
    <link href="css/style.css?var-9222" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
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
            <div class="mb-3"><input type="text" name="name" class="form-control col-sm-12" placeholder="Full Name" required></div>
            <div class="mb-3"><input type="email" name="email" class="form-control col-sm-12" placeholder="Email" required></div>
            <div class="mb-3"><input type="text" name="company" class="form-control col-sm-12" placeholder="Company (optional)"></div>
            <div class="mb-3"><input type="password" name="password" class="form-control col-sm-12" placeholder="Password" required></div>
            <div class="mb-3"><button type="submit" class="btn btn-success w-100 col-sm-12">Sign Up</button></div>
                </div>
            </form>
            </div>
            <!-- Login Form -->
            <div class="tab-pane fade show active" id="login">
              <form method="POST" action="login.php">
                <div class="row">
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
                        <p class="">Form Details </p>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section" style="min-height: 300px;padding-bottom:50px">
    <div class="container">
        <a href="/vm_dev"><button class="btn btn-primary" style="margin-top: 10px;">Back</button></a>
        <div class="table-responsive">
    <table border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead class="table-dark">
        <tr style="text-align: center; color : black !Important;">
        <th scope="col">S.no</th>
        <th scope="col">Created date</th>
            <th scope="col">inspector_name</th>
            <th scope="col">inspection_date</th>
            <th scope="col">inspection_company</th>
            <th scope="col">client_name</th>
            <th scope="col">Action</th>

        </tr>
    </thead>

        <?php
        if ($result->num_rows > 0) {
           $i = 1;
            while($rows = $result->fetch_assoc()) {
                ?>
                <tr>
                <th scope="col"><?php echo $i; ?></th>
                <th scope="col"><?php echo date('d-F-Y', strtotime($rows['created_at'])); ?></th>
                <th scope="col"><?php echo $rows['inspector_name']; ?></th>
                <th scope="col"><?php echo $rows['inspection_date']; ?></th>
                <th scope="col"><?php echo $rows['inspection_company']; ?></th>
                <th scope="col"><?php echo $rows['client_name']; ?></th>
                <th scope="col">
                <?php
                    $encoded_id = base64_encode($rows['id']);
                    ?>
                    <a href="print/print.php?id=<?php echo $encoded_id; ?>" target="_blank">
                        <button class="btn btn-primary">View</button>
                    </a>


                </th>
                </tr>
                <?php
                $i++;
            }
        } else {
            echo "<tr><td colspan='5' style='text-align: center;'>No Submitted forms found.</td></tr>";
        }
        ?>

    </table>
        </div>
    </div>
    </div>

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
$(document).ready(function () {
    $('#savealldata input, #savealldata select').on('change blur', function () {
        let fieldName = $(this).attr('name');
        let fieldValue = $(this).val();
        let formData = new FormData();

        formData.append('field_name', fieldName);
        formData.append('field_value', fieldValue);
        formData.append('user_id', <?php echo $_SESSION['user_id']; ?>);

        if ($(this).attr('type') === 'file') {
            formData.append('file_upload', this.files[0]);
        }

        $.ajax({
            url: 'autosave.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log("Auto-saved: " + fieldName);
            },
            error: function () {
                console.log("Auto-save failed for " + fieldName);
            }
        });
    });
});
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
            tower_photo: { required: true },
            "maintenance_critical_observation[]": { required: true },
            "maintenance_critical_recommendation[]": { required: true },
            "maintenance_critical_image[]": { required: true },

            "maintenance_non_critical_observation[]": { required: true },
            "maintenance_non_critical_recommendation[]": { required: true },
            "maintenance_non_critical_image[]": { required: true },

            "structural_critical_observation[]": { required: true },
            "structural_critical_recommendation[]": { required: true },
            "structural_critical_image[]": { required: true },

            "structural_non_critical_observation[]": { required: true },
            "structural_non_critical_recommendation[]": { required: true },
            "structural_non_critical_image[]": { required: true }




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
            "maintenance_critical_observation[]": "Please enter maintenance critical observation.",
            "maintenance_critical_recommendation[]": "Please enter maintenance critical recommendation.",
            "maintenance_critical_image[]": "Please select an image.",

            "maintenance_non_critical_observation[]": "Please enter maintenance non-critical observation.",
            "maintenance_non_critical_recommendation[]": "Please enter maintenance non-critical recommendation.",
            "maintenance_non_critical_image[]": "Please select an image.",

            "structural_critical_observation[]": "Please enter structural critical observation.",
            "structural_critical_recommendation[]": "Please enter structural critical recommendation.",
            "structural_critical_image[]": "Please select an image.",

            "structural_non_critical_observation[]": "Please enter structural non-critical observation.",
            "structural_non_critical_recommendation[]": "Please enter structural non-critical recommendation.",
            "structural_non_critical_image[]": "Please select an image."

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
                    success: function (response) {
                        try {
                            let result = JSON.parse(response);

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