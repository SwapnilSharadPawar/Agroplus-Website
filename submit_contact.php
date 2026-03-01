<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = isset($_POST['subject']) ? mysqli_real_escape_string($conn, $_POST['subject']) : '';
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to homepage with success message
        header("Location: index.html?success=1");
    } else {
        header("Location: index.html?error=1");
    }
}
?>
