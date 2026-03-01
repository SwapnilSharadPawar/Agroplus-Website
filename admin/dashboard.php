<?php
include 'db.php';
session_start();

// Count messages
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contact_messages");
$row = mysqli_fetch_assoc($result);
$total_messages = $row['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content" id="content">
  <h2>Welcome, <?php echo $_SESSION['admin']; ?> 👋</h2>
  <p>This is your admin dashboard. Use the sidebar to navigate.</p>

  <div class="card">
    <h3>📩 Total Messages</h3>
    <p><?php echo $total_messages; ?> new messages</p>
    <a href="messages.php">View Messages</a>
  </div>
</div>

</body>
</html>
