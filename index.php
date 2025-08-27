<?php
include "connection.php";
// Fetch cars
$sql = "SELECT * FROM cars WHERE status='active' ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:31:09 GMT -->
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

		<!-- Banner -->
		<section class="banner-section banner-slider" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url('assets/nnn.jpeg') no-repeat center center/cover; min-height: 100vh; display: flex; align-items: center; text-align: center; color: #fff;">
    <div class="container">
        <div class="home-banner">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-down">
                    <p class="explore-text">
                        <span><i class="fa-solid fa-thumbs-up me-2"></i></span>
                        100% Trusted car rental platform in the World
                    </p>
                    <h1 style="color: white">
                        <span>Find Your Best</span> <br>									
                        Dream Car for Rental
                    </h1>
                    <p>
                        Experience the ultimate in comfort, performance, and sophistication with our luxury car rentals. 
                        From sleek sedans and stylish coupes to spacious SUVs and elegant convertibles, 
                        we offer a range of premium vehicles to suit your preferences and lifestyle.
                    </p>
                    <div class="view-all mt-3">
                        <a href="listing-grid.php" class="btn btn-view d-inline-flex align-items-center">
                            View all Cars <span><i class="feather-arrow-right ms-2"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</section>
<!-- /Banner -->
		
	
		<!-- services -->
		<section class="section services">
			<div class="service-right">
				<img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
			</div>		
			<div class="container">	
				<!-- Heading title-->
				<div class="section-heading" data-aos="fade-down">
					<h2>How It Works</h2>
					<p>Booking a car rental is a straightforward process that typically involves the following steps</p>
				</div>
				<!-- /Heading title -->
				<div class="services-work">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12 d-flex" data-aos="fade-down">
							<div class="services-group service-date flex-fill">
								<div class="services-icon border-secondary">
									<img class="icon-img bg-secondary" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
								</div>
								<div class="services-content">
									<h3>1. Choose Date &  Locations</h3>
									<p>Determine the date & location for your car rental. Consider factors such as your travel itinerary, pickup/drop-off locations (e.g., airport, city center), and duration of rental.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12 d-flex" data-aos="fade-down">
							<div class="services-group service-loc flex-fill">
								<div class="services-icon border-warning">
									<img class="icon-img bg-warning" src="assets/img/icons/services-icon-02.svg" alt="Choose Locations">
								</div>
								<div class="services-content">
									<h3>2. Pick-Up Locations</h3>
									<p>Check the availability of your desired vehicle type for your chosen dates and location. Ensure that the rental rates, taxes, fees, and any additional charges.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12 d-flex" data-aos="fade-down">
							<div class="services-group service-book flex-fill">
								<div class="services-icon border-dark">
									<img class="icon-img bg-dark" src="assets/img/icons/services-icon-03.svg" alt="Choose Locations">
								</div>
								<div class="services-content">
									<h3>3. Book your Car</h3>
									<p>Once you've found car rental option, proceed to make a reservation. Provide the required information, including your details, driver's license, contact info, and payment details.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /services -->

	
	
		<!-- Facts By The Numbers -->
		<section class="section facts-number">
			<div class="facts-left">
				<img src="assets/img/bg/facts-left.png" class="img-fluid" alt="facts left">
			</div>
			<div class="facts-right">
				<img src="assets/img/bg/facts-right.png" class="img-fluid" alt="facts right">
			</div>
			<div class="container">
				<!-- Heading title-->
				<div class="section-heading" data-aos="fade-down">
					<h2 class="title text-white">Facts By The Numbers</h2>
					<p class="description">Here are some dreamsrent interesting facts presented by the numbers</p>
				</div>
				<!-- /Heading title -->
				<div class="counter-group">
			        <div class="row">
						<div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="count-group flex-fill">
								<div class="customer-count d-flex align-items-center">
									<div class="count-img">
										<img src="assets/img/icons/bx-heart.svg" alt="Icon">
									</div>
									<div class="count-content">
										<h4><span class="counterUp">16</span>K+</h4>
										<p>Happy Customers</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="count-group flex-fill">
								<div class="customer-count d-flex align-items-center">
									<div class="count-img">
										<img src="assets/img/icons/bx-car.svg" alt="Icon">
									</div>
									<div class="count-content">
										<h4><span class="counterUp">2547</span>+</h4>
										<p>Count of Cars</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="count-group flex-fill">
								<div class="customer-count d-flex align-items-center">
									<div class="count-img">
										<img src="assets/img/icons/bx-headphone.svg" alt="Icon">
									</div>
									<div class="count-content">
										<h4><span class="counterUp">625</span>+</h4>
										<p>Car Center Solutions</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="count-group flex-fill">
								<div class="customer-count d-flex align-items-center">
									<div class="count-img">
										<img src="assets/img/icons/bx-history.svg" alt="Icon">
									</div>
									<div class="count-content">
										<h4><span class="counterUp">15000</span>+</h4>
										<p>Total Kilometer</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Facts By The Numbers -->

	   <!-- Rental deals -->
<section class="section popular-services">
    <div class="container">
        <!-- Heading title-->
        <div class="section-heading" data-aos="fade-down">
            <h2>Recommended Car Rental deals</h2>
            <p>Here are some versatile options that cater to different needs</p>
        </div>
        <!-- /Heading title -->

        <div class="row">
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

        <!-- View More -->
        <div class="view-all text-center" data-aos="fade-down">
            <a href="listing-grid.php" class="btn btn-view d-inline-flex align-items-center">
                Go to all Cars <span><i class="feather-arrow-right ms-2"></i></span>
            </a>
        </div>
        <!-- View More -->

    </div>
</section>
<!-- /Rental deals -->


		<!-- Why Choose Us -->
		<section class="section why-choose popular-explore">
			<div class="choose-left">
				<img src="assets/img/bg/choose-left.png" class="img-fluid" alt="Why Choose Us">
			</div>		
			<div class="container">	
				<!-- Heading title-->
				<div class="row">
					<div class="col-lg-4 mx-auto">
						<div class="section-heading" data-aos="fade-down">
							<h2>Why Choose Us</h2>
							<p>We are innovative and passionate about the work we do. </p>
						</div>
					</div>
				</div>
				<!-- /Heading title -->
				<div class="why-choose-group">
			        <div class="row">
						<div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="choose-img choose-black">
										<img src="assets/img/icons/bx-selection.svg" alt="Icon">
									</div>
									<div class="choose-content">
										<h4>Easy & Fast Booking</h4>
										<p>Completely carinate e business testing process whereas fully researched customer service. Globally extensive content with quality.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="choose-img choose-secondary">
										<img src="assets/img/icons/bx-crown.svg" alt="Icon">
									</div>
									<div class="choose-content">
										<h4>Many Pickup Location</h4>
										<p>Enthusiastically magnetic initiatives with cross-platform sources. Dynamically target testing procedures through effective.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="choose-img choose-primary">
										<img src="assets/img/icons/bx-user-check.svg" alt="Icon">
									</div>
									<div class="choose-content">
										<h4>Customer Satisfaction</h4>
										<p>Globally user centric method interactive. Seamlessly revolutionize unique portals orporate collaboration.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Why Choose Us -->

	<!-- About us Testimonials -->
<section class="section about-testimonial testimonials-section">
    <div class="container">
        <!-- Heading title-->
        <div class="section-heading" data-aos="fade-down">
            <h2 class="title text-white">What People Say About Us? </h2>
            <p class="description text-white">Hear from customers who rented cars with us across the UAE</p>
        </div>
        <!-- /Heading title -->
        <div class="owl-carousel about-testimonials testimonial-group mb-0 owl-theme">

            <!-- Carousel Item -->
            <div class="testimonial-item d-flex">							
                <div class="card flex-fill">
                    <div class="card-body">								
                        <div class="quotes-head"></div>
                        <div class="review-box">
                            <div class="review-profile">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img">
                                </div>															
                            </div>
                            <div class="review-details">
                                <h6>Ahmed Al Mansoori</h6>
                                <p>Dubai, UAE</p>												
                            </div>
                        </div>									
                        <p>Excellent service! The booking was simple, and the car was delivered right to my hotel in Downtown Dubai. It was spotless, fuel-efficient, and perfect for getting around the city.</p>
                        <div class="list-rating">
                            <div class="list-rating-star">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <p><span>(5.0)</span></p>
                        </div>							
                    </div>
                </div>
            </div>
            <!-- /Carousel Item  -->

            <!-- Carousel Item -->
            <div class="testimonial-item d-flex">							
                <div class="card flex-fill">
                    <div class="card-body">								
                        <div class="quotes-head"></div>
                        <div class="review-box">
                            <div class="review-profile">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-03.jpg" class="img-fluid" alt="img">
                                </div>															
                            </div>
                            <div class="review-details">
                                <h6>Olivia Carter</h6>
                                <p>London, UK</p>												
                            </div>
                        </div>									
                        <p>I travel to Abu Dhabi frequently for work and always rent from here. They have a great range of luxury and economy cars, and their team is always on time for delivery and pickup.</p>
                        <div class="list-rating">
                            <div class="list-rating-star">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <p><span>(5.0)</span></p>
                        </div>							
                    </div>
                </div>
            </div>
            <!-- /Carousel Item  -->

            <!-- Carousel Item -->
            <div class="testimonial-item d-flex">							
                <div class="card flex-fill">
                    <div class="card-body">								
                        <div class="quotes-head"></div>
                        <div class="review-box">
                            <div class="review-profile">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-04.jpg" class="img-fluid" alt="img">
                                </div>															
                            </div>
                            <div class="review-details">
                                <h6>Ravi Sharma</h6>
                                <p>Mumbai, India</p>													
                            </div>
                        </div>									
                        <p>We rented an SUV for our Dubai to Ras Al Khaimah trip. The car was in excellent condition, and the whole family enjoyed a comfortable ride across the UAE. Highly recommended!</p>	
                        <div class="list-rating">
                            <div class="list-rating-star">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <p><span>(5.0)</span></p>
                        </div>						
                    </div>
                </div>
            </div>
            <!-- /Carousel Item  -->

            <!-- Carousel Item -->
            <div class="testimonial-item d-flex">							
                <div class="card flex-fill">
                    <div class="card-body">								
                        <div class="quotes-head"></div>
                        <div class="review-box">
                            <div class="review-profile">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-06.jpg" class="img-fluid" alt="img">
                                </div>															
                            </div>
                            <div class="review-details">
                                <h6>Fatima Al Nuaimi</h6>
                                <p>Sharjah, UAE</p>											
                            </div>
                        </div>									
                        <p>I booked a car for a weekend in Fujairah, and it was delivered on time to my doorstep. The rental process was smooth, and the prices were very reasonable for UAE standards.</p>	
                        <div class="list-rating">
                            <div class="list-rating-star">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <p><span>(5.0)</span></p>
                        </div>						
                    </div>
                </div>
            </div>
            <!-- /Carousel Item  -->

            <!-- Carousel Item -->
            <div class="testimonial-item d-flex">							
                <div class="card flex-fill">
                    <div class="card-body">								
                        <div class="quotes-head"></div>
                        <div class="review-box">
                            <div class="review-profile">
                                <div class="review-img">
                                    <img src="assets/img/profiles/avatar-07.jpg" class="img-fluid" alt="img">
                                </div>															
                            </div>
                            <div class="review-details">
                                <h6>James Wilson</h6>
                                <p>Toronto, Canada</p>																	
                            </div>
                        </div>									
                        <p>Rented a convertible to drive along Jumeirah Beach Road — what an amazing experience! The car looked brand new, and the team made pickup and return extremely convenient.</p>	
                        <div class="list-rating">
                            <div class="list-rating-star">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <p><span>(5.0)</span></p>
                        </div>	
                    </div>
                </div>
            </div>
            <!-- /Carousel Item  -->
        </div>
    </div>
</section>
<!-- About us Testimonials -->


		<!-- FAQ  -->
		<section class="section faq-section bg-light-primary">
			<div class="container">				
				<!-- Heading title-->
				<div class="section-heading" data-aos="fade-down">
					<h2>Frequently Asked Questions </h2>
					<p>Find answers to your questions from our previous answers</p>
				</div>
				<!-- /Heading title -->
				<div class="faq-info">
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapseds" data-bs-toggle="collapse" href="#faqOne" aria-expanded="true">How old do I need to be to rent a car?</a>
						</h4>
						<div id="faqOne" class="card-collapse collapse show">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>	
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqTwo" aria-expanded="false">What documents do I need to rent a car?</a>
						</h4>
						<div id="faqTwo" class="card-collapse collapse">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqThree" aria-expanded="false">What types of vehicles are available for rent?</a>
						</h4>
						<div id="faqThree" class="card-collapse collapse">
							<p>We offer a diverse fleet of vehicles to suit every need, including compact cars, sedans, SUVs and luxury vehicles. You can browse our selection online or contact us for assistance in choosing the right vehicle for you</p>
						</div>
					</div>	
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqFour" aria-expanded="false">Can I rent a car with a debit card?</a>
						</h4>
						<div id="faqFour" class="card-collapse collapse">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>	
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqFive" aria-expanded="false">What is your fuel policy?</a>
						</h4>
						<div id="faqFive" class="card-collapse collapse">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>	
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqSix" aria-expanded="false">Can I add additional drivers to my rental agreement?</a>
						</h4>
						<div id="faqSix" class="card-collapse collapse">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>	
					<div class="faq-card bg-white" data-aos="fade-down">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqSeven" aria-expanded="false">What happens if I return the car late?</a>
						</h4>
						<div id="faqSeven" class="card-collapse collapse">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>													
				</div>		
		    </div>	
		</section>	
		<!-- /FAQ -->

	
	

		 <!-- Footer -->
		 <?php include('includes/footer.php') ?>
		<!-- /Footer -->	
		
	</div>

	<!-- scrollToTop start -->
	<div class="progress-wrap active-progress">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
		</svg>
	</div>
	<!-- scrollToTop end -->
	
	<?php include('includes/script.php') ?>
	
</body>

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:33:41 GMT -->
</html>