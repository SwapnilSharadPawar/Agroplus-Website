<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $stmt = $conn->prepare("DELETE FROM career_applications WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: view_career_applications.php");
    exit();
}

$result = $conn->query("SELECT * FROM career_applications ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Career Applications</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" id="content">
  <h2>Career Applications</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Resume</th><th>Message</th><th>Date</th><th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars($row['phone']) ?></td>
      <td>
        <?php if($row['resume']): ?>
          <a href="../uploads/resumes/<?= $row['resume'] ?>" target="_blank">View</a>
        <?php else: ?> - <?php endif; ?>
      </td>
      <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
      <td><?= $row['created_at'] ?></td>
      <td>
        <form method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this application?');">
            <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
          <button type="submit" style="background:#e74c3c;color:#fff;border:none;padding:5px 10px;cursor:pointer;">Delete</button>
        </form>
        <a href="mailto:<?= htmlspecialchars($row['email']) ?>" style="background:#3498db;color:#fff;padding:5px 10px;text-decoration:none;border-radius:3px;margin-left:5px;">Reply</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
</body>
</html>
