<?php
$price = isset($_GET['price']) ? floatval($_GET['price']) : 0;
$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;
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

	<?php include ('includes/head.php') ?>
</head>

<body>

	<div class="main-wrapper">

		<!-- Header -->
		<?php include ('includes/header.php') ?>
		<!-- /Header -->

		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">Make Payment</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">

						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->

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
										<span><img src="assets/img/icons/booking-head-icon-02.svg"
												alt="Booking Icon"></span>
										<h6>Details</h6>
									</li>
									<li class="active">
										<span><img src="assets/img/icons/booking-head-icon-04.svg"
												alt="Booking Icon"></span>
										<h6>Checkout</h6>
									</li>
									<li>
										<span><img src="assets/img/icons/booking-head-icon-05.svg"
												alt="Booking Icon"></span>
										<h6>Booking Confirmed</h6>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="booking-detail-info">
					<div class="row">

						<div class="col-lg-12">
							<div class="booking-information-main">
								<form method="POST" action="process-payment.php">
									<input type="hidden" name="price" value="<?php echo $price; ?>">
									<input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">

									<div class="booking-information-card payment-info-card">
										<div class="booking-info-head">
											<div class="d-flex align-items-center">
												<span><i class="bx bx-money"></i></span>
												<h5>Payment</h5>
											</div>
										</div>
										<div class="booking-info-body">
											<div class="payment-method-types">
												<h5>Choose your Payment Method</h5>
												<ul>
													<li>
														<label class="payment_custom_check">
															<input type="radio" name="payment_type" value="stripe"
																checked>
															<span class="payment_checkmark">
																<span class="checked-title"><img src="https://dreamsrent.dreamstechnologies.com/html/template/assets/img/icons/payment-method-02.svg"
																		alt="Stripe"></span>
															</span>
														</label>
													</li>
												
												</ul>
											</div>
										</div>
									</div>

									<div class="booking-info-btns d-flex justify-content-end">
										<button class="btn btn-primary continue-book-btn" type="submit">Pay AED
											<?php echo $price ?> & Place Reservation
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Footer -->
		<?php include ('includes/footer.php') ?>
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
	<script src="assets/js/jquery-3.7.1.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Aos -->
	<script src="assets/plugins/aos/aos.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Slick JS -->
	<script src="assets/plugins/slick/slick.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Rangeslider JS -->
	<script src="assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"
		type="8003d42d43f9c9ae180c9026-text/javascript"></script>
	<script src="assets/plugins/ion-rangeslider/js/custom-rangeslider.js"
		type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Datepicker Core JS -->
	<script src="assets/plugins/moment/moment.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Owl Carousel JS -->
	<script src="assets/js/owl.carousel.min.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Top JS -->
	<script src="assets/js/backToTop.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
		type="8003d42d43f9c9ae180c9026-text/javascript"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
		type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="8003d42d43f9c9ae180c9026-text/javascript"></script>

	<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
		data-cf-settings="8003d42d43f9c9ae180c9026-|49" defer></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
		integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
		data-cf-beacon='{"rayId":"9728a51eee595fb0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.8.0","token":"3ca157e612a14eccbb30cf6db6691c29"}'
		crossorigin="anonymous"></script>
</body>

</html>