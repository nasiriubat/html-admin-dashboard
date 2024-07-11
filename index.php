<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Ecommerce Store</title>
    <link rel="stylesheet" href="./assets/style.css"> <!-- Assuming you have a separate CSS file -->
</head>
<?php
include './config/helper_function.php';
include './config/db_connect.php';
$categories = getAll($conn, 'category');
$subcategories = getSubcategoriesByCategory($conn);
$allSubCategory = getAll($conn, 'sub_category');
$products = getAll($conn, 'product');
$home_page = true;
$searchText = '';
//search by category
if (isset($_GET['addToCart'])) {
    // clearCart();
    $productId = $_GET['addToCart'];
    $cartReturn = addToCart($conn, $productId);
    header("Location: " . $_SERVER['PHP_SELF']);
}
if (isset($_GET['subcategoryId'])) {
    $activeCatId = $_GET['subcategoryId'];
    $products = productsByCategory($conn, $_GET['subcategoryId']);
    $home_page = false;
}

//search by input
if (isset($_GET['search'])) {
    $searchText = $_GET['search'];
    $products = productsBySearch($conn, $_GET['search']);
}
?>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="navbar-logo">
                <a href="index.php">Eshop</a>
            </div>
            <div class="search-bar">
                <form action="index.php">
                    <input type="text" value="<?= $searchText ?>" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="navbar-links">

                <a href="cart.php">Cart <sup><?= getCartProductCount() ?></sup></a>
                <?php
                if (isLoggedIn()) {
                    if (isAdmin()) { ?>
                        <a href="./admin/index.php">Dashboard</a>
                    <?php } else { ?>
                        <a href="./customer/index.php">Dashboard</a>
                    <?php } ?>
                    <a href="logout.php">Logout</a>
                <?php } else { ?>
                    <a href="login.php">Login</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <!-- Sidebar with Category List -->
            <div class="sidebar">
                <?php if ($categories) { ?>
                    <ul class="category-list">
                        <?php foreach ($categories as $category) {
                            if (isset($subcategories[$category['id']])) { ?>
                                <li class="category-item">
                                    <p class=""><?= showText($category['name'], 20) ?></p>
                                    <ul class="subcategory-list">
                                        <?php foreach ($subcategories[$category['id']] as $item) { ?>
                                            <li><a href="index.php?subcategoryId=<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                    <?php }
                        }
                    }
                    ?>
                    <!-- Add more categories dynamically -->
                    </ul>
            </div>
            <div class="main">
                <!-- banner List -->
                <?php if ($home_page) { ?>

                    <div class="banner-section">
                        <img src="./assets/images/banner.jpg" alt="">
                    </div>
                    <div class="sub-banner-section">
                        <ul>

                            <?php if (isset($allSubCategory)) {
                                foreach ($allSubCategory as $subitem) { ?>
                                    <li><a href="index.php?subcategoryId=<?= $subitem['id'] ?>"><?= $subitem['name'] ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>

                <?php } ?>
                <div class="product-list">
                    <?php if ($products) {
                        foreach ($products as $product) { ?>
                            <div class="product-card">
                                <a href="productDetails.php?id=1">
                                    <img src="./uploads/<?= $product['image'] ?>" alt="<?= substr($product['name'], 0, 30) ?>">
                                    <h4><?= showText($product['name']) ?></h4>
                                </a>
                                <p class="price">BDT <?= $product['price'] ?></p>
                                <a href="index.php?addToCart=<?= $product['id'] ?>" class="add-to-cart">Add to Cart</a>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="not-found-div">
                            <img src="./assets/images/product.png" alt="">
                            <h3>Opps ! No Items found</h3>
                        </div>
                    <?php } ?>

                </div>
            </div>

        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy;All rights reserved.</p>
        </div>
    </footer>

</body>

</html>