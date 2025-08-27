<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/listing-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:38:31 GMT -->
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
	
	<div class="main-wrapper listing-page">
	
			<!-- Header -->
		  <?php include('includes/header.php') ?>
		<!-- /Header -->

		
		<!-- Breadscrumb Section -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row align-items-center text-center">
		    		<div class="col-md-12 col-12">
			    	    <h2 class="breadcrumb-title">Our Cars</h2>
				    	
						</nav>							
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadscrumb Section -->
<?php
include "connection.php";
// Fetch all cars
$sql = "SELECT * FROM cars WHERE status='active' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!-- Car Grid View -->
<section class="section car-listing pt-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <?php while($row = $result->fetch_assoc()): ?>
                    <!-- col -->
                    <div class="col-xxl-4 col-lg-4 col-md-6 col-12">
                        <div class="listing-item">											
                            <div class="listing-img">

                                <!-- Image Slider -->
                                <div class="img-slider owl-carousel">
                                    <?php 
                                    for($i=1; $i<=6; $i++):
                                        $img = $row["img$i"];
                                        if(!empty($img)):
                                    ?>
                                        <div class="slide-images">
                                            <a href="listing-details.php?id=<?php echo $row['id']; ?>">
                                                <img src="admin/<?php echo $img; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                                            </a>
                                        </div>
                                    <?php 
                                        endif;
                                    endfor;
                                    ?>
                                </div>

                                <div class="fav-item justify-content-end">
                                    <span class="img-count"><i class="feather-image"></i>
                                        <?php 
                                            $imgCount = 0; 
                                            for($i=1;$i<=6;$i++){ if(!empty($row["img$i"])) $imgCount++; } 
                                            echo str_pad($imgCount,2,"0",STR_PAD_LEFT);
                                        ?>
                                    </span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>										
                                </div>	
                                <span class="featured-text"><?php echo $row['brand']; ?></span>
                            </div>										

                            <div class="listing-content">
                                <div class="listing-features d-flex align-items-end justify-content-between">
                                    <div class="list-rating">
                                        <h3 class="listing-title">
                                            <a href="listing-details.php?id=<?php echo $row['id']; ?>">
                                                <?php echo $row['name']?>
                                            </a>
                                        </h3>																	  
                                        <div class="list-rating">							
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span>(4.0) 170 Reviews</span>
                                        </div>
                                    </div>
                                </div> 

                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Transmission"></span>
                                            <p><?php echo $row['transmission']; ?></p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="KM"></span>
                                            <p><?php echo $row['mileage']; ?> KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Fuel"></span>
                                            <p><?php echo $row['fuel']; ?></p>
                                        </li>
                                    </ul>	
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Type"></span>
                                            <p><?php echo $row['car_type']; ?></p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="Year"></span>
                                            <p><?php echo $row['year']; ?></p>	
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p><?php echo $row['passengers']; ?> Persons</p>
                                        </li>
                                    </ul>
                                </div>																 

                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <h6 style="text-align: center;">AED <?php echo $row['price']; ?> <span>/ Day</span></h6>
                                    </div>
                                </div>

                                <div class="listing-button">
                                    <a href="listing-details.php?id=<?php echo $row['id']; ?>" class="btn btn-order">
                                        <span><i class="feather-calendar me-2"></i></span>Rent Now
                                    </a>
                                </div>	
                            </div>
                        </div>				 
                    </div>
                    <!-- /col -->
                    <?php endwhile; ?>

                </div>	

              
            </div>
        </div>		
    </div>	
</section>	
<!-- /Car Grid View -->

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

<!-- Mirrored from dreamsrent.dreamstechnologies.com/html/template/listing-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Aug 2025 13:38:40 GMT -->
</html>