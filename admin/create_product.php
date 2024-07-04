<?php
include '../config/db_connect.php';
include '../config/helper_function.php';

if (!isLoggedIn()) {
    echo "<script>alert('Not Authenticated!');</script>";
    header('Location: index.php');
}

if (!isAdmin()) {
    echo "<script>alert('Not Authorized!');</script>";
    header('Location: index.php');
}

$categories = getAll($conn, 'category', 'ASC');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $folderName = 'products';
    $file = $_FILES['image'];

    $imagePath = saveImage($folderName, $file);

    if ($imagePath) {
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'categoryId' => $_POST['categoryId'],
            'description' => $_POST['description'],
            'image' => $imagePath,
        ];
        $newData = createData($conn, 'product', $data);
    } else {
        echo "<script>alert('Failed to save the image. Please try again.');</script>";
        header('Location: products.php');
    }
    if ($newData) {
        echo "<script>alert('Insert successful!');</script>";
        header('Location: products.php');
    } else {
        echo "<script>alert('Insert Failed, please try again.');</script>";
        header('Location: products.php');
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="site-name">
            <a href="../index.php">E-Shop</a>
        </div>
        <div class="nav-right">
            <a href="profile.html">
                <img class="img profile-img" src="./assets/images/margot.jpg" alt="profile-img">
            </a>
            <a href="../logout.php"><button class="btn logout-btn">Logout</button></a>

        </div>
    </nav>
    <div class="container">
        <div class="sidebar">
            <h3>
                <a href="index.php">Dashboard</a>
            </h3>
            <ul>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="customers.html">Customers</a></li>
                <li><a href="orders.html">Orders</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="settings.html">Settings</a></li>
            </ul>
        </div>
        <div class="content  profile">
            <div class="top-bar">
                <h2>Create Product</h2>
                <a href="" class="btn back">Back</a>
            </div>
            <form class="custom-form" action="create_product.php" method="post" enctype="multipart/form-data">
                <div class="form-div">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" id="stock" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Category:</label>
                        <select name="categoryId" id="categoryId" required>
                            <?php
                            if ($categories) {
                                foreach ($categories as $category) {
                            ?>
                                    <option value=<?= $category['id'] ?>><?= $category['name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                </div>
                <button type="submit">create</button>
            </form>
        </div>
    </div>

</body>

</html>