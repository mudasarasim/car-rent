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
	<title>Almarsaa - Admin Template</title>

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
									<a href="https://dreamsrent.dreamstechnologies.com/html/template/admin/index.html">Home</a>
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
include "../connection.php"; // your database connection file

// Fetch all payments
$sql = "SELECT * FROM payments ORDER BY id DESC";
$result = $conn->query($sql);
?>

<table class="table datatable">
    <thead class="thead-light">
        <tr>
            <th>Payment ID</th>
            <th>Booking ID</th>
            <th>Price</th>
            <th>Payment Method</th>
            <th>Transaction ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <?php 
            // Status labels
            $statusLabels = [
                0 => 'Paid',
                1 => 'Pending',
                2 => 'Failed',
                3 => 'Refunded'
            ];
            $statusClasses = [
                0 => 'bg-success-transparent',
                1 => 'bg-warning-transparent',
                2 => 'bg-danger-transparent',
                3 => 'bg-info-transparent'
            ];
            $currentStatus = (int)$row['status'];
        ?>
        <tr>
            <td><h6>#<?= $row['id'] ?></h6></td>

            <td>
                <a href="reservation-details.php?id=<?= $row['booking_id'] ?>">
                    #<?= $row['booking_id'] ?>
                </a>
            </td>

            <td><strong>AED <?= number_format($row['price'], 2) ?></strong></td>

            <td><?= ucfirst($row['payment_method']) ?></td>

            <td><?= $row['transaction_id'] ?></td>

            <td>
                <span class="badge <?= $statusClasses[$currentStatus] ?? 'bg-secondary' ?>">
                    <?= $statusLabels[$currentStatus] ?? 'Unknown' ?>
                </span>
            </td>

            <td><?= date("d M Y, h:i A", strtotime($row['date'])) ?></td>

            <td>
                <div class="dropdown">
                    <button class="btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <li>
                            <a class="dropdown-item" href="reservation-details.php?id=<?= $row['booking_id'] ?>">
                                <i class="ti ti-eye me-1"></i> View Booking Details
                            </a>
                        </li>
                        
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