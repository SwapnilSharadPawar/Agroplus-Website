<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<style>
/* Reset */
body, html { margin: 0; padding: 0; font-family: Arial, sans-serif; }

/* Navbar */
.navbar {
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  height: 50px;
  background: #007bff;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 15px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  z-index: 1000;
}

.navbar h1 {
  margin: 0;
  font-size: 18px;
}

.menu-btn {
  font-size: 22px;
  cursor: pointer;
  background: none;
  border: none;
  color: #fff;
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 50px; /* below navbar */
  left: -250px;
  width: 250px;
  height: 100%;
  background: #343a40;
  color: #fff;
  transition: 0.3s;
  padding-top: 20px;
  z-index: 999;
}

.sidebar.active {
  left: 0;
}

.sidebar a {
  display: block;
  padding: 12px 20px;
  text-decoration: none;
  color: #ddd;
  transition: 0.2s;
}

.sidebar a:hover {
  background: #495057;
  color: #fff;
}

/* Content */
.content {
  margin-top: 60px;
  padding: 20px;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <h1>Admin Panel</h1>
  <button class="menu-btn" onclick="toggleSidebar()">⋮</button>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <a href="dashboard.php">🏠 Dashboard</a>
  <a href="messages.php">✉ Contact Messages</a>
  <a href="logout.php">🚪 Logout</a>
</div>

<!-- Main Content -->
<div class="content">
  <h2>Welcome to Admin Dashboard</h2>
  <p>This is where your main content will appear.</p>
</div>

<script>
function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle("active");
}
</script>

</body>
</html>
