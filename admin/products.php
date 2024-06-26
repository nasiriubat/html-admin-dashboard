<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="site-name">My Online Shop</div>
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
                <a href="index.html">Dashboard</a>
            </h3>
            <ul>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="customers.html">Customers</a></li>
                <li><a href="orders.html">Orders</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="settings.html">Settings</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="top-bar">
                <h2>All Products</h2>
                <a href="" class="btn">Back</a>
            </div>
            <div class="main-content">
                <div class="button-area">
                    <a class="btn btn-create" href="./create_product.php">Create Product</a>
                </div>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th width="5%">Sl.</th>
                            <th width="20%">Name</th>
                            <th width="20%">Category</th>
                            <th width="20%">Price</th>
                            <th width="15%">Quantity</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Asus Laptop</td>
                            <td>Electronic</td>
                            <td>200$</td>
                            <td>20</td>
                            <td class="action-btn">
                                <a class="btn btn-view" href="/">View</a>
                                <a class="btn btn-edit" href="/">Edit</a>
                                <a class="btn btn-delete" href="/">Delete</a>
                            </td>
                        </tr><tr>
                            <td>2</td>
                            <td>Asus Laptop</td>
                            <td>Electronic</td>
                            <td>200$</td>
                            <td>20</td>
                            <td class="action-btn">
                                <a class="btn btn-view" href="/">View</a>
                                <a class="btn btn-edit" href="/">Edit</a>
                                <a class="btn btn-delete" href="/">Delete</a>
                            </td>
                        </tr><tr>
                            <td>3</td>
                            <td>Asus Laptop</td>
                            <td>Electronic</td>
                            <td>200$</td>
                            <td>20</td>
                            <td class="action-btn">
                                <a class="btn btn-view" href="/">View</a>
                                <a class="btn btn-edit" href="/">Edit</a>
                                <a class="btn btn-delete" href="/">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>        </div>
    </div>
    
</body>
</html>
