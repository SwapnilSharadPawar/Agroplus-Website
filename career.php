<?php
include 'db.php';

// Fetch form labels from DB
$labels = [];
$res = $conn->query("SELECT * FROM career_form_labels");
while($row = $res->fetch_assoc()){
  $labels[$row['field_name']] = $row['label_text'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $resumeFile = null;

    if (!empty($_FILES['resume']['name'])) {
        $targetDir = "uploads/resumes/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
        $resumeFile = time() . "_" . basename($_FILES["resume"]["name"]);
        move_uploaded_file($_FILES["resume"]["tmp_name"], $targetDir . $resumeFile);
    }

    $conn->query("INSERT INTO career_applications (name,email,phone,resume,message)
                  VALUES ('$name','$email','$phone','$resumeFile','$message')");

    $success = "Application submitted successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agroplus - Career</title>
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
            <li class="nav-item"><a class="nav-link" href="agroplus_krushiudyog.php">krushi udyog</a></li>
            <li class="nav-item"><a class="nav-link" href="seedlings.php">Seedlings</a></li>
            <li class="nav-item"><a class="nav-link" href="services.html">Our Services</a></li>
            <li class="nav-item active"><a class="nav-link" href="career.php">Career</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Heading -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Career</h1>
          <span>Join our team and grow with Agroplus</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Career Form -->
  <div class="callback-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Apply for a <em>position</em></h2>
            <span>Fill in the details below to join us</span>
          </div>
        </div>
        <div class="col-md-12">
          <?php if(isset($success)) echo "<p style='color:green;'>$success</p>"; ?>
          <div class="contact-form">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" placeholder="<?= $labels['name'] ?>" required>
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="email" class="form-control" placeholder="<?= $labels['email'] ?>" required>
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="phone" type="text" class="form-control" placeholder="<?= $labels['phone'] ?>">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="resume" type="file" class="form-control" accept=".pdf,.doc,.docx">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" placeholder="<?= $labels['message'] ?>"></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" class="border-button">Submit Application</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-item">
          <h4>Agroplus Business</h4>
          <p>Agroplus is an innovative agritech and software solutions company located at Pargaon Tarfe Ale, Taluka Junnar, District Pune.</p>
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item"></div>
        <div class="col-md-3 footer-item">
          <h4>Additional Pages</h4>
          <ul class="menu-list">
            <li><a href="about.php">About Us</a></li>
            <li><a href="seedlings.php">Seedlings</a></li>
            <li><a href="agroplus_krushiudyog.php">krushi udyog</a></li>
            <li><a href="contact.html">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item last-item">
          <h4>Contact Us</h4>
          <div class="contact-form">
            <form id="footer-contact" action="submit_contact.php" method="post">
              <input name="name" type="text" class="form-control" placeholder="Full Name" required>
              <input name="email" type="email" class="form-control" placeholder="E-Mail Address" required>
              <textarea name="message" rows="4" class="form-control" placeholder="Your Message" required></textarea>
              <button type="submit" class="filled-button">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Copyright &copy; 2025 Agroplus Business. 
          - Design: <a href="https://swapnil-pawar.vercel.app/" target="_blank">Swapnil</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/accordions.js"></script>
</body>
</html>
