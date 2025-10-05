<?php
include 'session_active.php';
$_SESSION['category'] = 'Utilized';
$_SESSION['product'] = 'products';

include '../db/DBcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Products - Agro Vista</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <!-- Custom CSS for Product Links -->
  <style>
    .product-link {
      text-decoration: none;
      color: inherit;
      display: block;
      transition: transform 0.3s ease;
    }
    
    .product-link:hover {
      text-decoration: none;
      color: inherit;
      transform: translateY(-5px);
    }
    
    .container1 {
      position: relative;
      cursor: pointer;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }
    
    .container1:hover {
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }
    
    .container1 .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: .5s ease;
      backface-visibility: hidden;
    }
    
    .container1 .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
    
    .container1:hover .image {
      opacity: 0.3;
    }
    
    .container1:hover .middle {
      opacity: 1;
    }
    
    .container1 .text {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      font-weight: bold;
      padding: 16px 32px;
      border-radius: 5px;
    }

    .gallery {
  overflow: hidden;
  height: 100vh;
  display: flex;
  position: relative;
}
.gallery .imgWrap {
  cursor: pointer;
  flex: 1;
  min-width: 0;
  height: 100%;
  overflow: hidden;
  position: relative;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  transition: all 0.75s cubic-bezier(0.22, 0.61, 0.36, 1);
  will-change: transform, opacity;
  transform-origin: center center;
}
.gallery .imgWrap:last-child {
  min-width: 1px;
}
.gallery .imgWrap .caption {
  position: absolute;
  left: 0;
  bottom: -100%;
  background-color: rgba(24, 81, 74, 0.75);
  border-top: 3px solid #d64b31;
  padding: 20px 10%;
  color: #fff;
  width: 100%;
  transition: bottom 0.75s cubic-bezier(0.22, 0.61, 0.36, 1);
  will-change: bottom;
  z-index: 2;
}
.gallery .imgWrap:hover .caption {
  bottom: 0;
}
.gallery .imgWrap .caption h3 {
  font-size: clamp(1rem, 1.2vw, 1.25rem);
  text-transform: uppercase;
  margin-bottom: 0;
  color: #fff;
}
.gallery .imgWrap .caption span {
  font-size: 75%;
}
.gallery .imgWrap:hover {
  flex-grow: 2.25;
}
.gallery .imgWrap:not(:hover) {
  flex-grow: 0.8;
}

  </style>
</head>

<body class="team-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" style="border-radius: 50%;">
        <h1 class="sitename">Agro Vista</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php" class="active">Products</a></li>
          <li><a href="ufruits.php">Underutilized Fruits</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Products</h1>
        <p>
          This Digital Trade Fair is organized by the undergraduates of the Faculty of Agricultural Sciences, Sabaragamuwa University of Sri Lanka. It is a part of our academic initiative to promote and support local agricultural industries by introducing high-quality Sri Lankan products such as kithul, cinnamon, dry fish, and tea to both local and international markets.
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Products</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container text-center">

    <div class="shell">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="wsk-cp-product">
              <div class="wsk-cp-img">
                <img src="../assets/img/products/cinnomon.jpg" alt="Product" class="img-responsive" onclick="window.location.href='cinnamon.php'" />
              </div>
              <div class="wsk-cp-text">
                <div class="title-product">
                  <h3>Cinnamon</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wsk-cp-product">
              <div class="wsk-cp-img">
                <img src="../assets/img/products/kithul.jpg" alt="Product" class="img-responsive" onclick="window.location.href='kithul.php'"/>
              </div>
              <div class="wsk-cp-text">
                <div class="title-product">
                  <h3>Kithul</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wsk-cp-product">
              <div class="wsk-cp-img">
                <img src="../assets/img/products/tea.jpg" alt="Product" class="img-responsive" onclick="window.location.href='tea.php'"/>
              </div>
              <div class="wsk-cp-text">
                <div class="title-product">
                  <h3>Handmade Tea</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="wsk-cp-product">
              <div class="wsk-cp-img">
                <img src="../assets/img/products/dry_fish.jpg" alt="Product" class="img-responsive" onclick="window.location.href='dry_fish.php'"/>
              </div>
              <div class="wsk-cp-text">
                <div class="title-product">
                  <h3>Dry Fish</h3>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
   
  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Agro Vista</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Faculty of Agricultural Sciences</p>
            <p>Sabaragamuwa University of Sri Lanka</p>
            <p class="mt-3"><strong>Email:</strong> <span>agribizdigitaltradefair@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="products.php">Products</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="ufruits.php">Underutilized Fruits</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay connected with us and keep up with the latest updates, news, and insights. Follow us on our social media channels for a closer look at our journey, achievements, and behind-the-scenes moments.</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Agro Vista</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>