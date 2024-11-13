<?php

require_once('files/functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['mat_khau']);
$password_1 = trim($_POST['mat_khau_1']);
$phone = trim($_POST['sdt']);
$address = trim($_POST['dia_chi']);
$username = trim($_POST['ten_dang_nhap']);
$user = trim($_POST['ten_tai_khoan']);

// if (!preg_match('/^\d{10}$/', $phone)) {
//     alert('danger', 'Số điện thoại không hợp lệ. Vui lòng nhập đúng 10 chữ số.');
//     header('Location: login.php');
//     die();
// }

if($password != $password_1){
    alert('danger','Mật khẩu không trùng khớp.');
    header('Location: login.php');
    die();
}

$sql = "SELECT * FROM users WHERE email ='{$email}'";
$res = $conn->query($sql);

if($res->num_rows > 0){
    alert('danger','Người dùng đã tồn tại.');
    header('Location: login.php');
    die();
}
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users (
        ten_tai_khoan,
        ten_dang_nhap,
        email,
        sdt,
        dia_chi,
        mat_khau
)VALUES(
        '{$user}',
        '{$username}',
        '{$email}',
        '{$phone}',
        '{$address}',
        '{$password}'
)";

if($conn->query($sql)){
    login_user($email,$password);
    alert('success','Tài khoản đã đăng kí thành công.');
    header('Location: account-order.php');
    die();
}else{
    alert('danger','Đăng kí tài khoản thất bại.');
    header('Location: login.php');
    die();
}

