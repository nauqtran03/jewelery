<?php

require_once('files/functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['mat_khau']);

if(login_user($email,$password)){
    alert('success','Bạn đã đăng nhập thành công.');
    header('Location: index.php');
    die();
}else{
    alert('danger','Bạn nhập sai tài khoản hoặc mật khẩu.');
    header('Location: login.php');
}
