<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/users.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:31 GMT -->
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
						<h4 class="mb-1">Clients</h4>
						<nav>
							<ol class="breadcrumb mb-0">
								<li class="breadcrumb-item">
									<a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Users</li>
							</ol>
						</nav>
					</div>
					<div class="d-flex my-xl-auto right-content align-items-center flex-wrap ">
						
					</div>
				</div>
				<!-- /Breadcrumb -->

           	<div class="collapse" id="filtercollapse">
				</div>

                <!-- Custom Data Table -->
                <?php
include "../connection.php"; // your database connection file

// Fetch all users/clients
$sql = "SELECT * FROM bookings ORDER BY id DESC";
$result = $conn->query($sql);
?>

<div class="custom-datatable-filter table-responsive">
    <table class="table datatable">
        <thead class="thead-light">
            <tr>
                <th>Client</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <?php 
                $statusLabels = [
                    0 => '<span class="badge badge-dark-transparent"><i class="ti ti-point-filled text-danger me-1"></i>Inactive</span>',
                    1 => '<span class="badge badge-dark-transparent"><i class="ti ti-point-filled text-success me-1"></i>Active</span>'
                ];
                $statusBadge = $statusLabels[$row['status']] ?? '<span class="badge bg-secondary">Unknown</span>';

                $avatar = !empty($row['avatar']) ? $row['avatar'] : "assets/img/default-avatar.png";
            ?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="user-details.php?id=<?= $row['id'] ?>" class="avatar me-2 flex-shrink-0">
                            <img src="https://static.vecteezy.com/system/resources/previews/037/336/395/non_2x/user-profile-flat-illustration-avatar-person-icon-gender-neutral-silhouette-profile-picture-free-vector.jpg" class="rounded-circle" alt="User Avatar" style="width:40px;height:40px;object-fit:cover;">
                        </a>
                        <h6>
                            <a href="user-details.php?id=<?= $row['id'] ?>" class="fs-14 fw-semibold">
                                <?= $row['c_f_name'] . ' ' . $row['c_l_name'] ?>
                            </a>
                        </h6>
                    </div>
                </td>

                <td><p class="text-gray-9"><?= $row['c_phone'] ?></p></td>

                <td><p class="text-gray-9"><?= $row['c_email'] ?></p></td>

                <td><p class="text-gray-9">Client</p></td>

                <td><?= $statusBadge ?></td>

                <td>
                    
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

	</div>
	<!-- /Main Wrapper -->

    
    <!-- Add User -->
	<div class="modal fade" id="add_user">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="mb-0">Create User</h5>
					<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x fs-16"></i>
					</button>
				</div>
				<div class="modal-body pb-1">
					<div class="row">
						<div class="mb-3">
							<label class="form-label">Image <span class="text-danger">*</span></label>
							<div class="d-flex align-items-center flex-wrap row-gap-3">                                                
								<div class="d-flex align-items-center justify-content-center avatar avatar-xxl border me-3 flex-shrink-0 text-dark frames">
									<i class="ti ti-photo-up text-gray-4 fs-24"></i>
								</div>                                              
								<div class="profile-upload">
									<div class="profile-uploader d-flex align-items-center">
										<div class="drag-upload-btn btn btn-md btn-dark">
											<i class="ti ti-photo-up fs-14"></i>
											Upload
											<input type="file" class="form-control image-sign" multiple="">
										</div>
									</div>
									<div class="mt-2">
										<p class="fs-14">Upload Image size 180*180, within 5MB</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">User <span class="text-danger">*</span></label>
								<input type="text" class="form-control">
							</div>
						</div>  
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Role <span class="text-danger">*</span></label>
								<select class="select">
									<option>Select</option>
									<option>Admin</option>
									<option>Manager</option>
									<option>Customer</option>
									<option>Inspector</option>
								</select>
							</div>
						</div>  
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Email <span class="text-danger">*</span></label>
								<input class="form-control" type="text">
							</div>
						</div>  
                        <div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Phone Number <span class="text-danger">*</span></label>
								<input type="text" id="phone" name="phone" class="form-control">
							</div>
						</div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Current Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="pass-inputs form-control">
                                    <span class="ti toggle-passwords ti-eye-off"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="form-control pass-inputa">
                                    <span class="ti toggle-passworda ti-eye-off"></span>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="d-flex justify-content-center">
						<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" class="btn btn-primary">Create New</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add User -->

    <!-- Edit User -->
	<div class="modal fade" id="edit_user">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="mb-0">Edit User</h5>
					<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
						<i class="ti ti-x fs-16"></i>
					</button>
				</div>
				<div class="modal-body pb-1">
					<div class="row">
						<div class="mb-3">
							<label class="form-label">Image <span class="text-danger">*</span></label>
							<div class="d-flex align-items-center flex-wrap row-gap-3">                                                
								<div class="d-flex align-items-center justify-content-center avatar avatar-xxl border me-3 p-2 flex-shrink-0 text-dark frames">
									<img src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/img/profiles/avatar-20.jpg" class="img-fluid rounded" alt="img">
									<span class="avatar-badge bg-light text-danger m-1"><i class="ti ti-trash"></i></span>
								</div>                                              
								<div class="profile-upload">
									<div class="profile-uploader d-flex align-items-center">
										<div class="drag-upload-btn btn btn-md btn-dark">
											<i class="ti ti-photo-up fs-14"></i>
											Upload
											<input type="file" class="form-control image-sign" multiple="">
										</div>
									</div>
									<div class="mt-2">
										<p class="fs-14">Upload Image size 180*180, within 5MB</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">User <span class="text-danger">*</span></label>
								<input type="text" class="form-control" value="Andrew Simmons">
							</div>
						</div>  
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Role <span class="text-danger">*</span></label>
								<select class="select">
									<option>Select</option>
									<option selected>Admin</option>
									<option>Manager</option>
									<option>Customer</option>
									<option>Inspector</option>
								</select>
							</div>
						</div>  
						<div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Email <span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="andrew@example.com">
							</div>
						</div>  
                        <div class="col-md-12">
							<div class="mb-3">
								<label class="form-label">Phone Number <span class="text-danger">*</span></label>
								<input type="text" id="phone2" name="phone2" class="form-control" value="+1 555 123 4567">
							</div>
						</div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Current Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="pass-inputs form-control" value="12345678">
                                    <span class="ti toggle-passwords ti-eye-off"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                <div class="pass-group">
                                    <input type="password" class="form-control pass-inputa" value="12345678">
                                    <span class="ti toggle-passworda ti-eye-off"></span>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<div class="modal-footer">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div class="form-check form-check-md form-switch me-2">
                            <label class="form-check-label form-label mt-0 mb-0">
                            <input class="form-check-input form-label me-2" type="checkbox" role="switch" checked="">
                                Status
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-primary">Save Changes</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit User -->

    	<!-- Delete  -->
	<div class="modal fade" id="delete_user">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<div class="modal-content">
				<span class="avatar avatar-lg bg-transparent-danger rounded-circle text-danger mb-3">
					<i class="ti ti-trash-x fs-26"></i>
				</span>
				<h4 class="mb-1">Delete User</h4>
				<p class="mb-3">Are you sure you want to delete user?</p>
				<div class="d-flex justify-content-center">
					<a href="javascript:void(0);" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</a>
					<a href="https://dreamsrent.dreamstechnologies.com/html/template/admin/users.html" class="btn btn-primary">Yes, Delete</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete -->

	<!-- jQuery -->
	<script data-cfasync="false" src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery-3.7.1.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap.bundle.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/feather.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/jquery.slimscroll.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Daterangepikcer JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/moment.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/daterangepicker/daterangepicker.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/bootstrap-datetimepicker.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Mobile Input -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/intltelinput/js/intlTelInput.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Datatable JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/jquery.dataTables.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/datatables/dataTables.bootstrap5.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/select2/js/select2.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Bootstrap Tagsinput JS -->
    <script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://dreamsrent.dreamstechnologies.com/html/template/admin/assets/js/script.js" type="507c76f13f24ac9f37c8e6a5-text/javascript"></script>

<script src="https://dreamsrent.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="507c76f13f24ac9f37c8e6a5-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"96c79e775ebff9f0","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>


<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/admin/users.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:41:32 GMT -->
</html>