<?php
include('db.php');
// session_start();

// // Check if admin is logged in
// if(!isset($_SESSION['admin_id'])){
//     header("Location: login.php");
//     exit;
// }

// Handle Delete
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM seedlings WHERE id=$id");
    header("Location: manage_seedlings.php");
    exit;
}

// Handle Add
if(isset($_POST['add_seedling'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = '';

    if($_FILES['file']['name'] != ''){
        $file = time().'_'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/seedlings/".$file);
    }

    $stmt = $conn->prepare("INSERT INTO seedlings(title, description, image) VALUES(?,?,?)");
    $stmt->bind_param("sss", $title, $description, $file);
    $stmt->execute();
    header("Location: manage_seedlings.php");
    exit;
}

$seedlings = $conn->query("SELECT * FROM seedlings ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Seedlings</title>
<link rel="stylesheet" href="style.css">
<style>
/* Consistent admin style */
body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f4f6f9; }
.content { margin-left:220px; padding:20px; }
h2 { margin-bottom:20px; }
.form-section, .table-section { background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); margin-bottom:20px; }
form input, form textarea, form button { padding:10px; margin-right:10px; margin-bottom:10px; }
form textarea { width:300px; height:80px; }
form button { background:#007bff; color:#fff; border:none; border-radius:5px; cursor:pointer; }
form button:hover { background:#0069d9; }
table { width:100%; border-collapse: collapse; }
table th, table td { padding:12px; border-bottom:1px solid #ddd; text-align:left; }
table th { background:#f1f1f1; }
table img { max-width:100px; border-radius:5px; }
</style>
</head>
<body>

<?php include('sidebar.php'); ?>

<div class="content">
    <h2>Manage Seedlings</h2>

    <div class="form-section">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="file" name="file" required>
            <button type="submit" name="add_seedling">Add Seedling</button>
        </form>
    </div>

    <div class="table-section">
        <h3>Seedlings List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Title</th><th>Description</th><th>Image</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $seedlings->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><img src="../uploads/seedlings/<?php echo $row['image']; ?>" alt="Seedling"></td>
                    <td>
                        <a href="manage_seedlings.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this seedling?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
