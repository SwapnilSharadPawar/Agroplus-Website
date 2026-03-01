<?php
include 'db.php';
session_start();

// Protect admin session
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Update labels
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['labels'] as $id => $label) {
        $label = mysqli_real_escape_string($conn, $label);
        $conn->query("UPDATE career_form_labels SET label_text='$label' WHERE id=$id");
    }
    $msg = "Form labels updated successfully!";
}

$labels = $conn->query("SELECT * FROM career_form_labels");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Career Form Labels</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="content" id="content">
  <h2>Manage Career Form Labels</h2>
  <?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
  <form method="post">
    <table>
      <tr><th>Field</th><th>Label Text</th></tr>
      <?php while($row = $labels->fetch_assoc()): ?>
      <tr>
        <td><?= ucfirst($row['field_name']) ?></td>
        <td><input type="text" name="labels[<?= $row['id'] ?>]" value="<?= htmlspecialchars($row['label_text']) ?>" style="width:100%"></td>
      </tr>
      <?php endwhile; ?>
    </table>
    <button type="submit">Update Labels</button>
  </form>
</div>
</body>
</html>
