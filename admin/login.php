<?php
include 'db.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded for now, later we add admin_users table
    if ($username == "swapnil" && $password == "Swapnil1234") {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body { font-family: Arial; background: #f4f4f4; }
form { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
input { width: 80%; padding: 10px; margin: 10px 0; }
button { width: 100%; padding: 10px; background: #28a745; color: #fff; border: none; cursor: pointer; }
button:hover { background: #218838; }
.error { color: red; }
</style>
</head>
<body>
<form method="POST">
    <h2>Admin Login</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>
</body>
</html>
