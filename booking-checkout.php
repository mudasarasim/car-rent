<?php
include "connection.php";

// Fetch single car details
if (!isset($_GET['id'])) {
    die("Car ID is missing from URL.");
}
$car_id = intval($_GET['id']);
$sql = "SELECT * FROM cars WHERE id=$car_id";
$res = $conn->query($sql);
$car = $res->fetch_assoc();

$bookedDates = [];

$bookedQuery = "SELECT s_date, r_date FROM bookings WHERE car_id = $car_id AND status = '1'";
$result = $conn->query($bookedQuery);

while ($row = $result->fetch_assoc()) {
    $start = new DateTime($row['s_date']);
    $end = new DateTime($row['r_date']);

    while ($start <= $end) {
        $bookedDates[] = $start->format('Y-m-d');
        $start->modify('+1 day');
    }
}

$bookedDates = array_unique($bookedDates);
if (isset($_POST['submit'])) {
    // Collect form data
    $c_f_name   = $_POST['c_f_name'];
    $c_l_name   = $_POST['c_l_name'];
    $c_email    = $_POST['c_email'];
    $c_phone    = $_POST['c_phone'];
    $rental_type= $_POST['rent_type']; // radio
    $d_f_name   = $_POST['d_f_name'];
    $d_l_name   = $_POST['d_l_name'];
    $d_age      = $_POST['d_age'];
    $d_phone    = $_POST['d_phone'];
    $l_number   = $_POST['l_number'];

    // Optional fields → convert empty string to NULL
    $del_location = !empty($_POST['del_location']) ? $_POST['del_location'] : NULL;
    // Calculate number of rental days before insertion
$start = new DateTime($_POST['s_date']);
$end = new DateTime($_POST['r_date']);
$days = $start->diff($end)->days;
$days = ($days < 1) ? 1 : $days;

// Use days in place of pickup location
$p_location = (string)$days; // must be a string for DB insert

    $r_location   = $_POST['r_location'] ?? '';

    $s_date     = $_POST['s_date'];
    $s_time     = $_POST['s_time'];
    $r_date     = $_POST['r_date'];
    $r_time     = $_POST['r_time'];
    $status     = "pending";

    // Handle File Upload (driver license image)
    $d_img = NULL;
    if (!empty($_FILES['d_img']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $fileName = time() . "_" . basename($_FILES["d_img"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["d_img"]["tmp_name"], $targetFilePath)) {
            $d_img = $fileName;
        }
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO bookings 
        (car_id, c_f_name, c_l_name, c_email, c_phone, rental_type, 
         d_f_name, d_l_name, d_age, d_phone, l_number, d_img, 
         del_location, r_location, p_location, s_date, s_time, r_date, r_time, status) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    // 20 params: 1 int + 19 strings
    $stmt->bind_param("isssssssssssssssssss", 
        $car_id, $c_f_name, $c_l_name, $c_email, $c_phone, $rental_type,
        $d_f_name, $d_l_name, $d_age, $d_phone, $l_number, $d_img,
        $del_location, $r_location, $p_location, $s_date, $s_time, $r_date, $r_time, $status
    );

    if ($stmt->execute()) {
    // Get last inserted booking id
    $booking_id = $stmt->insert_id;

    // Calculate number of days
    $start = new DateTime($s_date);
    $end = new DateTime($r_date);
    $days = $start->diff($end)->days;

    // Make sure at least 1 day is counted
    if ($days < 1) {
        $days = 1;
    }

    // Get daily price from car
    $daily_price = $car['price'];
    $total_price = $days * $daily_price;

    echo "<script>
        alert('Booking successful! Total rental duration: $days day(s), Total Price: AED $total_price');
        window.location='payment.php?price={$total_price}&booking_id={$booking_id}';
    </script>";
}


    $stmt->close();
}



$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/booking-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:39:36 GMT -->

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
<script>
    const bookedDates = <?= json_encode(array_values($bookedDates)); ?>;
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const booked = new Set(bookedDates);
    const sDateInput = document.getElementById("s_date");
    const rDateInput = document.getElementById("r_date");

    function checkDate(input) {
        input.addEventListener("change", function () {
            const selectedDate = this.value;
            if (booked.has(selectedDate)) {
                alert("This date is already booked. Please select another date.");
                this.value = ""; // Clear the invalid date
            }
        });
    }

    checkDate(sDateInput);
    checkDate(rDateInput);
});
</script>

	<div class="main-wrapper">

		<!-- Header -->
		<?php include ('includes/header.php') ?>
		<!-- /Header -->

		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title">Checkout</h2>


					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->

		<div class="booking-new-module">
			<div class="container">
				<div class="booking-wizard-head">
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
											<h6>Location &amp; Time</h6>
										</li>
										<li class="active">
											<span><img src="assets/img/icons/booking-head-icon-02.svg"
													alt="Booking Icon"></span>
											<h6>Details</h6>
										</li>
										<li>
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
				</div>
				<div class="booking-detail-info">
					<div class="row">

						<div class="booking-information-main col-lg-8">
							<form method="post" enctype="multipart/form-data">
								<div class="">
									<div class="booking-information-card">
										<div class="booking-info-head">
											<span><i class="bx bx-user-pin"></i></span>
											<h5>Your details</h5>
										</div>
										<div class="booking-info-body">
											<div class="booking-timings self-driver-info">
												<div class="row">
													<div class="col-md-6">
														<div class="input-block date-widget">
															<label class="form-label">First Name <span
																	class="text-danger">
																	*</span></label>
															<input type="text" name="c_f_name" class="form-control"
																placeholder="Enter First Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block date-widget">
															<label class="form-label">Last Name <span
																	class="text-danger">
																	*</span></label>
															<input type="text" name="c_l_name" class="form-control"
																placeholder="Enter Last Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block date-widget">
															<label class="form-label">Email <span class="text-danger">
																	*</span></label>
															<input type="email" name="c_email" class="form-control"
																placeholder="Enter Your Email">
														</div>
													</div>
													<div class="col-md-6">
														<div class="input-block date-widget">
															<label class="form-label">Mobile Number <span
																	class="text-danger">
																	*</span></label>
															<input type="text" name="c_phone" class="form-control"
																placeholder="Enter Phone Number">
														</div>
													</div>
												</div>

											</div>
										</div>

									</div>
								</div>
								<div class="booking-information-card">
									<div class="booking-info-head">
										<span><i class="bx bxs-car-garage"></i></span>
										<h5>Rental Type</h5>
									</div>
									<div class="booking-info-body">
										<ul class="booking-radio-btns">
											<li>
												<label class="booking_custom_check">
													<input type="radio" name="rent_type" id="location_delivery" checked>
													<span class="booking_checkmark">
														<span class="checked-title">Delivery</span>
													</span>
												</label>
											</li>
											<li>
												<label class="booking_custom_check">
													<input type="radio" name="rent_type" id="location_delivery">
													<span class="booking_checkmark">
														<span class="checked-title">Self Pickup</span>
													</span>
												</label>
											</li>
										</ul>
									</div>
								</div>
								<div class="booking-information-card">
									<div class="booking-info-head">
										<span><i class="bx bx-user-pin"></i></span>
										<h5>Driver details</h5>
									</div>
									<div class="booking-info-body">
										
										<div class="booking-timings self-driver-info">
											<div class="row">
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">First Name <span class="text-danger">
																*</span></label>
														<input type="text" name="d_f_name" class="form-control"
															placeholder="Enter First Name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">Last Name <span class="text-danger">
																*</span></label>
														<input type="text" name="d_l_name" class="form-control"
															placeholder="Enter Last Name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">Driver Age <span class="text-danger">
																*</span></label>
														<input type="text" name="d_age" class="form-control"
															placeholder="Enter Age of Driver">
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">Mobile Number <span
																class="text-danger"> *</span></label>
														<input type="text" name="d_phone" class="form-control"
															placeholder="Enter Phone Number">
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-block date-widget">
														<label class="form-label">Driving Licence Number <span
																class="text-danger"> *</span></label>
														<input type="text" name="l_number" class="form-control"
															placeholder="Enter Driving Licence Number">
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-block date-widget">
														<label class="form-label">Upload Document <span
																class="text-danger"> *</span></label>
														<div class="upload-div">
															<input type="file" name="d_img">
															<div class="upload-photo-drag">
																<span><i class="fa fa-upload me-2"></i> Upload
																	Photo</span>
																<h6>or Drag Photos</h6>
															</div>
														</div>
														<div class="upload-list">
															<ul>
																<li>The maximum photo size is 8 MB. Formats: jpeg, jpg,
																	png. Put the main picture first</li>
															</ul>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="input-block m-0">
														<label
															class="custom_check d-inline-flex location-check m-0"><span>I
																Confirm Driver’s Age is above 20 years old</span>
															<input type="checkbox" name="remeber">
															<span class="checkmark"></span>
														</label>
													</div>
												</div>
											</div>
										</div>

										
									</div>
								</div>
								<div class="booking-information-card delivery-location">
									<div class="booking-info-head">
										<span><i class="bx bxs-car-garage"></i></span>
										<h5>Location</h5>
									</div>
									<div class="booking-info-body">
										<div class="form-custom">
											<label class="form-label">Delivery Location</label>
											<div class="d-flex align-items-center">
												<input type="text" name="del_location" class="form-control mb-3" placeholder="Add Location">
												
											</div>
										</div>
										<div class="form-custom">
											<label class="form-label">Return Location</label>
											<div class="d-flex align-items-center">
												<input type="text" name="r_location" class="form-control mb-0" placeholder="Add Location">
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="booking-information-card booking-type-card">
									<div class="booking-info-head">
										<span><i class="bx bxs-location-plus"></i></span>
										<h5>Booking Date & Time</h5>
									</div>
									<div class="booking-info-body">
										<div class="booking-timings">
											<div class="row">
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">Start Date</label>
														<div class="group-img">
															<input type="date" name="s_date" id="s_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block time-widge">
														<label class="form-label">Start Time</label>
														<div class="group-img">
															<input type="text" name="s_time" class="form-control timepicker"
																placeholder="Choose Time">
															<span class="input-cal-icon"><i
																	class="bx bx-time"></i></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block date-widget">
														<label class="form-label">Return Date</label>
														<div class="group-img">
															<input type="date" name="r_date" id="r_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="input-block time-widge">
														<label class="form-label">Return Time</label>
														<div class="group-img">
															<input type="text" name="r_time" class="form-control timepicker"
																placeholder="Choose Time">
															<span class="input-cal-icon"><i
																	class="bx bx-time"></i></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="booking-info-btns d-flex justify-content-end mb-4">
									
									<button class="btn btn-primary continue-book-btn" name="submit" type="submit">Confirm
										Booking & Make Payment</button>
								</div>
								</div>
								
							</form>
						</div>
						<div class="col-lg-4 theiaStickySidebar">
							<div class="booking-sidebar">
								<div class="booking-sidebar-card">
									<div class="accordion-item border-0 mb-4">
										<div class="accordion-header">
											<div class="accordion-button collapsed" role="button"
												data-bs-toggle="collapse" data-bs-target="#accordion_collapse_one"
												aria-expanded="true">
												<div class="booking-sidebar-head">
													<h5>Booking Details<i class="fas fa-chevron-down"></i></h5>
												</div>
											</div>
										</div>
										<div id="accordion_collapse_one" class="accordion-collapse collapse">
											<div class="booking-sidebar-body">
												<div class="booking-car-detail">
													<span class="car-img">
														<img src="https://acruae.com/wp-content/uploads/2025/07/G63-1.jpg"
															class="img-fluid" alt="Car">
													</span>
													<div class="care-more-info">
														<h5><?php echo $car['name'] ?></h5>
														<p>Dubai, UAE</p>
														<a href="listing-details.html">View Car Details</a>
													</div>
												</div>
												<div class="booking-vehicle-rates">
													<ul>
														<li>
															<div class="rental-charge">
																<h6>Rental Charges Rate <span> (1 day )</span></h6>
																<span class="text-danger">(This does not include
																	fuel)</span>
															</div>
															<h5>+ AED <?php echo $car['price'] ?></h5>
														</li>
														<li class="total-rate">
															<h6>Subtotal</h6>
															<h5>+AED <?php echo $car['price'] ?></h5>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="booking-sidebar-card">
									<div class="accordion-item border-0 mb-4">

										<div id="accordion_collapse_two" class="accordion-collapse collapse">
											<div class="booking-sidebar-body">
												<form
													action="https://dreamsrent.dreamstechnologies.com/html/template/booking-checkout.html">
													<div class="d-flex align-items-center">
														<div class="form-custom flex-fill">
															<input type="text" class="form-control mb-0"
																placeholder="Coupon code">
														</div>
														<button type="submit"
															class="btn btn-secondary apply-coupon-btn d-flex align-items-center ms-2">Apply<i
																class="feather-arrow-right ms-2"></i></button>
													</div>
												</form>

											</div>
										</div>
									</div>
								</div>
								<div class="total-rate-card">
									<div class="vehicle-total-price">
										<h5>Estimated Total</h5>
										<span>AED <?php echo $car['price'] ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Loader Overlay -->
<div id="loader-overlay" style="
    display:none;
    position:fixed;
    top:0;left:0;
    width:100%;height:100%;
    background:rgba(255,255,255,0.8);
    z-index:9999;
    text-align:center;
    align-items:center;
    justify-content:center;
">
    <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <p class="mt-2">Processing your booking, please wait...</p>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const loader = document.getElementById("loader-overlay");

    form.addEventListener("submit", function() {
        loader.style.display = "flex"; // Show loader
    });
});
</script>

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
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.7.1.min.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Aos -->
	<script src="assets/plugins/aos/aos.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Slick JS -->
	<script src="assets/plugins/slick/slick.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Rangeslider JS -->
	<script src="assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"
		type="54c1cf3de35bf616fff3067d-text/javascript"></script>
	<script src="assets/plugins/ion-rangeslider/js/custom-rangeslider.js"
		type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Datepicker Core JS -->
	<script src="assets/plugins/moment/moment.min.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Owl Carousel JS -->
	<script src="assets/js/owl.carousel.min.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Top JS -->
	<script src="assets/js/backToTop.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
		type="54c1cf3de35bf616fff3067d-text/javascript"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
		type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="54c1cf3de35bf616fff3067d-text/javascript"></script>

	<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
		data-cf-settings="54c1cf3de35bf616fff3067d-|49" defer></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
		integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
		data-cf-beacon='{"rayId":"96c79dbe7fa3f9f4","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}'
		crossorigin="anonymous"></script>
</body>

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/booking-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:39:42 GMT -->

</html>