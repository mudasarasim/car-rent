<?php
include '../connection.php'; // your DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form inputs
    $name         = $_POST['name'];
    $price     = $_POST['price'];
    $car_type     = $_POST['car_type'];
    $brand        = $_POST['brand'];
    $model        = $_POST['model'];
    $number_plate = $_POST['number_plate'];
    $vin          = $_POST['vin'];
    $fuel         = $_POST['fuel'];
    $odometer     = $_POST['odometer'];
    $color        = $_POST['color'];
    $year         = $_POST['year'];
    $transmission = $_POST['transmission'];
    $mileage      = $_POST['mileage'];
    $passengers   = $_POST['passengers'];
    $seats        = $_POST['seats'];
    $doors        = $_POST['doors'];
    $air_bags     = $_POST['air_bags'];
    $features     = $_POST['features'];
    $ex_services  = $_POST['ex_services'];
    $status       = "available"; // default
    $date         = date("Y-m-d H:i:s");

    // Handle image uploads
    $uploads = [];

    // Make img1 required
    if (isset($_FILES["img1"]) && $_FILES["img1"]['error'] == 0) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["img1"]["name"]);
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($_FILES["img1"]["tmp_name"], $targetFile);
        $uploads[1] = $targetFile;
    } else {
        echo "<script>alert('Car Image 1 is required!'); window.history.back();</script>";
        exit();
    }

    // Other images (optional)
    for ($i = 2; $i <= 6; $i++) {
        if (isset($_FILES["img$i"]) && $_FILES["img$i"]['error'] == 0) {
            $targetDir = "uploads/";
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            $fileName = time() . "_" . basename($_FILES["img$i"]["name"]);
            $targetFile = $targetDir . $fileName;
            move_uploaded_file($_FILES["img$i"]["tmp_name"], $targetFile);
            $uploads[$i] = $targetFile;
        } else {
            $uploads[$i] = null; // optional
        }
    }

    // Insert into DB
    $sql = "INSERT INTO cars 
        (name, img1, img2, img3, img4, img5, img6, car_type, price, brand, model, number_plate, vin, fuel, odometer, color, year, transmission, mileage, passengers, seats, doors, air_bags, features, ex_services, status, date) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssssssssss",
        $name,
        $uploads[1],
        $uploads[2],
        $uploads[3],
        $uploads[4],
        $uploads[5],
        $uploads[6],
        $car_type,
        $price,
        $brand,
        $model,
        $number_plate,
        $vin,
        $fuel,
        $odometer,
        $color,
        $year,
        $transmission,
        $mileage,
        $passengers,
        $seats,
        $doors,
        $air_bags,
        $features,
        $ex_services,
        $status,
        $date
    );

    if ($stmt->execute()) {
        echo "<script>alert('Car added successfully!'); window.location.href='add-car.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Dreamsrent - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Al Marsa - Admin</title>
    <?php include('includes/head.php') ?>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <?php include('includes/header.php') ?>
        <!-- /Header -->

        <!-- Sidebar -->
        <?php include('includes/sidebar.php') ?>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content me-0">
                <div class="mb-3">
                    <a href="cars.html" class="d-inline-flex align-items-center fw-medium"><i
                            class="ti ti-arrow-left me-1"></i>Back to List</a>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="add-wizard car-steps">
                            <ul class="nav d-flex align-items-center flex-wrap gap-3">

                            </ul>
                            <fieldset id="first-field">
                                <form method="post" enctype="multipart/form-data">
                                    <div
                                        class="filterbox p-20 mb-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <h4 class="d-flex align-items-center"><i
                                                class="ti ti-info-circle text-secondary me-2"></i>Basic Info</h4>
                                        <div class="dropdown flag-dropdown">
                                            <a class="dropdown-toggle btn btn-white d-flex align-items-center justify-content-between"
                                                data-bs-toggle="dropdown" href="javascript:void(0);">
                                                <img src="assets/img/flags/gb.svg" alt="Language"
                                                    class="img-fluid me-1">English
                                            </a>
                                            <ul class="dropdown-menu p-2">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-item d-flex align-items-center">
                                                        <img src="assets/img/flags/gb.svg" alt="" height="16"
                                                            class="me-1">English
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        class="dropdown-item d-flex align-items-center">
                                                        <img src="assets/img/flags/sa.svg" alt="" height="16"
                                                            class="me-1">Arabic
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                        </div>
                        <div class="border-bottom mb-2 pb-2">
                            <div class="row row-gap-4">
                                <div class="col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Enter Car Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 1 <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img1" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 2<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img2" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 3<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img3" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 4<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img4" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 5<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img5" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="form-label">Select Car image 6<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="img6" class="form-control">
                                    </div>
                                    
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label class="form-label">Car Type <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <select class="select" name="car_type">
                                                    <option>Select</option>
                                                    <option>Sports Car</option>
                                                    <option>Sedan</option>
                                                    <option>Hatchback</option>
                                                    <option>SUV</option>
                                                    <option>Coupes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label class="form-label">Price Per Day (AED) <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <input type="text" name="price" class="form-control" />
                                            </div>
                                        </div>
                                          <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label class="form-label">Brand <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <input type="text" name="brand" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label class="form-label">Model <span
                                                            class="text-danger">*</span></label>
                                                 </div>
                                               <input type="text" name="model" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Plate Number</label>
                                                <input type="text" name="number_plate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">VIN Number</label>
                                                <input type="text" name="vin" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fuel</label>
                                                <select class="select" name="fuel">
                                                    <option>Select</option>
                                                    <option>Petrol</option>
                                                    <option>Diesel</option>
                                                    <option>Electric</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Odometer</label>
                                                <input type="text" name="odometer" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Color <span
                                                        class="text-danger">*</span></label>
                                               <input type="text" name="color" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Year of Car <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-icon-end position-relative">
                                                    <input type="text" name="year" class="form-control yearpicker">
                                                    <span class="input-icon-addon">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Transmission</label>
                                                <select class="select" name="transmission">
                                                    <option>Select</option>
                                                    <option>Manual</option>
                                                    <option>Automatic</option>
                                                    <option>Semi Automatic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Mileage</label>
                                                <input type="text" name="mileage" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Passengers</label>
                                                <input type="text" name="passengers" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">No of Seats</label>
                                                <select class="select" name="seats">
                                                    <option>Select</option>
                                                    <option>2 Seater</option>
                                                    <option>4 Seater</option>
                                                    <option>5 Seater</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">No of Doors</label>
                                                <select class="select" name="doors">
                                                    <option>Select</option>
                                                    <option>2 Doors</option>
                                                    <option>3 Doors</option>
                                                    <option>4 Doors</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" >No of Air Bags</label>
                                                <input type="text" name="air_bags" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Features -->
<div class="col-lg-4 col-md-6">
    <div class="mb-3">
        <label class="form-label">Features</label>
        <input type="text" id="features" class="form-control" placeholder="Type & press Enter">
        <input type="hidden" name="features" id="features_hidden">
        <div id="features_tags" class="tag-container"></div>
    </div>
</div>

<!-- Extra Services -->
<div class="col-lg-4 col-md-6">
    <div class="mb-3">
        <label class="form-label">Extra Services</label>
        <input type="text" id="ex_services" class="form-control" placeholder="Type & press Enter">
        <input type="hidden" name="ex_services" id="ex_services_hidden">
        <div id="ex_services_tags" class="tag-container"></div>
    </div>
</div>

<!-- Tag Styles -->
<style>
    .tag-container {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-top: 5px;
    }
    .tag {
        background: #007bff;
        color: white;
        padding: 5px 10px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .tag span {
        cursor: pointer;
        font-weight: bold;
    }
</style>

<!-- Tag Script -->
<script>
    function tagInput(inputId, hiddenId, containerId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);
        const container = document.getElementById(containerId);

        let tags = [];

        input.addEventListener("keydown", function (e) {
            if (e.key === "Enter" && input.value.trim() !== "") {
                e.preventDefault(); // ✅ prevent form submission
                let tagText = input.value.trim();
                if (!tags.includes(tagText)) {
                    tags.push(tagText);

                    // Create tag element
                    let tag = document.createElement("div");
                    tag.className = "tag";
                    tag.innerHTML = tagText + " <span>&times;</span>";

                    // Remove tag on click
                    tag.querySelector("span").addEventListener("click", function () {
                        container.removeChild(tag);
                        tags = tags.filter(t => t !== tagText);
                        hidden.value = tags.join(",");
                    });

                    container.appendChild(tag);
                    hidden.value = tags.join(",");
                }
                input.value = "";
            }
        });
    }

    // Apply to both fields
    document.addEventListener("DOMContentLoaded", function () {
        tagInput("features", "features_hidden", "features_tags");
        tagInput("ex_services", "ex_services_hidden", "ex_services_tags");
    });
</script>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end pt-3">
                            <button type="button" class="btn btn-light d-flex align-items-center me-2"><i
                                    class="ti ti-chevron-left me-1"></i>Cancel</button>
                            <button class="btn btn-primary wizard-next d-flex align-items-center" name="submit" type="submit">Submit<i class="ti ti-chevron-right ms-1"></i></button>
                        </div>
                        </form>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white p-3">
            <p class="mb-0">
                <a href="javascript:void(0);">Privacy Policy</a>
                <a href="javascript:void(0);" class="ms-4">Terms of Use</a>
            </p>
           <p>&copy; 2025 Almarsa Car Rental, Made with <span class="text-danger">❤</span> by <a href="javascript:void(0);" class="text-secondary">Xpertone Creative</a></p>
        </div>
        <!-- /Footer-->
    </div>
    <!-- /Page Wrapper -->


    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
        type="a38a8175f6ce33c422d28052-text/javascript"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
        type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Daterangepikcer JS -->
    <script src="assets/js/moment.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"
        type="a38a8175f6ce33c422d28052-text/javascript"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"
        type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/jquery.fancybox.min.js"
        type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js" type="a38a8175f6ce33c422d28052-text/javascript"></script>

    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="a38a8175f6ce33c422d28052-|49" defer></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"971a8ede2b0a4018","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.8.0","token":"3ca157e612a14eccbb30cf6db6691c29"}'
        crossorigin="anonymous"></script>
</body>

</html>