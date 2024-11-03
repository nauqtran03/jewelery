<?php
require_once('files/functions.php');
$user = $_SESSION['user'];
if(isset($_POST['ten_tai_khoan'])){
    $_SESSION['contact']['ten_tai_khoan'] = $_POST['ten_tai_khoan'];
    $_SESSION['contact']['email'] = $_POST['email'];
    $_SESSION['contact']['noi_dung'] = $_POST['noi_dung'];
}
db_insert(
    'contact',
    [
        'contact_id'=> $user['id'],
        'noi_dung'=> json_encode($_SESSION['contact']),
        
    ]
);
header('Location: index.php');