<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="site-name">
            <a href="../index.php">E-Shop</a>
        </div>
        <div class="nav-right">
            <a href="profile.html">
                <img class="img profile-img" src="../admin/assets/images/margot.jpg" alt="profile-img">
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

                <li><a href="orders.html">Orders</a></li>

            </ul>
        </div>
        <div class="content">
            <h2>Welcome to the Customer Dashboard</h2>
            <div class="dashboard">
                <hr>
                <div class="main-content">
                    <h3 class="text-center bg-color">Orders</h3>

                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th width="10%">Order ID</th>
                                <th width="25%">Cutomer Name</th>
                                <th width="25%">Cutomer Address</th>
                                <th width="15%">Total amount</th>
                                <th width="15%">Status</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nishat Tasnim</td>
                                <td>Uttara, Dhaka</td>
                                <td>200$</td>
                                <td>Pending</td>
                                <td><a class="btn btn-view" href="/">View</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nishat Tasnim</td>
                                <td>Uttara, Dhaka</td>
                                <td>200$</td>
                                <td>Pending</td>
                                <td><a class="btn btn-view" href="/">View</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Nishat Tasnim</td>
                                <td>Uttara, Dhaka</td>
                                <td>200$</td>
                                <td>Pending</td>
                                <td><a class="btn btn-view" href="/">View</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Nishat Tasnim</td>
                                <td>Uttara, Dhaka</td>
                                <td>200$</td>
                                <td>Pending</td>
                                <td><a class="btn btn-view" href="/">View</a></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>