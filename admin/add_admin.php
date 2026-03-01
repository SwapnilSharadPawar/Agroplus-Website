<?php
include 'db.php'; // your database connection

// set your admin details here
$username = "swapnil";
$password = "Swapnil@1234"; // plain password (will be hashed)

// check if user already exists
$check = mysqli_query($conn, "SELECT * FROM admin_users WHERE username='$username' LIMIT 1");

if (mysqli_num_rows($check) > 0) {
    echo "✅ Admin '$username' already exists!";
} else {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO admin_users (username, password) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "🎉 Admin user '$username' created successfully!";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>
