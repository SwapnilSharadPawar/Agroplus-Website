<?php
include 'db.php';

// Fetch products
$products = $conn->query("SELECT * FROM krishiudyog_products ORDER BY id DESC");

// Fetch gallery
$gallery = $conn->query("SELECT * FROM krishiudyog_gallery ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Agroplus krushi udyog - Pesticides & Fertilizers</title>

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
            <li class="nav-item active"><a class="nav-link" href="agroplus_krushiudyog.php">krushi udyog</a></li>
            <li class="nav-item"><a class="nav-link" href="seedlings.php">Seedlings</a></li>
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
          <h6>Trusted Agro Solutions</h6>
          <h4>Agroplus krushi udyog<br>&amp; Store</h4>
          <p>Providing high-quality pesticides & fertilizers to empower farmers and protect crops.</p>
          <a href="#products" class="filled-button">Explore Products</a>
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
          <img src="assets/images/nursery/fertilizer.png" alt="Agroplus krushiudyog">
        </div>
      </div>
      <div class="col-md-6 align-self-center">
        <div class="right-content">
          <h2>About <em>Agroplus krushi udyog</em></h2>
          <p>Agroplus krushi udyog offers a wide range of pesticides and fertilizers designed for sustainable farming. We aim to protect crops, increase yield, and support farmers with affordable and effective agro-solutions.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Products Section -->
<style>
.product-img-fixed {
  width: 200px;
  height: 200px;
  object-fit: cover;
  display: block;
  margin: 0 auto 15px auto;
  transition: transform 0.3s cubic-bezier(.4,2,.6,1);
}
.product-col {
  transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
  z-index: 1;
}
.product-col:hover {
  transform: scale(1.08);
  z-index: 2;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
}
@media (min-width: 992px) {
  .product-col {
    flex: 0 0 25%;
    max-width: 25%;
  }
}
@media (max-width: 991.98px) {
  .product-col {
    flex: 0 0 50%;
    max-width: 50%;
  }
}
@media (max-width: 575.98px) {
  .product-col {
    flex: 0 0 100%;
    max-width: 100%;
  }
}
</style>
<div class="services" id="products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Our <em>Products</em></h2>
          <span>Pesticides & Fertilizers for healthy crops</span>
        </div>
      </div>
    </div>
    <?php
    $modalHtml = '';
    $count = 0;
    ?>
    <div class="row d-flex flex-wrap">
      <?php while($row = $products->fetch_assoc()): ?>
        <?php if($count % 4 == 0 && $count != 0): ?>
          </div><div class="row d-flex flex-wrap">
        <?php endif; ?>
        <div class="product-col d-flex align-items-stretch mb-4">
          <div class="service-item w-100">
            <img class="product-img-fixed" src="uploads/krishiudyog/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <div class="down-content">
              <h4><?php echo $row['name']; ?></h4>
              <p><?php echo substr($row['description'],0,100); ?>...</p>
              <a href="javascript:void(0)" class="filled-button" onclick="openModal('<?php echo $row['id']; ?>')">Read More</a>
            </div>
          </div>
        </div>
        <?php
        // Collect modal HTML to output after all rows
        $modalHtml .= '
        <div id="modal-'.$row['id'].'" class="modal" style="display:none;position:fixed;z-index:999;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.7);">
          <div class="modal-content" style="background:#fff;margin:10% auto;padding:20px;border-radius:10px;width:60%;">
            <span style="float:right;font-size:28px;cursor:pointer;" onclick="closeModal(\''.$row['id'].'\')">&times;</span>
            <h2>'.$row['name'].'</h2>
            <img src="uploads/krishiudyog/'.$row['image'].'" width="250" style="margin-bottom:15px;">
            <p>'.nl2br($row['description']).'</p>
          </div>
        </div>
        ';
        $count++;
        ?>
      <?php endwhile; ?>
    </div>
    <?php echo $modalHtml; ?>
  </div>
</div>

<!-- Gallery Section -->
<style>
.partner-item img.gallery-zoom {
  transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
  cursor: zoom-in;
}
.partner-item img.gallery-zoom:hover {
  transform: scale(1.15);
  z-index: 2;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
}
#galleryModal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0; top: 0;
  width: 100vw; height: 100vh;
  background: rgba(0,0,0,0.85);
  align-items: center;
  justify-content: center;
}
#galleryModal .modal-content {
  position: relative;
  background: none;
  border: none;
  box-shadow: none;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}
#galleryModal img {
  max-width: 90vw;
  max-height: 80vh;
  border-radius: 8px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.25);
}
#galleryModal .close {
  position: absolute;
  top: 30px;
  right: 40px;
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
  z-index: 10;
  text-shadow: 0 2px 8px #000;
}
</style>
<div class="partners">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>krushi udyog <em>Gallery</em></h2>
        </div>
        <div class="owl-partners owl-carousel">
          <?php while($row = $gallery->fetch_assoc()): ?>
            <?php if($row['type'] == 'image'): ?>
              <div class="partner-item">
                <img class="gallery-zoom" src="uploads/krishiudyog/<?php echo $row['file_path']; ?>" alt="<?php echo $row['title']; ?>" onclick="openGalleryModal('uploads/krishiudyog/<?php echo $row['file_path']; ?>')">
              </div>
            <?php else: ?>
              <div class="partner-item">
                <video width="200" controls>
                  <source src="uploads/krishiudyog/<?php echo $row['file_path']; ?>" type="video/mp4">
                </video>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Image Popup Modal -->
<div id="galleryModal">
  <div class="modal-content" style="position:relative; display:flex; flex-direction:column; align-items:center; justify-content:center; height:100%;">
    <span class="close" onclick="closeGalleryModal()">&times;</span>
    <img id="galleryModalImg" src="" alt="Gallery Image" style="display:block; margin:0 auto; max-width:90vw; max-height:80vh;">
    <button type="button" onclick="closeGalleryModal()" style="margin-top:30px;padding:8px 24px;font-size:18px;border:none;border-radius:5px;background:#007bff;color:#fff;cursor:pointer;">Back</button>
  </div>
</div>
<script>
function openGalleryModal(src) {
  document.getElementById('galleryModalImg').src = src;
  document.getElementById('galleryModal').style.display = 'flex';
}
function closeGalleryModal() {
  document.getElementById('galleryModal').style.display = 'none';
  document.getElementById('galleryModalImg').src = '';
}
// Close modal on ESC or click outside image
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeGalleryModal();
});
document.getElementById('galleryModal').addEventListener('click', function(e) {
  if (e.target === this) closeGalleryModal();
});
</script>

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
