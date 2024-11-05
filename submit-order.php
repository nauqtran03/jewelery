<?php
require_once('files/functions.php');
$user = $_SESSION['user'];

$total = 0;
foreach($_SESSION['cart'] as $key =>$val){
    $total += $val['quantity']* $val['pro']['buying_price'];
}

db_insert(
    'orders',
    [
        'custumer_id'=> $user['id'],
        'order_status' => 1,
        'shipping'=> json_encode($_SESSION['shipping']),
        'cart' => json_encode($_SESSION['cart']),
        'user' => json_encode($_SESSION['user']),
        'total_price' => $total,
    ]
);

$_SESSION['cart'] = null;
unset($_SESSION['carrt']);
unset($_SESSION['shipping']);

header('Location: checkout-complete.php');