<?php
require_once('files/functions.php');
$user = $_SESSION['user'];

$shipping = isset($_SESSION['shipping']) ? $_SESSION['shipping'] : [];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$userData = isset($_SESSION['user']) ? $_SESSION['user'] : [];
echo"<pre>";
print_r([
    'custumer_id'=> $user['id'],
    'order_status' => 1,
    'shipping'=> json_encode($_SESSION['shipping']),
    'cart' => json_encode($_SESSION['cart']),
    'user' => json_encode($_SESSION['user']),
    'order_date' =>time()
]);
die();
db_insert(
    'orders',
    [
        'custumer_id'=> $user['id'],
        'order_status' => 1,
        'shipping'=> json_encode($_SESSION['shipping']),
        'cart' => json_encode($_SESSION['cart']),
        'user' => json_encode($_SESSION['user']),
        'order_date' =>time()
    ]
);
