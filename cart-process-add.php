<?php
require_once('files/functions.php');
$id = $_POST['id'];
$pro =get_product($id);

if($pro == null){
    die('Không tìm thấy sản phẩm.');
}

$pro['quantity'] = ((int)($_POST['quantity']));
$_SESSION['cart'][$id] = $pro;

alert('success','Sản phẩm đã được thêm thành công vào giỏ hàng.');
header('Location: shop.php');