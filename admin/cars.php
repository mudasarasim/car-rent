<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/cars.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
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
		<div class="page-wrapper">
			<div class="content me-4">
                
                <!-- Breadcrumb -->
				<div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
					<div class="my-auto mb-2">
						<h4 class="mb-1">All Cars</h4>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Cars</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
                        <div class="mb-2">
							<a href="add-car.php" class="btn btn-primary d-flex align-items-center"><i class="ti ti-plus me-2"></i>Add New Car</a>
						</div>
					</div>
				</div>
				<!-- /Breadcrumb -->

             
                <!-- Custom Data Table -->
              <?php
include "../connection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM cars WHERE id = $delete_id");
    // redirect to same page after delete to prevent refresh issue
    // header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch cars
$sql = "SELECT id, name, img1, car_type, price, fuel, transmission, status, date 
        FROM cars 
        ORDER BY id DESC";
$result = $conn->query($sql);
?>


<div class="custom-datatable-filter table-responsive">
    <table class="table datatable">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>CAR</th>
                <th>Transmission</th>
                <th>PRICE (PER DAY)</th>
                <th>Fuel</th>
                <th>IS FEATURED</th>
                <th>CREATED DATE</th>
                <th>STATUS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <div class="form-check form-check-md">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="car-details.php?id=<?= $row['id'] ?>" class="avatar me-2 flex-shrink-0">
                                    <img src="<?= $row['img1'] ?>" class="rounded-3" alt="<?= $row['name'] ?>">
                                </a>
                                <div>
                                    <h6><a href="car-details.php?id=<?= $row['id'] ?>" class="fs-14 fw-semibold"><?= htmlspecialchars($row['name']) ?></a></h6>
                                    <p><?= htmlspecialchars($row['car_type']) ?></p>
                                </div>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($row['transmission']) ?></td>
                        <td><p class="fs-14 fw-semibold text-gray-9">AED <?= htmlspecialchars($row['price']) ?></p></td>
                        <td><p class="text-gray-9"><?= htmlspecialchars($row['fuel']) ?></p></td>
                        <td>
                            <i class="ti ti-star-filled text-warning"></i> <!-- optional logic to show featured -->
                        </td>
                        <td>
                            <h6 class="fs-14 fw-normal"><?= date('d M Y', strtotime($row['date'])) ?></h6>
                            <p class="fs-13"><?= date('h:i A', strtotime($row['date'])) ?></p>
                        </td>
                        <td>
                            <?php if ($row['status'] == '0'): ?>
                                <span class="badge badge-dark-transparent"><i class="ti ti-point-filled text-success me-1"></i>Active</span>
                            <?php else: ?>
                                <span class="badge badge-dark-transparent"><i class="ti ti-point-filled text-danger me-1"></i>Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-2">
        <li>
            <a class="dropdown-item rounded-1" href="edit-car.php?id=<?= $row['id'] ?>">
                <i class="ti ti-edit me-1"></i>Edit
            </a>
        </li>
        <li>
            <a class="dropdown-item rounded-1" 
               href="?delete_id=<?= $row['id'] ?>" 
               onclick="return confirm('Are you sure you want to delete this car?');">
                <i class="ti ti-trash me-1"></i>Delete
            </a>
        </li>
    </ul>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="9" class="text-center">No cars found.</td></tr>
            <?php endif; ?>
        </tbody>	
    </table>
</div>

<?php $conn->close(); ?>
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

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script data-cfasync="false" src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery-3.7.1.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap.bundle.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/feather.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery.slimscroll.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/moment.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/daterangepicker/daterangepicker.js" type="f7332220b9c080c5770fe753-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap-datetimepicker.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Datatable JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/jquery.dataTables.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/dataTables.bootstrap5.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/select2/js/select2.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Bootstrap Tagsinput JS -->
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/script.js" type="f7332220b9c080c5770fe753-text/javascript"></script>

<script src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f7332220b9c080c5770fe753-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"96c79e635dfade47","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/cars.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:30 GMT -->
</html>