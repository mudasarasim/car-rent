<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // User not logged in, redirect to login page
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
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
			<div class="content pb-0">

				<!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h4 class="mb-1">Dashboard</h4>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						<div class="input-icon-start position-relative topdatepicker mb-2">
							<span class="input-icon-addon">
								<i class="ti ti-calendar"></i>
							</span>
							<input type="text" class="form-control date-range bookingrange" placeholder="dd/mm/yyyy - dd/mm/yyyy">
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

				<div class="row">
					<div class="col-xl-12 d-flex flex-column">

						<!-- Welcome Wrap -->
						<div class="card flex-fill">
							<div class="card-body">
								<div class="row align-items-center row-gap-3">
									<div class="col-sm-7">
										<h4 class="mb-1">Welcome, Admin </h4>
										<p>400+ Budget Friendly Cars Available for the rents </p>
										<div class="d-flex align-items-center gap-3 flex-wrap">
											<a href="reservations.php" class="btn btn-primary d-flex align-items-center"><i class="ti ti-eye me-1"></i>Reservations</a>
											<a href="add-car.php" class="btn btn-dark d-flex align-items-center"><i class="ti ti-plus me-1"></i>Add New Car</a>
										</div>
									</div>
									<div class="col-sm-5">
										<img src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/img/icons/car.svg" alt="img">
									</div>
								</div>
							</div>
						</div>
						<!-- /Welcome Wrap -->

					
					</div>

			

				</div>

				<div class="row">					
					
			
					<!-- Recent Reservations -->
					<div class="col-xl-12 d-flex">
						<div class="card flex-fill">
							<div class="card-body pb-1">
								<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">
									<h5>Recent Reservations</h5>
									<a href="reservations.php" class="text-decoration-underline fw-medium">View All</a>
								</div>
								 <!-- Custom Data Table -->
                <div class="custom-datatable-filter table-responsive">
                    <?php
include "../connection.php"; // your DB connection

// Fetch bookings with car info
$sql = "SELECT b.*, c.name AS car_name, c.img1 AS car_img, c.model, c.number_plate 
        FROM bookings b
        LEFT JOIN cars c ON b.car_id = c.id
        ORDER BY b.id DESC";
$result = $conn->query($sql);
?>

<table class="table datatable">
    <thead class="thead-light">
        <tr>
            <th>Booking ID</th>
            <th>CAR</th>
            <th>CUSTOMER</th>
            <th>PICK UP DETAILS</th>
            <th>DROP OFF DETAILS</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <?php 
            $statusLabels = [
                0 => 'Pending',
                1 => 'Confirmed',
                2 => 'Completed'
            ];
            $statusClasses = [
                0 => 'bg-warning-transparent',
                1 => 'bg-orange-transparent',
                2 => 'bg-success-transparent'
            ];
            $currentStatus = (int)$row['status'];
        ?>
        <tr>
            <td>
                <div class="form-check form-check-md">
                    <h6>#<?= $row['id'] ?></h6>
                </div>
            </td>

            <td>
                <div class="d-flex align-items-center">
                    <a href="car-details.php?id=<?= $row['car_id'] ?>" class="avatar me-2 flex-shrink-0">
                        <img src="<?= $row['car_img'] ?>" alt="<?= $row['car_name'] ?>" style="width:60px; height:40px; object-fit:cover;">
                    </a>
                    <div>
                        <h6 class="fs-14">
                            <a href="car-details.php?id=<?= $row['car_id'] ?>">
                                <?= $row['car_name'] . ' ' . $row['model'] ?>
                            </a>
                        </h6>
                        <small class="text-muted">Plate: <?= $row['number_plate'] ?></small>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-1 fs-14"><?= $row['c_f_name'] . ' ' . $row['c_l_name'] ?></h6>
                        <span class="badge bg-secondary-transparent rounded-pill">Client</span>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="border rounded text-center flex-shrink-0 p-1 me-2">
                        <h5 class="mb-2 fs-16"><?= date("d", strtotime($row['s_date'])) ?></h5>
                        <span class="fw-medium fs-12 bg-light p-1 rounded-1 d-inline-block text-gray-9">
                            <?= date("M, Y", strtotime($row['s_date'])) ?>
                        </span>
                    </div>
                    <div>
                        <p class="text-gray-9 mb-0"><?= $row['del_location'] ?></p>
                        <span class="fs-13"><?= date("h:i A", strtotime($row['s_time'])) ?></span>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="border rounded text-center flex-shrink-0 p-1 me-2">
                        <h5 class="mb-2 fs-16"><?= date("d", strtotime($row['r_date'])) ?></h5>
                        <span class="fw-medium fs-12 bg-light p-1 rounded-1 d-inline-block text-gray-9">
                            <?= date("M, Y", strtotime($row['r_date'])) ?>
                        </span>
                    </div>
                    <div>
                        <p class="text-gray-9 mb-0"><?= $row['r_location'] ?></p>
                        <span class="fs-13"><?= date("h:i A", strtotime($row['r_time'])) ?></span>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge <?= $statusClasses[$currentStatus] ?? 'bg-secondary' ?> d-inline-flex align-items-center badge-sm">
                    <i class="ti ti-point-filled me-1"></i><?= $statusLabels[$currentStatus] ?? 'Unknown' ?>
                </span>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <li>
                            <a class="dropdown-item rounded-1" href="reservation-details.php?id=<?= $row['id'] ?>">
                                <i class="ti ti-eye me-1"></i> View Details
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-1" href="delete-reservation.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this reservation?')">
                                <i class="ti ti-trash me-1"></i> Delete
                            </a>
                        </li>
                        <?php if ($currentStatus == 1): ?>
                        <li>
                            <a class="dropdown-item rounded-1" href="update-booking-status.php?id=<?= $row['id'] ?>&status=2" onclick="return confirm('Mark this booking as completed?')">
                                <i class="ti ti-check me-1"></i> Mark as Completed
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>


                </div>
               
								
							</div>
						</div>
					</div>
					<!-- /Recent Reservations -->

				</div>

			
			</div>

			<!-- Footer-->
			<div class="footer d-sm-flex align-items-center justify-content-between bg-white p-3">
				<p class="mb-0">
                    <a href="javascript:void(0);">Privacy Policy</a>
                    <a href="javascript:void(0);" class="ms-4">Terms of Use</a>
                </p>
				<p>&copy; 2025 Al Marsa, Made with <span class="text-danger">❤</span> by <a href="javascript:void(0);" class="text-secondary">Xpertone Creatives</a></p>
			</div>
			<!-- /Footer-->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script data-cfasync="false" src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery-3.7.1.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/feather.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap.bundle.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery.slimscroll.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
	
	<!-- Daterangepikcer JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/moment.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/daterangepicker/daterangepicker.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap-datetimepicker.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Bootstrap Tagsinput JS -->
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- ApexChart JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/apexchart/apexcharts.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/apexchart/chart-data.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Peity Chart -->
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/peity/jquery.peity.min.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/peity/chart-data.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I" type="7d3490fb1157896a8d02cafa-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/map.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/script.js" type="7d3490fb1157896a8d02cafa-text/javascript"></script>

<script src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7d3490fb1157896a8d02cafa-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"96c79e55ef71f9f0","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
</html>