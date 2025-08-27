<?php
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // make sure PHPMailer is installed

$booking_id = intval($_GET['booking_id']);
$price = number_format((float)$_GET['price'], 2, '.', '');
$method = $_GET['method'];
$status = 'completed';
$transaction_id = uniqid($method . '_'); 
$date = date('Y-m-d H:i:s');

// Fetch booking
$sql = "SELECT * FROM bookings WHERE id=$booking_id";
$res = $conn->query($sql);
$booking = $res->fetch_assoc();
$car_id = $booking['car_id'];

// Fetch car
$sql = "SELECT * FROM cars WHERE id=$car_id";
$res = $conn->query($sql);
$car = $res->fetch_assoc();

if ($conn->connect_error) {
    die("<script>alert('Connection failed: " . addslashes($conn->connect_error) . "');</script>");
}

// Insert payment record
$stmt = $conn->prepare("INSERT INTO payments (booking_id, price, payment_method, transaction_id, status, date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("idssss", $booking_id, $price, $method, $transaction_id, $status, $date);

if ($stmt->execute()) {
    // ✅ Update booking status to confirmed (1)
    $updateBooking = $conn->prepare("UPDATE bookings SET status = 1 WHERE id = ?");
    $updateBooking->bind_param("i", $booking_id);
    $updateBooking->execute();
    $updateBooking->close();
} else {
    echo "<script>alert('Payment failed: " . addslashes($stmt->error) . "');</script>";
}

$stmt->close();
$conn->close();


// -----------------------------
// PHPMailer Email Setup
// -----------------------------
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'msofficial459@gmail.com';                     //SMTP username
    $mail->Password   = 'dqyd fwtg gtcs hdin';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom("msofficial459@gmail.com", "Car Rental");
    $mail->addAddress($booking['c_email'], $booking['c_f_name'] . " " . $booking['c_l_name']);

    $mail->isHTML(true);
    $mail->Subject = "Booking Confirmation - ID #$booking_id";

    // HTML body (same design as your page)
    $mail->Body = '
    <div style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px">
        <div style="max-width:700px;margin:auto;background:#fff;border-radius:10px;padding:20px;border:1px solid #eee;">
            <div style="text-align:center;padding:10px;">
                <h2 style="color:#28a745;">Thank you! Your Order has been Received</h2>
                <p style="font-size:16px;">Booking ID: <b>#'.$booking_id.'</b></p>
            </div>

            <div style="display:flex;align-items:center;border-bottom:1px solid #eee;padding:15px 0;">
                <img src="https://yourdomain.com/admin/'.$car['img1'].'" alt="Car" width="120" style="border-radius:8px;margin-right:15px;">
                <div>
                    <h3 style="margin:0;">'.$car['name'].'</h3>
                    <p style="margin:5px 0;">📍 Location: '.$booking['del_location'].'</p>
                </div>
                <div style="margin-left:auto;text-align:right;">
                    <p style="margin:0;color:#888;">Total Amount</p>
                    <h3 style="margin:0;color:#333;">AED '.$price.'</h3>
                </div>
            </div>

            <div style="padding:15px;">
                <h4>Car Pricing</h4>
                <ul>
                    <li>Rental Charges Rate (1 day): <b>AED '.$car['price'].'</b></li>
                    <li>Number of Days: <b>'.$booking['p_location'].'</b></li>
                    <li>Subtotal: <b>AED '.$price.'</b></li>
                </ul>
            </div>

            <div style="padding:15px;">
                <h4>Payment Details</h4>
                <ul>
                    <li>Payment Mode: <b>'.ucfirst($method).'</b></li>
                    <li>Transaction ID: <b>'.$transaction_id.'</b></li>
                </ul>
            </div>

            <div style="padding:15px;">
                <h4>Location Date & Time</h4>
                <ul>
                    <li>Booking Type: <b>'.$booking['rental_type'].'</b></li>
                    <li>Pickup Location: <b>'.$booking['del_location'].'</b></li>
					<li>Return Location: <b>'.$booking['r_location'].'</b></li>
                    <li>Pickup Date: <b>'.$booking['s_date'].'</b></li>
                    <li>Return Date: <b>'.$booking['r_date'].'</b></li>
                    
                </ul>
            </div>

            <div style="padding:15px;">
                <h4>Billing Information</h4>
                <ul>
                    <li>'.$booking['c_f_name'].' '.$booking['c_l_name'].'</li>
                    <li>'.$booking['del_location'].'</li>
                    <li>'.$booking['c_phone'].'</li>
                    <li>'.$booking['c_email'].'</li>
                </ul>
            </div>

            <div style="padding:15px;color:#666;font-size:14px;">
                <h4>Additional Information</h4>
                <p>Rental companies typically require customers to return the vehicle with a
                full tank of fuel. If the vehicle is returned with less than a full
                tank, customers may be charged for refueling.</p>
            </div>
        </div>
    </div>';

    $mail->AltBody = "Booking Confirmation - Booking ID: $booking_id | Amount: AED $price | Transaction: $transaction_id";

    $mail->send();
    echo "<script>alert('Payment recorded successfully! and also check your email for booking details.');</script>";

} catch (Exception $e) {
    echo "<script>alert('Mailer Error: " . addslashes($mail->ErrorInfo) . "');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Primary Meta Tags -->
<title>Car Rental in Dubai | Almarsaa Car Rental</title>
<meta name="description" content="Almarsaa Car Rental in Dubai offers affordable, reliable, and luxury car hire services. Choose from economy, SUV, and premium cars with 24/7 support. Book online today at almarsaa.com." />
<meta name="keywords" content="car rental Dubai, rent a car Dubai, luxury car rental, SUV rental Dubai, economy car rental Dubai, Almarsaa car rental" />
<meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
<link rel="canonical" href="https://almarsaa.com/" />

<!-- Open Graph / Facebook -->
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Car Rental in Dubai | Almarsaa Car Rental" />
<meta property="og:description" content="Almarsaa Car Rental in Dubai offers affordable, reliable, and luxury car hire services. Book your car today at almarsaa.com." />
<meta property="og:url" content="https://almarsaa.com/" />
<meta property="og:site_name" content="Almarsaa Car Rental" />
<meta property="og:image" content="https://almarsaa.com/assets/images/car-rental-dubai.jpg" />
<meta property="og:image:secure_url" content="https://almarsaa.com/assets/images/car-rental-dubai.jpg" />
<meta property="og:image:alt" content="Car Rental Dubai - Almarsaa" />
<meta property="og:image:type" content="image/jpeg" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Car Rental in Dubai | Almarsaa Car Rental" />
<meta name="twitter:description" content="Almarsaa Car Rental in Dubai offers affordable, reliable, and luxury cars for rent. Easy booking, 24/7 support, and the best rates." />
<meta name="twitter:image" content="https://almarsaa.com/assets/images/car-rental-dubai.jpg" />

<!-- Additional -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0a0a0a">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CarRental",
  "name": "Almarsaa Car Rental",
  "url": "https://almarsaa.com/",
  "logo": "https://almarsaa.com/assets/images/logo.png",
  "image": "https://almarsaa.com/assets/images/car-rental-dubai.jpg",
  "description": "Almarsaa Car Rental in Dubai offers affordable, luxury, SUV, and economy car rentals with 24/7 customer support and easy online booking.",
  "slogan": "Affordable & Luxury Car Rentals in Dubai",
  "telephone": "+971-05-57556717,
  "email": "info@almarsaa.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Business Bay",
    "addressLocality": "Dubai",
    "addressRegion": "Dubai",
    "postalCode": "00000",
    "addressCountry": "AE"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "25.276987",
    "longitude": "55.296249"
  },
  "areaServed": {
    "@type": "City",
    "name": "Dubai"
  },
  "openingHours": "Mo-Su 00:00-23:59",
  "sameAs": [
    "https://www.facebook.com/almarsaacar",
    "https://www.instagram.com/almarsaacar",
    "https://www.linkedin.com/company/almarsaacar",
    "https://twitter.com/almarsaacar"
  ],
  "priceRange": "$$",
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Car Rental Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Economy Car Rental",
          "description": "Affordable economy car rentals for daily and weekly use in Dubai."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Luxury Car Rental",
          "description": "Premium and luxury cars for rent in Dubai, including sports cars and executive vehicles."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "SUV Rental",
          "description": "Spacious and comfortable SUV rentals for families and groups in Dubai."
        }
      }
    ]
  }
}
</script>
	<?php include('includes/head.php') ?>
</head>

<body>

	<div class="main-wrapper">

		<!-- Header -->
		<?php include('includes/header.php') ?>
		<!-- /Header -->

		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">Booking Confirmed</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">

						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->

		<!-- Booking Success -->
		<div class="booking-new-module">
			<div class="container">
				<div class="booking-wizard-head">
					<div class="row align-items-center">
						<div class="col-xl-4 col-lg-3">
							<div class="booking-head-title">
								<h4>Reserve Your Car</h4>
								<p>Complete the following steps</p>
							</div>
						</div>
						<div class="col-xl-8 col-lg-9">
							<div class="booking-wizard-lists">
								<ul>
									<li class="active activated">
										<span><img src="assets/img/icons/booking-head-icon-01.svg"
												alt="Booking Icon"></span>
										<h6>Location & Time</h6>
									</li>
									<li class="active activated">
										<span><img src="assets/img/icons/booking-head-icon-03.svg"
												alt="Booking Icon"></span>
										<h6>Detail</h6>
									</li>
									<li class="active activated">
										<span><img src="assets/img/icons/booking-head-icon-04.svg"
												alt="Booking Icon"></span>
										<h6>Checkout</h6>
									</li>
									<li class="active">
										<span><img src="assets/img/icons/booking-head-icon-05.svg"
												alt="Booking Icon"></span>
										<h6>Booking Confirmed</h6>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="booking-card">
					<div class="success-book">
						<span class="success-icon">
							<i class="fa-solid fa-check-double"></i>
						</span>
						<h5>Thank you! Your Order has been Recieved</h5>
						<h5 class="order-no">Booking ID : <span>#
								<?php echo $_GET['booking_id'] ?>
							</span></h5>
					</div>
					<div class="booking-header">
						<div class="booking-img-wrap">
							<div class="book-img">
								<img src="admin/<?php echo $car['img1'] ?>" alt="img">
							</div>
							<div class="book-info">
								<h6>
									<?php echo $car['name'] ?>
								</h6>
								<p><i class="feather-map-pin"></i> Location :
									<?php echo $booking['del_location'] ?>
								</p>
							</div>
						</div>
						<div class="book-amount">
							<p>Total Amount</p>
							<h6>AED
								<?php echo $_GET['price'] ?>
							</h6>
						</div>
					</div>
					<div class="row">

						<!-- Car Pricing -->
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Car Pricing</h6>
								</div>
								<div class="book-body">
									<ul class="pricing-lists">
										<li>
											<div>
												<p>Rental Charges Rate <span>(1 day )</span></p>
												<p class="text-danger">(This does not include fuel)</p>
											</div>
											<span> + AED
												<?php echo $car['price'] ?>
											</span>
										</li>
										<li>
											<p>Number of Days</p>
											<span>
												<?php echo $booking['p_location'] ?>
											</span>
										</li>
										<li class="total">
											<p>Subtotal</p>
											<span>AED
												<?php echo $_GET['price'] ?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Car Pricing -->
						<!-- Payment  Details -->
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Payment Details</h6>
								</div>
								<div class="book-body">
									<ul class="location-lists">
										<li>
											<h6>Payment Mode</h6>
											<p style="text-transform: capitalize">
												<?php echo $_GET['method'] ?>
											</p>
										</li>
										<li>
											<h6>Transaction ID</h6>
											<p><span>
													<?php echo $transaction_id ?>
												</span></p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Payment  Details -->

						<!-- Location & Time -->
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Location Date & Time</h6>
								</div>
								<div class="book-body">
									<ul class="location-lists">
										<li>
											<h6>Booking Type</h6>
											<p>
												<?php echo $booking['rental_type'] ?>
											</p>
										</li>
										<li>
											<h6>Rental Type</h6>
											<p>Daily</p>
										</li>
										<li>
											<h6>Pickup Location</h6>
											<p>
												<?php echo $booking['del_location'] ?>
											</p>

										</li>
										<li>
											<h6>Return Location</h6>
											<p>
												<?php echo $booking['r_location'] ?>
											</p>

										</li>
										<li>
											<h6>Delivery Date</h6>
											<p>
												<?php echo $booking['s_date'] ?>
											</p>

										</li>
										<li>
											<h6>Return Date</h6>
											<p>
												<?php echo $booking['r_date'] ?>
											</p>

										</li>
										
									</ul>
								</div>
							</div>
						</div>
						<!-- /Location & Time -->

						<!-- Add-ons Pricing -->
						<!-- <div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Extra Services Pricing</h6>
								</div>
								<div class="book-body">
									<ul class="pricing-lists">
										<li>
											<p>GPS Navigation Systems</p>
											<span>  $25</span>
										</li>
										<li>
											<p>Wi-Fi Hotspot</p>
											<span> $25</span>
										</li>
										<li>
											<p>Child Safety Seats</p>
											<span>$50</span>
										</li>
										<li class="total">
											<p>Extra Services Charges Rate</p>
											<span>$100</span>
										</li>
									</ul>
								</div>
							</div>
						</div> -->
						<!-- /Add-ons Pricing -->

						<!-- Driver Details -->
						<!-- <div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Driver Details</h6>
								</div>
								<div class="book-body">
									<ul class="location-lists">
										<li>
											<h6>Driver Type</h6>
											<p>Acting Driver</p>
										</li>
									</ul>
									<div class="driver-info">
										<span>
											<img src="assets/img/user.jpg" alt="img">
										</span>
										<div class="driver-name">
											<h6>Ruban</h6>
											<ul>
												<li>No of Rides Completed : 32</li>
												<li>Price : $100</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- /Driver Details -->

						<!-- Billing Information -->
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="book-card flex-fill">
								<div class="book-head">
									<h6>Billing Information</h6>
								</div>
								<div class="book-body">
									<ul class="billing-lists">
										<li style="text-transform: capitalize">
											<?php echo $booking['c_f_name'] ?>
											<?php echo $booking['c_l_name'] ?>
										</li>
										<li>Mak Infotech</li>
										<li>
											<?php echo $booking['del_location'] ?>
										</li>
										<li>
											<?php echo $booking['c_phone'] ?>
										</li>
										<li>
											<?php echo $booking['c_email'] ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Billing Information -->


						<!-- Additional Information -->
						<div class="col-lg-12">
							<div class="book-card mb-0">
								<div class="book-head">
									<h6>Additional Information</h6>
								</div>
								<div class="book-body">
									<ul class="location-lists">
										<li>
											<p>Rental companies typically require customers to return the vehicle with a
												full tank of fuel. If the vehicle is returned with less than a full
												tank, customers may be charged for refueling the vehicle at a premium
												rate, often higher than local fuel prices.</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /Additional Information -->

					</div>
				</div>
				
			</div>

		</div>
		<!-- /Booking Success -->

		<!-- Footer -->
		<?php include('includes/footer.php') ?>
		<!-- /Footer -->

	</div>

	<!-- scrollToTop start -->
	<div class="progress-wrap active-progress">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
				style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
			</path>
		</svg>
	</div>
	<!-- scrollToTop end -->

	<!-- jQuery -->
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.7.1.min.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Aos -->
	<script src="assets/plugins/aos/aos.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Slick JS -->
	<script src="assets/plugins/slick/slick.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Rangeslider JS -->
	<script src="assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"
		type="4c2370aa4a694ae8204f15b6-text/javascript"></script>
	<script src="assets/plugins/ion-rangeslider/js/custom-rangeslider.js"
		type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Datepicker Core JS -->
	<script src="assets/plugins/moment/moment.min.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Owl Carousel JS -->
	<script src="assets/js/owl.carousel.min.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Top JS -->
	<script src="assets/js/backToTop.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
		type="4c2370aa4a694ae8204f15b6-text/javascript"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
		type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="4c2370aa4a694ae8204f15b6-text/javascript"></script>

	<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
		data-cf-settings="4c2370aa4a694ae8204f15b6-|49" defer></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
		integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
		data-cf-beacon='{"rayId":"972916b66d97a3ee","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.8.0","token":"3ca157e612a14eccbb30cf6db6691c29"}'
		crossorigin="anonymous"></script>
</body>

</html>