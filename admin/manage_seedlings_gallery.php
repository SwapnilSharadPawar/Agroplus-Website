<?php
include('db.php');
// session_start();

// // ✅ Check login session
// if(!isset($_SESSION['admin_id'])){
//     header("Location: login.php");
//     exit;
// }

// Handle Delete
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM seedlings_gallery WHERE id=$id");
    header("Location: manage_seedlings_gallery.php");
    exit;
}

// Handle Add
if(isset($_POST['add_gallery'])){
    $title = $_POST['title'];
    $type = $_POST['type'];
    $file = '';

    if($_FILES['file']['name'] != ''){
        $file = time().'_'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], "../uploads/seedlings/".$file);
    }

    $stmt = $conn->prepare("INSERT INTO seedlings_gallery(title,file_path,type) VALUES(?,?,?)");
    $stmt->bind_param("sss", $title, $file, $type);
    $stmt->execute();
    header("Location: manage_seedlings_gallery.php");
    exit;
}

$gallery = $conn->query("SELECT * FROM seedlings_gallery ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Seedlings Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include('sidebar.php'); ?>

<div class="content" id="content">
    <h2>Manage Seedlings Gallery</h2>

    <div class="form-section">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <select name="type" required>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
            <input type="file" name="file" required>
            <button type="submit" name="add_gallery">Add File</button>
        </form>
    </div>

    <div class="table-section">
        <h3>Seedlings Gallery List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Title</th><th>Preview</th><th>Type</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $gallery->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        <?php if($row['type'] == 'image'): ?>
                            <img src="../uploads/seedlings/<?php echo $row['file_path']; ?>" width="100">
                        <?php else: ?>
                            <video width="150" controls>
                                <source src="../uploads/seedlings/<?php echo $row['file_path']; ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['type']; ?></td>
                    <td>
                        <a href="manage_seedlings_gallery.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete item?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
