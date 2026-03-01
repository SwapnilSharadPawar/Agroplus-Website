<?php
include 'db.php';

// Fetch seedlings products
$products = $conn->query("SELECT * FROM seedlings ORDER BY id DESC");

// Fetch seedlings gallery
$gallery = $conn->query("SELECT * FROM seedlings_gallery ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Agroplus Seedlings - Nursery</title>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/fontawesome.css">
<link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
<link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

<!-- Preloader -->
<div id="preloader">
  <div class="jumper"><div></div><div></div><div></div></div>
</div>

<!-- Header -->
<div class="sub-header">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-xs-12">
        <ul class="left-info">
         <li>
                <a href="#" style="pointer-events:none;">
                  <i class="fa fa-calendar"></i>
                  <span id="live-date-time"></span>
                </a>
              </li>
              <script>
                function updateDateTime() {
                  const options = {
                    timeZone: 'Asia/Kolkata',
                    weekday: 'long',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                  };
                  const now = new Date();
                  document.getElementById('live-date-time').textContent =
                    now.toLocaleString('en-IN', options);
                }
                setInterval(updateDateTime, 1000);
                updateDateTime();
              </script>
              <li><a href="#"><i class="fa fa-phone"></i>9860207957</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="right-icons">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.instagram.com/agroplus.co.in"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="assets/images/agroplus.png" alt="Agroplus Logo" style="height:50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarResponsive" aria-controls="navbarResponsive" 
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
            <li class="nav-item "><a class="nav-link" href="agroplus_krushiudyog.php">krushi udyog</a></li>
            <li class="nav-item active"><a class="nav-link" href="seedlings.php">Seedlings</a></li>
            <li class="nav-item"><a class="nav-link" href="services.html">Our Services</a></li>
            <li class="nav-item "><a class="nav-link" href="career.php">Career</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

<!-- Banner -->
<div class="main-banner header-text" id="top">
  <div class="Modern-Slider">
    <div class="item item-1">
      <div class="img-fill">
        <div class="text-content">
          <h6>High-Quality Nursery</h6>
          <h4>Agroplus Seedlings<br>&amp; Nursery</h4>
          <p>Providing strong, disease-free seedlings for sugarcane & vegetables to boost your farm productivity.</p>
          <a href="#products" class="filled-button">Explore Seedlings</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- About Section -->
<div class="more-info">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="left-image">
          <img src="assets/images/nursery/agroseeds.png" alt="Agroplus Seedlings">
        </div>
      </div>
      <div class="col-md-6 align-self-center">
        <div class="right-content">
          <h2>About <em>Agroplus Seedlings</em></h2>
          <p>Agroplus Seedlings is committed to supplying farmers with top-quality sugarcane and vegetable seedlings. Using modern techniques, we ensure healthy, uniform plants that give you maximum yield.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Products Section -->
<div class="services" id="products">
  <style>
    .service-item {
      transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }
    .service-item:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      z-index: 2;
    }
  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Our <em>Seedlings</em></h2>
          <span>Sugarcane & Vegetable Seedlings for farmers</span>
        </div>
      </div>
      <?php while($row = $products->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="service-item">
          <img src="uploads/seedlings/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" width="250" height="180" style="object-fit:cover;">
          <div class="down-content">
            <h4><?php echo $row['title']; ?></h4>
            <p><?php echo substr($row['description'],0,100); ?>...</p>
            <a href="javascript:void(0)" class="filled-button" onclick="openModal('<?php echo $row['id']; ?>')">Read More</a>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div id="modal-<?php echo $row['id']; ?>" class="modal" style="display:none;position:fixed;z-index:999;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.7);">
        <div class="modal-content" style="background:#fff;margin:10% auto;padding:20px;border-radius:10px;width:60%;">
          <span style="float:right;font-size:28px;cursor:pointer;" onclick="closeModal('<?php echo $row['id']; ?>')">&times;</span>
          <h2><?php echo $row['title']; ?></h2>
          <img src="uploads/seedlings/<?php echo $row['image']; ?>" width="250" style="margin-bottom:15px;">
          <p><?php echo nl2br($row['description']); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<!-- Gallery Section -->
<style>
  .gallery-img {
    transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    cursor: pointer;
  }
  .gallery-img:hover {
    transform: scale(1.08);
    box-shadow: 0 8px 24px rgba(0,0,0,0.18);
    z-index: 2;
  }
  /* Popup styles */
  .img-popup-bg {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0; top: 0;
    width: 100vw; height: 100vh;
    background: rgba(0,0,0,0.8);
    align-items: center;
    justify-content: center;
  }
  .img-popup-content {
    position: relative;
    background: transparent;
    border-radius: 8px;
    max-width: 90vw;
    max-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .img-popup-content img {
    max-width: 90vw;
    max-height: 80vh;
    border-radius: 8px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.25);
    background: #fff;
    padding: 8px;
  }
  .img-popup-close {
    position: absolute;
    top: -18px;
    right: -18px;
    background: #fff;
    color: #333;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    font-size: 28px;
    text-align: center;
    line-height: 36px;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.18);
    z-index: 10;
  }
</style>
<div class="partners">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Seedlings <em>Gallery</em></h2>
        </div>
        <div class="row">
          <?php
          $count = 0;
          while($row = $gallery->fetch_assoc()):
            if ($count % 4 == 0 && $count != 0) {
              echo '</div><div class="row" style="margin-top:20px;">';
            }
          ?>
            <div class="col-md-3 col-sm-6 mb-4">
              <?php if($row['type'] == 'image'): ?>
                <img src="uploads/seedlings/<?php echo $row['file_path']; ?>"
                     alt="<?php echo $row['title']; ?>"
                     width="220" height="160"
                     class="gallery-img"
                     style="object-fit:cover; display:block; margin:auto;"
                     onclick="openImgPopup('uploads/seedlings/<?php echo $row['file_path']; ?>')">
              <?php else: ?>
                <video width="220" height="160" style="object-fit:cover; display:block; margin:auto;" controls>
                  <source src="uploads/seedlings/<?php echo $row['file_path']; ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              <?php endif; ?>
            </div>
          <?php
            $count++;
          endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Image Popup Modal -->
<div id="img-popup-bg" class="img-popup-bg" onclick="closeImgPopup(event)">
  <div class="img-popup-content">
    <span class="img-popup-close" onclick="closeImgPopup(event)">&times;</span>
    <img id="img-popup-img" src="" alt="Gallery Image">
  </div>
</div>
<script>
  function openImgPopup(src) {
    document.getElementById('img-popup-img').src = src;
    document.getElementById('img-popup-bg').style.display = 'flex';
  }
  function closeImgPopup(e) {
    // Only close if background or close button is clicked
    if (e.target.classList.contains('img-popup-bg') || e.target.classList.contains('img-popup-close')) {
      document.getElementById('img-popup-bg').style.display = 'none';
      document.getElementById('img-popup-img').src = '';
    }
  }
  // Optional: ESC key closes popup
  document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
      document.getElementById('img-popup-bg').style.display = 'none';
      document.getElementById('img-popup-img').src = '';
    }
  });
</script>
<div id="map">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2450.8701529107184!2d74.15321862310205!3d19.03614242047312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdd28ebeef97613%3A0x6ecded539cb89903!2sAgroplus%20Seedlings!5e1!3m2!1sen!2sin!4v1755955783643!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<!-- Contact Form -->
<div class="callback-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Request a <em>call back</em></h2>
        </div>
      </div>
      <div class="col-md-12">
        <div class="contact-form">
          <form id="contact" action="submit_contact.php" method="post">
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset><input name="name" type="text" class="form-control" placeholder="Full Name" required></fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset><input name="email" type="text" class="form-control" placeholder="E-Mail Address" required></fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset><input name="subject" type="text" class="form-control" placeholder="Subject"></fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset><textarea name="message" rows="6" class="form-control" placeholder="Your Message" required></textarea></fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset><button type="submit" class="border-button">Send Message</button></fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script>
function openModal(id) { document.getElementById('modal-'+id).style.display = 'block'; }
function closeModal(id) { document.getElementById('modal-'+id).style.display = 'none'; }
</script>
</body>
</html>
