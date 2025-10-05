<?php
include 'session_active.php';
include '../db/DBcon.php';

$page_title = 'Dry Fish';
$category_type = 'dry_fish';

// Fetch products with category "Utilized" and filter by dry fish-related names
$sql = "SELECT p.*, s.seller_name 
        FROM products p 
        JOIN sellers s ON p.seller_id = s.seller_id 
        WHERE p.category = 'Utilized' 
        AND (LOWER(p.name) LIKE '%fish%' OR LOWER(p.name) LIKE '%dried%' OR LOWER(p.name) LIKE '%seafood%' OR LOWER(p.name) LIKE '%maldive%')
        ORDER BY p.product_id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo htmlspecialchars($page_title); ?> - Agro Vista</title>
  <meta name="description" content="Discover premium dried fish products from Sri Lankan coastal fishermen">
  <meta name="keywords" content="dry fish, dried fish, seafood, maldive fish, sri lanka, coastal">

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

  <!-- Custom CSS for Products -->
  <style>
    .product-category-badge {
      background: linear-gradient(45deg, #4682B4, #87CEEB);
      color: white;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      box-shadow: 0 2px 4px rgba(70, 130, 180, 0.3);
    }
    
    .member-img {
      position: relative;
      overflow: hidden;
    }
    
    .member-img img {
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      width: 100%;
    }
    
    .member-img video {
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      width: 100%;
    }
    
    .video-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: opacity 0.3s ease;
    }
    
    .video-overlay:hover {
      background: rgba(0, 0, 0, 0.7);
    }
    
    .video-overlay .play-btn {
      font-size: 48px;
      color: white;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .video-modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.9);
    }
    
    .video-modal-content {
      background-color: #000;
      margin: 5% auto;
      padding: 0;
      width: 90%;
      max-width: 800px;
      position: relative;
      border-radius: 10px;
      overflow: hidden;
    }
    
    .video-modal video,
    .video-modal iframe {
      width: 100%;
      height: 450px;
      border: none;
      border-radius: 10px;
    }
    
    .video-close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      position: absolute;
      top: 10px;
      right: 15px;
      z-index: 1001;
      cursor: pointer;
    }
    
    .video-close:hover {
      color: white;
    }

    .no-products {
      padding: 60px 20px;
      text-align: center;
      background: #f8f9fa;
      border-radius: 15px;
      margin: 40px 0;
    }

    .no-products h3 {
      color: #4682B4;
      margin-bottom: 20px;
    }
  </style>
</head>

<body class="team-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="../assets/img/logo.png" alt="" style="border-radius: 50%;">
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
        <h1><?php echo htmlspecialchars($page_title); ?></h1>
        <p>
          Experience the rich flavors of the ocean with our premium dried fish products. Sourced from the pristine coastal waters of Sri Lanka and processed using traditional sun-drying methods, our dried fish collection offers authentic taste and exceptional quality that has been treasured for generations.
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li class="current"><?php echo htmlspecialchars($page_title); ?></li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Products Section -->
    <section id="products" class="team section">

      <div class="container">
        <div class="row gy-5">

          <?php
          if ($result && $result->num_rows > 0) {
              $default_images = ['685799f1d8046.jpg', '68579a602c35c.jpg'];
              $image_index = 0;
              
              while($row = $result->fetch_assoc()) {
                  $display_image = "../assets/img/products/" . $default_images[$image_index % count($default_images)];
                  $image_index++;
                  
                  $video_url = $row['video_url'];
                  $video_id = '';
                  $video_type = '';
                  
                  if (!empty($video_url)) {
                      // Check if it's a YouTube video
                      if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches)) {
                          $video_id = $matches[1];
                          $video_type = 'youtube';
                      }
                      // Check if it's a Vimeo video
                      elseif (preg_match('/vimeo\.com\/(\d+)/', $video_url, $matches)) {
                          $video_id = $matches[1];
                          $video_type = 'vimeo';
                      }
                      // Check for local video files (relative paths or file extensions)
                      elseif (preg_match('/\.(mp4|webm|ogg|avi|mov)$/i', $video_url) || 
                              strpos($video_url, 'assets/') === 0 || 
                              strpos($video_url, '../assets/') === 0 ||
                              strpos($video_url, '/assets/') !== false) {
                          $video_type = 'local';
                          // Ensure proper path for local videos
                          if (strpos($video_url, '../') !== 0 && strpos($video_url, 'http') !== 0) {
                              // If it's just a filename or relative path, construct full path
                              if (strpos($video_url, 'assets/') === 0) {
                                  $video_url = '../' . $video_url;
                              } elseif (!preg_match('/^\.\.\//', $video_url)) {
                                  // Default to dry_fish category folder for local files
                                  $video_url = '../assets/videos/products/utilized/dry_fish/' . basename($video_url);
                              }
                          }
                      }
                      // Default to iframe for other URLs
                      else {
                          $video_type = 'iframe';
                      }
                  }
                  
                  $product_id = 'product_' . $row['product_id'];
          ?>
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <?php if (!empty($video_url)): ?>
                <img src="<?php echo htmlspecialchars($display_image); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($row['name']); ?>">
                <div class="video-overlay" onclick="openVideoModal('<?php echo $product_id; ?>')">
                  <i class="bi bi-play-circle-fill play-btn"></i>
                </div>
              <?php else: ?>
                <img src="<?php echo htmlspecialchars($display_image); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($row['name']); ?>">
              <?php endif; ?>
              <div class="social">
                <span class="product-category-badge"><?php echo htmlspecialchars($page_title); ?></span>
              </div>
            </div>
            <div class="member-info text-center">
              <h4><?php echo htmlspecialchars($row['name']); ?></h4>
              <span><?php echo htmlspecialchars($row['seller_name']); ?></span>
              
            </div>
            
            <?php if (!empty($video_url)): ?>
            <!-- Video Modal -->
            <div id="<?php echo $product_id; ?>_modal" class="video-modal">
              <div class="video-modal-content">
                <span class="video-close" onclick="closeVideoModal('<?php echo $product_id; ?>')">&times;</span>
                <?php if ($video_type === 'youtube'): ?>
                  <iframe id="<?php echo $product_id; ?>_iframe" src="" 
                          allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                          allowfullscreen
                          data-src="https://www.youtube.com/embed/<?php echo $video_id; ?>"></iframe>
                <?php elseif ($video_type === 'vimeo'): ?>
                  <iframe id="<?php echo $product_id; ?>_iframe" src="" 
                          allow="fullscreen; picture-in-picture" 
                          allowfullscreen
                          data-src="https://player.vimeo.com/video/<?php echo $video_id; ?>"></iframe>
                <?php elseif ($video_type === 'local'): ?>
                  <video id="<?php echo $product_id; ?>_video" controls muted playsinline preload="metadata">
                    <source src="<?php echo htmlspecialchars($video_url); ?>" 
                            type="video/<?php echo pathinfo($video_url, PATHINFO_EXTENSION); ?>">
                    <p>Your browser does not support the video tag. Video path: <?php echo htmlspecialchars($video_url); ?></p>
                  </video>
                <?php else: ?>
                  <iframe id="<?php echo $product_id; ?>_iframe" src="" allowfullscreen
                          data-src="<?php echo htmlspecialchars($video_url); ?>"></iframe>
                <?php endif; ?>
              </div>
            </div>
            <?php endif; ?>
          </div><!-- End Product -->
          <?php
              }
          } else {
          ?>
          <div class="col-12 text-center">
            <div class="no-products">
              <h3>No Dry Fish Products Available</h3>
              <p>We're currently updating our dried fish inventory. Please check back soon for premium dried fish products!</p>
              <a href="products.php" class="btn btn-primary mt-3">View All Products</a>
            </div>
          </div>
          <?php } ?>

        </div>

      </div>

    </section><!-- /Products Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="d-flex align-items-center">
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
            <li><i class="bi bi-chevron-right"></i> <a href="contact.php">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay connected with us and keep up with the latest updates, news, and insights from our agricultural community.</p>
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

  <!-- Video Modal JavaScript -->
  <script>
    function openVideoModal(productId) {
      const modal = document.getElementById(productId + '_modal');
      modal.style.display = 'block';
      
      const iframe = document.getElementById(productId + '_iframe');
      const video = document.getElementById(productId + '_video');
      
      if (iframe && iframe.dataset.src) {
        iframe.src = iframe.dataset.src;
      }
      
      if (video) {
        video.play();
      }
    }

    function closeVideoModal(productId) {
      const modal = document.getElementById(productId + '_modal');
      modal.style.display = 'none';
      
      const iframe = document.getElementById(productId + '_iframe');
      const video = document.getElementById(productId + '_video');
      
      if (iframe) {
        iframe.src = '';
      }
      
      if (video) {
        video.pause();
        video.currentTime = 0;
      }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      if (event.target.classList.contains('video-modal')) {
        const productId = event.target.id.replace('_modal', '');
        closeVideoModal(productId);
      }
    }
  </script>

</body>

</html>
