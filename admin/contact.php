<?php
include 'db.php'; // database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, phone, message) 
            VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thank you! We will contact you soon.');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="phone" placeholder="Phone">
    <textarea name="message" placeholder="Your Message" required></textarea>
    <button type="submit">Send</button>
</form>
