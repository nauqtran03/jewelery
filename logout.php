<?php
session_start();

if (isset($_SESSION['cart'])) {
    $_SESSION['saved_cart'] = $_SESSION['cart'];
}

session_unset();
session_destroy();

header("Location: login.php");
exit();