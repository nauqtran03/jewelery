<?php
require_once('files/functions.php');
$id = $_GET['id'];
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $v){
        if($v['pro']['id'] == $id){
            unset($_SESSION['cart'][$key]);    
        }
    }
    
}


alert('success','Sản phẩm đã được xóa thành công vào giỏ hàng.');
header('Location: shop.php');