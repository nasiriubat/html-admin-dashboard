<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <div class="login-container">
        <h2>E-Shop</h2>
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="register-div">
            <a href="register.php">Sign Up</a>
        </div>
    </div>
</body>

</html>

<?php
include './config/db_connect.php';
include './config/helper_function.php';

if (isLoggedIn()) {
    header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = login($conn, $email, $password);
    if ($user['role'] == 'admin') {
        echo "<script>sessionStorage.setItem('showAlert', 'Login successful!');window.location.href='./admin/index.php';</script>";
    } elseif ($user['role'] == 'customer') {
        echo "<script>sessionStorage.setItem('showAlert', 'Login successful!');window.location.href='./customer/index.php';</script>";
    } elseif ($user['role'] == 'rider') {
        echo "<script>sessionStorage.setItem('showAlert', 'Login successful!');window.location.href='./rider/index.php';</script>";
    } else {
        echo "<script>sessionStorage.setItem('showAlert', 'Login failed. Please check your credentials and try again.');window.location.href='login.php';</script>";
    }
}
?>