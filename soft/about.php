<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About AgroPlus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      font-family: 'Segoe UI', sans-serif;
    }
    .acid-green {
      background-color: #ffffffff; /* fent acid green */
      color: #000;
    }
    .btn-acid {
      background-color: #B0FF00;
      color: #000;
      border: none;
    }
    .btn-acid:hover {
      background-color: #a0f000;
    }
    .section-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .feature-box {
      border: 1px solid #B0FF00;
      padding: 1rem;
      border-radius: 8px;
      background-color: #f9fff0;
    }
    .rating-stars {
      color: #B0FF00;
      font-size: 1.5rem;
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg acid-green">
    <div class="container-fluid">
     <a href="index.html" class="logo">
  <img src="assets/images/logo/agroplus.png" alt="Agroplus" style="height:40px; vertical-align:middle;">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Solution</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Desktop</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mobile App</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Partner With Us</a></li>
          <li class="nav-item"><a class="btn btn-acid" href="#">Download Free</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
<section class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-md-start text-center mb-4 mb-md-0">
            <img src="assets/images/logo/agroplus.png" alt="AgroPlus Business Software" class="section-title" style="height:60px;"><br>
            <h2 >&nbsp&nbsp&nbsp Business Software</h2>
            <p class="lead">Billing, Accounting & Inventory software for small business owners in India</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="assets/images/banner-bg.png" width="100%" class="img-fluid" alt="AgroPlus Dashboard">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-4">
            <a href="#" class="btn btn-acid btn-lg">Download for Desktop</a>
        </div>
    </div>
</section>

  <!-- Features Section -->
  <section class="container py-5">
    <div class="row text-center">
      <div class="col-md-4 feature-box">
        <h5>Downloads</h5>
        <p>10M+</p>
      </div>
      <div class="col-md-4 feature-box">
        <h5>Play Store Rating</h5>
        <p class="rating-stars">★★★★☆ (4.7)</p>
      </div>
      <div class="col-md-4 feature-box">
        <h5>Made In</h5>
        <p>India </p>
      </div>
    </div>
  </section>

<!-- SME Section -->
<section class="container py-5">
    
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
            <img src="assets/images/sme.png" width="100%" height="auto" class="img-fluid" alt="SME Solutions">
        </div>
        <div class="col-md-6">
            <h2 class="section-title">Small/Medium Business (SME)</h2>
            <p>Even today, many SMEs in India still rely on paper-based billing. AgroPlus aims to simplify business operations by offering a digital upgrade that reduces manual errors and boosts efficiency. Our software helps you track assets, liabilities, and profits with ease.</p>
        </div>
    </div>
</section>

  <!-- Benefits Section -->
  <section class="container py-5">
    <h2 class="section-title">Why Choose AgroPlus?</h2>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">✅ GST Compatible</li>
      <li class="list-group-item">✅ Simplified Invoicing</li>
      <li class="list-group-item">✅ Auto Backup & Data Security</li>
      <li class="list-group-item">✅ Offline Functionality</li>
      <li class="list-group-item">✅ Multi-language Support (English, Hindi)</li>
      <li class="list-group-item">✅ Works on Android, Windows, Tablet</li>
    </ul>
<!-- Rating Section -->
<?php
// Simple file-based rating system
$ratingFile = __DIR__ . '/ratings.txt';
$totalVotes = 0;
$totalScore = 0;

// Handle AJAX rating submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    $rating = intval($_POST['rating']);
    if ($rating >= 1 && $rating <= 5) {
            // Append rating to file
            file_put_contents($ratingFile, $rating . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
}

// Calculate average rating
if (file_exists($ratingFile)) {
    $ratings = file($ratingFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $totalVotes = count($ratings);
    $totalScore = array_sum($ratings);
}
$average = $totalVotes > 0 ? round($totalScore / $totalVotes, 2) : 4.4;
?>
<section class="container py-5 text-center">
    <h2 class="section-title">How Useful is AgroPlus for Your Business?</h2>
    <p id="rating-message">Click on a star to rate it!</p>
    <div id="star-rating" class="rating-stars" style="cursor:pointer; font-size:2rem;">
            <?php
            $fullStars = floor($average);
            $halfStar = ($average - $fullStars) >= 0.5;
            for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $fullStars) {
                            echo '<span data-value="'.$i.'">&#9733;</span>'; // filled star
                    } elseif ($i == $fullStars + 1 && $halfStar) {
                            echo '<span data-value="'.$i.'">&#9734;</span>'; // empty star for half
                    } else {
                            echo '<span data-value="'.$i.'">&#9734;</span>'; // empty star
                    }
            }
            ?>
    </div>
    <p id="avg-rating">Average rating: <?php echo $average; ?> / 5 | Based on <?php echo $totalVotes; ?> votes</p>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var stars = document.querySelectorAll('#star-rating span');
    var rated = false;
    stars.forEach(function(star) {
            star.addEventListener('click', function() {
                    if (rated) return;
                    var val = this.getAttribute('data-value');
                    fetch(window.location.href, {
                            method: 'POST',
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            body: 'rating=' + val
                    })
                    .then(response => response.json())
                    .then(data => {
                            rated = true;
                            document.getElementById('rating-message').textContent = 'Thank you for rating!';
                            // Optionally update stars visually
                    });
            });
    });
});
</script>

<!-- Footer -->
<footer class="text-center py-4" style="background-color: #b2e641ff; color: #000;">
    <p>
        Copyright &copy; 2025 Agroplus
        | Designed by <a rel="nofollow" href="https://swapnil-pawar.vercel.app/" style="color: #000; text-decoration: underline;">Swapnil</a>
    </p>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>