<?php
session_start();
include "connection.php"; // database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // If passwords are stored as plain text (❌ not recommended)
            if ($password === $row['password']) {
                // ✅ Login success
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                header("Location: admin/index.php"); // redirect to dashboard
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:39:36 GMT -->
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Almarsaa Car Rental</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Fearther CSS -->
		<link rel="stylesheet" href="assets/css/feather.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
	
		<!-- Main Wrapper -->
		<div class="main-wrapper login-body">
		
			<div class="login-wrapper">
				<div class="loginbox">						
					<div class="login-auth">
						<div class="login-auth-wrap">
							<div class="sign-group">
								<a href="index.php" class="btn sign-up"><span><i class="fe feather-corner-down-left" aria-hidden="true"></i></span> Back To Home</a>
							</div>
							<h1>Sign In</h1>
							<form method="post">
								<div class="input-block">
									<label class="form-label">Email <span class="text-danger">*</span></label>
									<input type="email" name="email" class="form-control"  placeholder="">
								</div>
								<div class="input-block">
									<label class="form-label">Password <span class="text-danger">*</span></label>
									<div class="pass-group">
										<input type="password" name="password" class="form-control pass-input" placeholder="">
										<span class="fas fa-eye-slash toggle-password"></span>
									</div>
								</div>								
								<!-- <div class="input-block">
									<a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
								</div> -->
								<div class="input-block m-0">
									<label class="custom_check d-inline-flex"><span>Remember me</span>
										<input type="checkbox" name="remeber">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="input-block m-0">
    <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1 mb-4">Sign In</button>
</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js" type="d3ccfcce247c201c68cbf503-text/javascript"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/bootstrap.bundle.min.js" type="d3ccfcce247c201c68cbf503-text/javascript"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js" type="d3ccfcce247c201c68cbf503-text/javascript"></script>

	<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="d3ccfcce247c201c68cbf503-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"96c79da1af94de47","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:39:36 GMT -->
</html>