<?php
include "connection.php";
// Fetch single car details
// Fetch cars
$sql = "SELECT * FROM cars ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

$id = $_GET['id'];
$sql = "SELECT * FROM cars WHERE id=$id";
$res = $conn->query($sql);
$car = $res->fetch_assoc();

// Images loop
$images = [];
for ($i=1; $i<=6; $i++) {
    if (!empty($car["img$i"])) {
        $images[] = $car["img$i"];
    }
}

// Extra services loop (comma separated string → array)
$extraServices = [];
if (!empty($car['ex_services'])) {
    $extraServices = explode(",", $car['ex_services']);
}

// Convert features string to array
$features = [];
if (!empty($car['features'])) {
    $features = explode(",", $car['features']); // split by comma
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/listing-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:38:51 GMT -->

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
                        <h2 class="breadcrumb-title">
                            <?php echo $car['name'] ?>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadscrumb Section -->

        <!-- Detail Page Head-->
        <section class="product-detail-head">
            <div class="container">
                <div class="detail-page-head">
                    <div class="detail-headings">
                        <div class="star-rated">
                            <ul class="list-rating">
                                <li>
                                    <div class="car-brand">
                                        <span>
                                            <img src="assets/img/icons/car-icon.svg" alt="img">
                                        </span>
                                        <?php echo $car['brand'] ?>
                                    </div>
                                </li>
                                <li>
                                    <span class="year">
                                        <?php echo $car['year'] ?>
                                    </span>
                                </li>
                                <li class="ratings">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-list-rating">(5.0)</span>
                                </li>
                            </ul>
                            <div class="camaro-info">
                                <h3>
                                    <?php echo $car['name'] ?>
                                </h3>

                            </div>

                        </div>
                    </div>
                    <div class="details-btn">
                        <!-- <a href="#"> <i class='bx bx-git-compare'></i>Compare</a> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Detail Page Head-->

        <section class="section product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">


                        <div class="detail-product">
                            <!-- Delivery Options -->
                            <div class="pro-info">
                                <ul>
                                    <?php if(!empty($car['delivery_airport'])): ?>
                                    <li class="del-airport"><i class="fa-solid fa-check"></i> Airport Delivery</li>
                                    <?php endif; ?>
                                    <?php if(!empty($car['delivery_home'])): ?>
                                    <li class="del-home"><i class="fa-solid fa-check"></i> Home Delivery</li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <!-- Main Slider -->
                            <div class="slider detail-bigimg">
                                <?php foreach($images as $img): ?>
                                <div class="product-img">
                                    <img src="admin/<?php echo $img; ?>" alt="Slider">
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Thumbnail Nav -->
                            <div class="slider slider-nav-thumbnails">
                                <?php foreach($images as $img): ?>
                                <div>
                                    <img src="admin/<?php echo $img; ?>" alt="product image">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Extra Services -->
                        <div class="review-sec pb-0">
                            <div class="review-header">
                                <h4>Extra Service</h4>
                            </div>
                            <div class="lisiting-service">
                                <div class="row">
                                    <?php 
            $icons = [
                "GPS Navigation Systems" => "service-01.svg",
                "Wi-Fi Hotspot" => "service-02.svg",
                "Child Safety Seats" => "service-03.svg",
                "Fuel Options" => "service-04.svg",
                "Roadside Assistance" => "service-05.svg",
                "Satellite Radio" => "service-06.svg",
                "Additional Accessories" => "service-07.svg",
                "Express Check-in/out" => "service-08.svg"
            ];
            
            foreach($extraServices as $srv): 
                $srv = trim($srv); 
                $icon = isset($icons[$srv]) ? $icons[$srv] : "service-07.svg"; 
            ?>
                                    <div class="servicelist d-flex align-items-center col-xxl-3 col-xl-4 col-sm-6">
                                        <div class="service-img" style="background: #127384; color: white">
                                            <i class="bx bx-check-double"></i>
                                        </div>
                                        <div class="service-info" style="font-size: 20px">
                                            <p>
                                                <?php echo htmlspecialchars($srv); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>


                        <!-- Specifications -->
                        <div class="review-sec specification-card ">
                            <div class="review-header">
                                <h4>Specifications</h4>
                            </div>
                            <div class="card-body">
                                <div class="lisiting-featues">
                                    <div class="row">
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-1.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Car Type </span>
                                                <h6>
                                                    <?php echo $car['car_type'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-2.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Model </span>
                                                <h6>
                                                    <?php echo $car['model'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-3.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Transmission </span>
                                                <h6>
                                                    <?php echo $car['transmission'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-4.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Fuel Type </span>
                                                <h6>
                                                    <?php echo $car['fuel'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-5.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Mileage </span>
                                                <h6>
                                                    <?php echo $car['mileage'] ?>KM
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-9.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Brand </span>
                                                <h6>
                                                    <?php echo $car['brand'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-7.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Year</span>
                                                <h6>
                                                    <?php echo $car['year'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-8.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>AC </span>
                                                <h6> Air Condition</h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-9.svg" alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>VIN </span>
                                                <h6>
                                                    <?php echo $car['vin'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-10.svg"
                                                    alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Door </span>
                                                <h6>
                                                    <?php echo $car['doors'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-11.svg"
                                                    alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Seats </span>
                                                <h6>
                                                    <?php echo $car['seats'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="featureslist d-flex align-items-center col-xl-3 col-md-4 col-sm-6">
                                            <div class="feature-img">
                                                <img src="assets/img/specification/specification-icon-12.svg"
                                                    alt="Icon">
                                            </div>
                                            <div class="featues-info">
                                                <span>Color </span>
                                                <h6>
                                                    <?php echo $car['color'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Specifications -->

                        <!-- Car Features -->
                        <div class="review-sec listing-feature">
                            <div class="review-header">
                                <h4>Car Features</h4>
                            </div>
                            <div class="listing-description">
                                <div class="row">
                                    <?php 
            $count = 0;
            foreach ($features as $feature) {
                echo '<div class="col-md-4 mb-2">
                        <div class="d-flex align-items-center">
                            <span class="me-2 text-light"><i style="height: 17px; width: 17px; border-radius: 50%; background: #127384" class="bx bx-check-double"></i></span> 
                            ' . htmlspecialchars(trim($feature)) . '
                        </div>
                      </div>';
                $count++;
            }
            ?>
                                </div>
                            </div>
                        </div>
                        <!-- /Car Features -->



                        <!-- Gallery -->
                        <div class="review-sec mb-0 pb-0">
                            <div class="review-header">
                                <h4>Gallery</h4>
                            </div>
                            <div class="gallery-list">
                                <ul>
                                    <?php 
    // loop from img1 to img6
    for ($i = 1; $i <= 4; $i++) {
        if (!empty($car["img$i"])) { // show only if image exists
            echo '
            <li>
                <div class="gallery-widget">
                    <a href="admin/' . $car["img$i"] . '" data-fancybox="gallery1">
                        <img style="height: 100px" class="img-fluid" alt="Image" src="admin/' . $car["img$i"] . '">
                    </a>
                </div>
            </li>';
        }
    }
    ?>
                                </ul>

                            </div>
                        </div>
                        <!-- /Gallery -->


                        <!-- FAQ -->
                        <!-- <div class="review-sec faq-feature">
                            <div class="review-header">
                                <h4>FAQ’s</h4>
                            </div>
                            <div class="faq-info">
								<div class="faq-card">
									<h4 class="faq-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#faqOne" aria-expanded="false">How old do I need to be to rent a car?</a>
									</h4>
									<div id="faqOne" class="card-collapse collapse">
										<p>We offer a diverse fleet of vehicles to suit every need, including compact cars, sedans, SUVs and luxury vehicles. You can browse our selection online or contact us for assistance in choosing the right vehicle for you</p>
									</div>
								</div>	
								<div class="faq-card">
									<h4 class="faq-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#faqTwo" aria-expanded="false">What documents do I need to rent a car?</a>
									</h4>
									<div id="faqTwo" class="card-collapse collapse">
										<p>We offer a diverse fleet of vehicles to suit every need, including compact cars, sedans, SUVs and luxury vehicles. You can browse our selection online or contact us for assistance in choosing the right vehicle for you</p>
									</div>
								</div>
								<div class="faq-card">
									<h4 class="faq-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#faqThree" aria-expanded="false">What types of vehicles are available for rent?</a>
									</h4>
									<div id="faqThree" class="card-collapse collapse">
										<p>We offer a diverse fleet of vehicles to suit every need, including compact cars, sedans, SUVs and luxury vehicles. You can browse our selection online or contact us for assistance in choosing the right vehicle for you</p>
									</div>
								</div>	
								<div class="faq-card">
									<h4 class="faq-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#faqFour" aria-expanded="false">Can I rent a car with a debit card?</a>
									</h4>
									<div id="faqFour" class="card-collapse collapse">
										<p>We offer a diverse fleet of vehicles to suit every need, including compact cars, sedans, SUVs and luxury vehicles. You can browse our selection online or contact us for assistance in choosing the right vehicle for you</p>
									</div>
								</div>													
							</div>	
                        </div> -->
                        <!-- /FAQ -->

                        <!-- Policies -->
                        <!-- <div class="review-sec">
                            <div class="review-header">
                                <h4>Policies</h4>
                            </div>
                            <div class="policy-list">
                                <div class="policy-item">
                                	<div class="policy-info">
                                		<h6>Cancellation Charges</h6>
                                		<p>Cancellation charges will be applied as per the policy</p>
                                	</div>
                                	<a href="privacy-policy.html">Know More</a>
                                </div>
                                <div class="policy-item">
                                	<div class="policy-info">
                                		<h6>Policy</h6>
                                		<p>I hereby agree to the terms and conditions of the Lease Agreement with Host</p>
                                	</div>
                                	<a href="privacy-policy.html">View Details</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- /Policies -->

                        <!-- Leave a Reply -->

                    </div>
                    <div class="col-lg-4 theiaStickySidebar">
                        <div class="review-sec mt-0">
                            <div class="review-header">
                                <h4>Pricing</h4>
                            </div>
                            <div class="mb-3">
                                <label class="booking_custom_check bookin-check-2">
                                    <input type="radio" name="price_rate" checked="">
                                    <span class="booking_checkmark">
                                        <span class="checked-title">Daily</span>
                                        <span class="price-rate">AED
                                            <?php echo $car['price'] ?>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="location-content">
                                <div class="delivery-tab">
                                    <ul class="nav">
                                        <li>
                                            <label class="booking_custom_check">
                                                <input type="radio" name="rent_type" checked="">
                                                <span class="booking_checkmark">
                                                    <span class="checked-title">Delivery</span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="booking_custom_check">
                                                <input type="radio" name="rent_type">
                                                <span class="booking_checkmark">
                                                    <span class="checked-title">Self Pickup</span>
                                                </span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="delivery">
                                        <form class="">
                                            <ul>
                                                <li class="column-group-last">
                                                    <div class="input-block mb-0">
                                                        <div class="search-btn">
                                                            <a href="booking-checkout.php?id=<?php echo $car['id']?>"
                                                                class="btn btn-primary check-available w-100">Book
                                                                Now</a>
                                                            <!-- <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#enquiry" class="btn btn-theme"><i class="feather-phone-call" style="margin-right: 10px"></i>Whatsapp</a> -->
                                                            <a href="https://api.whatsapp.com/send?phone=0506791925" target="_blank"
                                                                class="btn btn-success check-available w-100"><i
                                                                    class="feather-phone-call"
                                                                    style="margin-right: 10px"></i>Whatsapp</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pickup">
                                        <form class="">
                                            <ul>
                                                <li class="column-group-main">
                                                    <div class="input-block">
                                                        <label>Delivery Location</label>
                                                        <div class="group-img">
                                                            <select class="select">
                                                                <option>Newyork Office - 78, 10th street Laplace USA
                                                                </option>
                                                                <option>Newyork Office - 12, 5th street USA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="column-group-main">
                                                    <div class="input-block">
                                                        <label
                                                            class="custom_check d-inline-flex location-check m-0"><span>Return
                                                                to same location</span>
                                                            <input type="checkbox" name="remeber">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="column-group-main">
                                                    <div class="input-block">
                                                        <label>Delivery Location</label>
                                                        <div class="group-img">
                                                            <select class="select">
                                                                <option>Newyork Office - 78, 10th street Laplace USA
                                                                </option>
                                                                <option>Newyork Office - 12, 5th street USA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="column-group-main">
                                                    <div class="input-block">
                                                        <label>Return Location</label>
                                                        <div class="group-img">
                                                            <div class="form-wrap">
                                                                <input type="text" class="form-control"
                                                                    placeholder="78, 10th street Laplace USA">
                                                                <span class="form-icon">
                                                                    <i class="fa-solid fa-location-crosshairs"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="column-group-main">
                                                    <div class="input-block m-0">
                                                        <label>Pickup Date</label>
                                                    </div>
                                                    <div class="input-block-wrapp sidebar-form">
                                                        <div class="input-block  me-lg-2">
                                                            <div class="group-img">
                                                                <div class="form-wrap">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker"
                                                                        placeholder="04/11/2023">
                                                                    <span class="form-icon">
                                                                        <i class="fa-regular fa-calendar-days"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-block">
                                                            <div class="group-img">
                                                                <div class="form-wrap">
                                                                    <input type="text" class="form-control timepicker"
                                                                        placeholder="11:00 AM">
                                                                    <span class="form-icon">
                                                                        <i class="fa-regular fa-clock"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="column-group-main">
                                                    <div class="input-block m-0"> <label>Return Date</label>
                                                    </div>
                                                    <div class="input-block-wrapp sidebar-form">
                                                        <div class="input-block me-2">
                                                            <div class="group-img">
                                                                <div class="form-wrap">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker"
                                                                        placeholder="04/11/2023">
                                                                    <span class="form-icon">
                                                                        <i class="fa-regular fa-calendar-days"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-block">
                                                            <div class="group-img">
                                                                <div class="form-wrap">
                                                                    <input type="text" class="form-control timepicker"
                                                                        placeholder="11:00 AM">
                                                                    <span class="form-icon">
                                                                        <i class="fa-regular fa-clock"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="column-group-last">
                                                    <div class="input-block mb-0">
                                                        <div class="search-btn">
                                                            <a href="booking-checkout.php"
                                                                class="btn btn-primary check-available w-100">Book</a>
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#enquiry" class="btn btn-theme">Enquire
                                                                Us</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="review-sec extra-service mt-0">-->
                        <!--    <div class="review-header">-->
                        <!--        <h4>Listing Owner Details</h4>-->
                        <!--    </div>-->
                        <!--    <div class="owner-detail">-->
                        <!--        <div class="owner-img">-->
                        <!--            <a href="#"><img src="assets/img/profiles/avatar-07.jpg" alt="User"></a>-->
                        <!--            <span class="badge-check"><img src="assets/img/icons/badge-check.svg" alt="User"></span>-->
                        <!--        </div>-->
                        <!--        <div class="reviewbox-list-rating">-->
                        <!--            <h5><a>Brooklyn Cars</a></h5>-->
                        <!--            <p>-->
                        <!--                <i class="fas fa-star filled"></i>-->
                        <!--                <i class="fas fa-star filled"></i>-->
                        <!--                <i class="fas fa-star filled"></i>-->
                        <!--                <i class="fas fa-star filled"></i>-->
                        <!--                <i class="fas fa-star filled"></i>	-->
                        <!--                <span> (5.0)</span> -->
                        <!--            </p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <ul class="booking-list">-->
                        <!--        <li>-->
                        <!--            Email-->
                        <!--            <span><a href="https://dreamsrent.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0d64636b624d68756c607d6168236e6260">[email&#160;protected]</a></span>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            Phone Number-->
                        <!--            <span>+1 14XXX XXX78</span>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            Location-->
                        <!--            <span>4635 Pheasant Ridge Road, City Hollywood, USA</span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--    <div class="message-btn">-->
                        <!--        <a href="#" class="btn btn-order">Message to owner</a>-->
                        <!--        <a href="#" class="chat-link"><i class="fa-brands fa-whatsapp"></i>Chat Via Whatsapp</a>-->
                        <!--    </div>	-->
                        <!--</div>-->
                        <!--<div class="review-sec share-car mt-0">-->
                        <!--    <div class="review-header">-->
                        <!--        <h4>View Car Location</h4>-->
                        <!--    </div>-->
                        <!--    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-123.80081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1669181581381!5m2!1sen!2sin" class="iframe-video"></iframe>-->
                        <!--</div>-->
                        <!--<div class="review-sec share-car mt-0 mb-0">-->
                        <!--    <div class="review-header">-->
                        <!--        <h4>Share</h4>-->
                        <!--    </div>-->
                        <!--    <ul class="nav-social">-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fa-brands fa-facebook-f fa-facebook fi-icon"></i></a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fab fa-instagram fi-icon"></i></a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fab fa-behance fi-icon"></i></a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fa-brands fa-pinterest-p fi-icon"></i></a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fab fa-twitter fi-icon"></i> </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="javascript:void(0)"><i class="fab fa-linkedin fi-icon"></i></a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="details-car-grid">
                            <div class="details-slider-heading">
                                <h3>You May be Interested in</h3>
                            </div>
                            <div class="popular-slider-group">
                <div class="owl-carousel rental-deal-slider owl-theme">

                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="rental-car-item">
                        <div class="listing-item mb-0">
                            <div class="listing-img">
                                <?php if(!empty($row['img1'])): ?>
                                    <a href="listing-details.php?id=<?php echo $row['id']; ?>">
                                        <img src="admin/<?php echo $row['img1']; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                                    </a>
                                <?php endif; ?>

                                <div class="fav-item justify-content-end">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="listing-content">
                                <div class="listing-features">
                                    <div class="fav-item-rental">
                                        <div class="featured-text">
                                            AED <?php echo $row['price']; ?><span>/day</span>
                                        </div>
                                    </div>

                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>

                                    <h3 class="listing-title">
                                        <a href="listing-details.php?id=<?php echo $row['id']; ?>">
                                            <?php echo $row['name'] ?>
                                        </a>
                                    </h3>
                                </div>

                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p><?php echo $row['transmission']; ?></p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="Odometer"></span>
                                            <p><?php echo $row['mileage']; ?> KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Fuel"></span>
                                            <p><?php echo $row['fuel']; ?></p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p><?php echo $row['car_type']; ?></p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-07.svg" alt="Year"></span>
                                            <p>AC</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p><?php echo $row['passengers']; ?> Persons</p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="listing-button">
                                    <a href="listing-details.php?id=<?php echo $row['id']; ?>" class="btn btn-order">
                                        <span><i class="feather-calendar me-2"></i></span>Rent Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal custom-modal fade check-availability-modal" id="pages_edit" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0 text-dark fw-bold">Availability Details</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span class="align-center" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="available-for-ride">
                                    <p><i class="fa-regular fa-circle-check"></i>2025 Mercedes G63 is available for a
                                        ride</p>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="row booking-info">
                                    <div class="col-md-4 pickup-address">
                                        <h5>Pickup</h5>
                                        <p>45, 4th Avanue Mark Street USA</p>
                                        <span>Date & time : 11 Jan 2023</span>
                                    </div>
                                    <div class="col-md-4 drop-address">
                                        <h5>Drop Off</h5>
                                        <p>78, 10th street Laplace USA</p>
                                        <span>Date & time : 11 Jan 2023</span>
                                    </div>
                                    <div class="col-md-4 booking-amount">
                                        <h5>Booking Amount</h5>
                                        <h6><span>$300 </span> /day</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="booking-info seat-select">
                                    <h6>Extra Service</h6>
                                    <label class="custom_check">
                                        <input type="checkbox" name="rememberme" class="rememberme">
                                        <span class="checkmark"></span>
                                        Baby Seat - <span class="ms-2">$10</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="booking-info pay-amount">
                                    <h6>Deposit Option</h6>
                                    <div class="radio radio-btn">
                                        <label>
                                            <input type="radio" name="radio"> Pay Deposit
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="radio"> Full Amount
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="booking-info service-tax">
                                    <ul>
                                        <li>Booking Price <span>$300</span></li>
                                        <li>Extra Service <span>$10</span></li>
                                        <li>Tax <span>$5</span></li>
                                    </ul>
                                </div>
                                <div class="grand-total">
                                    <h5>Grand Total</h5>
                                    <span>$315</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="booking.php" class="btn btn-back">Go to Details<i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->

        <!-- Custom Date Modal -->
        <div class="modal new-modal fade enquire-mdl" id="enquiry" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enquiry</h4>
                        <button type="button" class="close-btn" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="https://dreamsrent.dreamstechnologies.com/html/template/listing-details.html"
                            class="enquire-modal">
                            <div class="booking-header">
                                <div class="booking-img-wrap">
                                    <div class="book-img">
                                        <img src="assets/img/cars/car-05.jpg" alt="img">
                                    </div>
                                    <div class="book-info">
                                        <h6>2025 Mercedes G63</h6>
                                        <p><i class="feather-map-pin"></i> Location : Miami St, Destin, FL 32550, USA
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="modal-form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="modal-form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="modal-form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <label class="custom_check w-100">
                                <input type="checkbox" name="username">
                                <span class="checkmark"></span> I Agree with <a href="javascript:void(0);">Terms of
                                    Service</a> & <a href="javascript:void(0);">Privacy Policy</a>
                            </label>
                            <div class="modal-btn modal-btn-sm">
                                <button type="submit" class="btn btn-primary w-100">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Custom Date Modal -->

        <!-- Custom Date Modal -->
        <div class="modal new-modal fade enquire-mdl" id="fare_details" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Fare Details</h4>
                        <button type="button" class="close-btn" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="enquire-modal">
                            <div class="booking-header fare-book">
                                <div class="booking-img-wrap">
                                    <div class="book-img">
                                        <img src="assets/img/cars/car-05.jpg" alt="img">
                                    </div>
                                    <div class="book-info">
                                        <h6>2025 Mercedes G63</h6>
                                        <p><i class="feather-map-pin"></i> Location : Miami St, Destin, FL 32550, USA
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="fare-table">
                                <div class="table-responsive">
                                    <table class="table table-center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Doorstep delivery <span>(1 day )</span>
                                                    <p class="text-danger">(This does not include fuel)</p>
                                                </td>
                                                <td>
                                                    <select class="select">
                                                        <option>Per Day</option>
                                                        <option>Per Hr</option>
                                                    </select>
                                                </td>
                                                <td class="amt text-end">+ $300</td>
                                            </tr>
                                            <tr>
                                                <td>Door delivery & Pickup</td>
                                                <td colspan="2" class="amt text-end"> + $60</td>
                                            </tr>
                                            <tr>
                                                <td>Trip Protection Fees</td>
                                                <td colspan="2" class="amt text-end"> + $25</td>
                                            </tr>
                                            <tr>
                                                <td>Convenience Fees</td>
                                                <td colspan="2" class="amt text-end"> + $2</td>
                                            </tr>
                                            <tr>
                                                <td>Tax</td>
                                                <td colspan="2" class="amt text-end"> + $2</td>
                                            </tr>
                                            <tr>
                                                <td>Refundable Deposit</td>
                                                <td colspan="2" class="amt text-end">+$1200</td>
                                            </tr>
                                            <tr>
                                                <th>Subtotal</th>
                                                <th colspan="2" class="amt text-end">+$1604</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-btn modal-btn-sm">
                                <a href="booking-checkout.php" class="btn btn-primary w-100">
                                    Continue to Booking
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Custom Date Modal -->

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
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.7.1.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Aos -->
    <script src="assets/plugins/aos/aos.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Datepicker Core JS -->
    <script src="assets/plugins/moment/moment.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Slick JS -->
    <script src="assets/plugins/slick/slick.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Top JS -->
    <script src="assets/js/backToTop.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Sticky Sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
        type="f4c2bdbc445493466ac47b3f-text/javascript"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
        type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Fancybox JS -->
    <script src="assets/plugins/fancybox/fancybox.umd.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js" type="f4c2bdbc445493466ac47b3f-text/javascript"></script>

    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="f4c2bdbc445493466ac47b3f-|49" defer></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"96c79d626ae4f9e1","version":"2025.7.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/listing-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:39:32 GMT -->

</html>