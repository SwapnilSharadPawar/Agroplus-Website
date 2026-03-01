<?php

include('db.php');
// session_start(); // Start session


// Handle Delete
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM krishiudyog_products WHERE id=$id");
    header("Location: manage_krishi_products.php");
    exit;
}

// Handle Add
if(isset($_POST['add_product'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = '';

    if($_FILES['image']['name'] != ''){
        $image = time().'_'.basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/krishiudyog/".$image);
    }

    $stmt = $conn->prepare("INSERT INTO krishiudyog_products(name,description,image) VALUES(?,?,?)");
    $stmt->bind_param("sss", $name, $description, $image);
    $stmt->execute();
    header("Location: manage_krishi_products.php");
    exit;
}

// Fetch products
$products = $conn->query("SELECT * FROM krishiudyog_products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Krishiudyog Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('sidebar.php'); ?>

<div class="content">
    <h2>Manage Krishiudyog Products</h2>

    <!-- Add Product Form -->
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <input type="file" name="image" required>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <!-- Products List -->
    <h3>Product List</h3>
    <table border="1" width="100%" cellpadding="10">
        <tr>
            <th>ID</th><th>Name</th><th>Description</th><th>Image</th><th>Action</th>
        </tr>
        <?php while($row = $products->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo nl2br($row['description']); ?></td>
            <td>
                <?php if($row['image'] != ''): ?>
                    <img src="../uploads/krishiudyog/<?php echo $row['image']; ?>" width="100">
                <?php endif; ?>
            </td>
            <td>
                <a href="manage_krishi_products.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
