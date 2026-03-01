<?php
include 'db.php';
session_start();

// Handle delete request
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  mysqli_query($conn, "DELETE FROM contact_messages WHERE id = $id");
  // Optional: Redirect to avoid resubmission on refresh
  header("Location: messages.php");
  exit;
}

$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Messages</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content" id="content">
  <h2>Contact Messages</h2>
  <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['message'] ?></td>
    <td><?= $row['created_at'] ?></td>
    <td>
    <a href="messages.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
    </td>
  </tr>
  <?php } ?>
  </table>
</div>

</body>
</html>
