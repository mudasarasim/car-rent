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
	<title>Dreamsrent - Admin Template</title>

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
			<div class="content me-4">
                
                <!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h4 class="mb-1">All Reservations</h4>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Reservations</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        
					</div>
				</div>
				<!-- /Breadcrumb -->

				
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
                <!-- Custom Data Table -->
				<div class="table-footer"></div>			
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