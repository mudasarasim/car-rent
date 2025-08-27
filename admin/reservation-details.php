<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/reservations.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Dreamsrent - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Almarsa - Admin Template</title>

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
	    <div class="page-wrapper" style="min-height: 667px;">
			<div class="content me-4">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<div class="mb-3">
							<a href="reservations.php" class="d-inline-flex align-items-center fw-medium"><i class="ti ti-arrow-narrow-left me-2"></i>Reservation</a>
						</div>
						<?php
include '../connection.php'; // database connection

// Get booking ID
if (!isset($_GET['id'])) {
    die("Booking ID missing.");
}
$booking_id = intval($_GET['id']);

// Fetch booking + car details
$sql = "SELECT b.*, 
               c.name AS car_name, c.img1, c.car_type, c.price, c.brand, c.model, c.number_plate, c.color, c.year, c.transmission, c.passengers, c.seats, c.doors
        FROM bookings b
        JOIN cars c ON b.car_id = c.id
        WHERE b.id = $booking_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Reservation not found.");
}

$row = mysqli_fetch_assoc($result);

// Calculate rental days
$start = new DateTime($row['s_date'] . " " . $row['s_time']);
$end   = new DateTime($row['r_date'] . " " . $row['r_time']);
$days  = $start->diff($end)->days;
if ($days < 1) $days = 1; // at least 1 day

$total_price = $row['price'] * $days;
?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5>Reservation Details</h5>
        <span class="badge bg-orange-transparent">
            <?php echo ucfirst($row['status']); ?>
        </span>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid custom-nav-tabs mb-3" role="tablist">
            <li class="nav-item" role="presentation" style="text-align: center">
                <h2 style="text-align: center"> Booking ID #<?php echo $row['id']; ?> </h2>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="solid-tab1" role="tabpanel">
                <!-- Car Info -->
                <div class="border rounded p-3 bg-light mb-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                <span class="avatar flex-shrink-0 me-2">
                                    <img src="<?php echo $row['img1']; ?>" alt="Car" style="width:60px;height:40px;object-fit:cover;">
                                </span>
                                <div>
                                    <p class="mb-1"><?php echo $row['car_type']; ?></p>
                                    <h6 class="fs-14"><?php echo $row['car_name']." (".$row['brand']." ".$row['model'].")"; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-end">
                                <p class="mb-1">Price</p>
                                <h6 class="fs-14">AED <?php echo $row['price']; ?><span class="text-gray-5 fw-normal">/day</span></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rental Info -->
                <div class="border-bottom mb-3 pb-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium fs-14">Start Date</h6>
                        <p><?php echo date("d M Y, h:i A", strtotime($row['s_date']." ".$row['s_time'])); ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium fs-14">End Date</h6>
                        <p><?php echo date("d M Y, h:i A", strtotime($row['r_date']." ".$row['r_time'])); ?></p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium fs-14">Rental Period</h6>
                        <p><?php echo $days; ?> Day(s)</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium fs-14">Driving Type</h6>
                        <p><?php echo ucfirst($row['rental_type']); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded flex-fill mb-3">
                                <h6 class="mb-1 fs-14 fw-medium">Pickup Location</h6>
                                <p><?php echo $row['del_location']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light p-3 rounded mb-3">
                                <h6 class="mb-1 fs-14 fw-medium">Return Location</h6>
                                <p><?php echo $row['r_location']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer & Driver -->
                <div class="border-bottom mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fs-14 fw-medium mb-3">Customer</h6>
                            <div class="d-flex align-items-center mb-3">
                                <span class="avatar avatar-rounded flex-shrink-0 me-2">
                                    <img src="https://static.vecteezy.com/system/resources/previews/037/336/395/non_2x/user-profile-flat-illustration-avatar-person-icon-gender-neutral-silhouette-profile-picture-free-vector.jpg" alt="">
                                </span>
                                <div>
                                    <h6 class="fs-14 fw-medium mb-1"><?php echo $row['c_f_name']." ".$row['c_l_name']; ?></h6>
                                    <p><?php echo $row['c_phone']; ?><br><?php echo $row['c_email']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fs-14 fw-medium mb-3">Driver</h6>
                            <div class="d-flex align-items-center mb-3">
                                <span class="avatar avatar-rounded flex-shrink-0 me-2">
                                    <img src="https://static.vecteezy.com/system/resources/previews/037/336/395/non_2x/user-profile-flat-illustration-avatar-person-icon-gender-neutral-silhouette-profile-picture-free-vector.jpg" alt="" style="width:40px;height:40px;object-fit:cover;">
                                </span>
                                <div>
                                    <h6 class="fs-14 fw-medium mb-1"><?php echo $row['d_f_name']." ".$row['d_l_name']; ?></h6>
                                    <p><?php echo $row['d_phone']; ?> (Age: <?php echo $row['d_age']; ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="border-bottom mb-3 pb-2">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium fs-14">Pricing of Car</h6>
                        <p>AED <?php echo $row['price'] * $days; ?></p>
                    </div>
                    <?php if (!empty($row['ex_services'])) { ?>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-medium d-flex align-items-center fs-14">Extra Services</h6>
                        <p><?php echo $row['ex_services']; ?></p>
                    </div>
                    <?php } ?>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <h6>Total Price</h6>
                    <h6>AED <?php echo $total_price; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>

						<div class="d-flex align-items-center justify-content-center flex-wrap row-gap-3">
							<!-- <a href="invoice-details.html" class="btn btn-primary me-3"><i class="ti ti-files me-1"></i>View Invoice</a> -->
							
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

		<!-- Delete Modal  -->
		<div class="modal fade" id="delete_modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <span class="avatar avatar-lg bg-transparent-danger rounded-circle text-danger mb-3">
                            <i class="ti ti-trash-x fs-26"></i>
                        </span>
                        <h4 class="mb-1">Delete Reservation</h4>
                        <p class="mb-3">Are you sure you want to delete Reservation?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                            <a href="https://dreamsrent.dreamstechnologies.com/html/template/admin/countries.html" class="btn btn-primary">Yes, Delete</a>
                        </div>
                    </div>
                </div>
			</div>
            </div>
        </div>
		 <!-- /Delete Modal-->

	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script data-cfasync="false" src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery-3.7.1.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap.bundle.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/feather.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery.slimscroll.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/moment.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/daterangepicker/daterangepicker.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap-datetimepicker.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Datatable JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/jquery.dataTables.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/dataTables.bootstrap5.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/select2/js/select2.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Bootstrap Tagsinput JS -->
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/script.js" type="ff056b2a4dfe3cf742c500f1-text/javascript"></script>

<script src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="ff056b2a4dfe3cf742c500f1-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"96c79e5d5b01de47","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/reservations.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
</html>