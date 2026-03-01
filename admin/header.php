<?php
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="banners.php">Banners</a></li>
            <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
            <li class="nav-item"><a class="nav-link" href="messages.php">Messages</a></li>
            <li class="nav-item"><a class="nav-link" href="site_info.php">Site Info</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
