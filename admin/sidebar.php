<?php
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }
?>
<!-- Navbar -->
<div class="navbar">
  <button class="menu-btn" onclick="toggleSidebar()">☰</button>
  <h1>Admin Panel</h1>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <a href="dashboard.php">🏠 Dashboard</a>
  <a href="messages.php">✉ View Messages</a>
  <a href="manage_career_form.php">📝 Manage Career page</a>
<a href="view_career_applications.php">View Applications</a>
  <a href="manage_krishi_products.php">Krishiudyog Products</a>
  <a href="manage_krishi_gallery.php">Krishiudyog Gallery</a>
  <a href="manage_seedlings.php">Seedlings</a>
  <a href="manage_seedlings_gallery.php">Seedlings Gallery</a>

  <a href="logout.php">🚪 Logout</a>
</div>

<script>
function toggleSidebar() {
  let sidebar = document.getElementById("sidebar");
  let content = document.getElementById("content");

  sidebar.classList.toggle("active");
  content.classList.toggle("shift");
}
</script>
