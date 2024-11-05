
<?php
require_once('files/functions.php');
$categories = db_select('categories', '1 ORDER BY id ASC');


$cart_count = 0;
$cart_items = [];
$cart_total = 0;
$my_cart_counter = 0;
if(isset($_SESSION['cart'])){
    if(is_array($_SESSION['cart'])){
        $_SESSION['cart'] = array_reverse($_SESSION['cart']);
        foreach($_SESSION['cart'] as $key => $item){
            $cart_total += $item['pro']['buying_price']*$item['quantity'];
            $my_cart_counter ++;
            if($my_cart_counter > 10){
                continue;
            }
            $cart_items[] = $item;
        }
        $cart_count = count($_SESSION['cart']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from cartzilla.createx.studio/home-fashion-store-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Oct 2023 15:48:22 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>Cartzilla | Fashion Store v.1</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cartzilla - Bootstrap E-commerce Template">
    <meta name="keywords"
        content="bootstrap, shop, e-commerce, market, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
</head>
<!-- Body-->

<body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
        <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
            style="display: none; visibility: hidden;"></iframe>
    </noscript>
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>
    // Khi modal được hiển thị, tự động chuyển hướng tới login.php
    document.getElementById('signin-modal').addEventListener('shown.bs.modal', function () {
        window.location.href = 'login.php';
    });
    </script>
    <main class="page-wrapper">
        <!-- Quick View Modal-->
        
        <!-- Navbar 3 Level (Light)-->
        <header class="shadow-sm">
            <!-- Topbar-->
            <div class="topbar topbar-dark bg-dark">
                <div class="container">
                    <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#"
                            data-bs-toggle="dropdown">Useful links</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tel:00331697720"><i
                                        class="ci-support text-muted me-2"></i>(84)977777777</a></li>
                            
                        </ul>
                    </div>
                    <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                            class="text-muted me-1">Hỗ Trợ</span><a class="topbar-link" href="tel:00331697720">(84)977777777</a></div>
                            <div class="topbar-text text-nowrap d-none d-md-inline-block"><span
                            class="text-muted me-1"></span><a style="text-align: center;"le class="topbar-link" href="#">Xin Chào Bạn Đến Với Cửa Hàng</a></div>
                </div>
            </div>
            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0"
                            href="<?= url('') ?>"><img src="img/logo-dark.png" width="142" alt="Cartzilla"></a><a
                            class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index-2.html"><img
                                src="img/logo-icon.png" width="74" alt="Cartzilla"></a>
                        <div class="input-group d-none d-lg-flex mx-4">
                            <input class="form-control rounded-end pe-5" type="text"
                                placeholder="Tìm kiếm sản phẩm"><i
                                class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a
                                class="navbar-tool navbar-stuck-toggler" href="#"><span
                                    class="navbar-tool-tooltip">Expand menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a><a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html"><span
                                    class="navbar-tool-tooltip">Wishlist</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
                            </a>
                            
                            <?php if(is_logged_in()) { ?>
                                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-order.php">
                            <?php } else { ?>
                                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                            <?php } ?>

                            
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                <div class="navbar-tool-text ms-n3">
                                    <?php if(is_logged_in()) { ?>
                                    <small>Xin Chào, <?= $_SESSION['user']['ten_tai_khoan'] ?></small>
                                    <?php } else { ?>
                                        <small>Xin Chào, Đăng Nhập</small>
                                    <?php } ?>
                                    Tài Khoản Của Tôi</div>
                            </a>
                            <div class="navbar-tool dropdown ms-3"><a
                                    class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                    href="cart.php"><span class="navbar-tool-label"><?= $cart_count ?></span><i
                                        class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                                    href="cart.php"><small>Giỏ Hàng</small><?= number_format($cart_total) ?>đ</a>
                                <!-- Cart dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                        <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                            
                                            <?php foreach($cart_items as $key => $item)  {?>
                                                <div class="widget-cart-item pb-2 border-bottom">
                                                <a href="cart-process-remove.php?id=<?= $item['pro']['id'] ?>" class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span></a>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="product.php?id=<?= $item['pro']['id']?>"><img
                                                            src="<?= get_product_thumb($item['pro']['photo']) ?>" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="product.php?id=<?= $item['pro']['id']?>"><?= substr($item['pro']['name'],0,30) ?>...</a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2"><?= number_format( $item['pro']['buying_price']) ?><small>Đ</small></span><span
                                                                class="text-muted">x <?= $item['quantity'] ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php }?>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="fs-sm me-2 py-2"><span class="text-muted">Tổng:</span><span
                                                    class="text-accent fs-base ms-1"><?= number_format($cart_total) ?><small>Đ</small></span></div>
                                            <a class="btn btn-outline-secondary btn-sm" href="cart.php">Vào giỏ hàng<i class="ci-arrow-right ms-1 me-n1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <!-- Search-->
                            <div class="input-group d-lg-none my-3"><i
                                    class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" type="text" placeholder="">
                            </div>

                            <!-- Primary menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="<?= url('') ?>"
                                        >Trang Chủ</a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="shop.php">Cửa Hàng</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                            <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                                                <?php foreach ($categories as $category): ?>
                                                    <div class="widget widget-links mb-4">
                                                        <a href="shop.php?category_id=<?php echo $category['id']; ?>"> <!-- Thay đổi đường dẫn cho phù hợp -->
                                                            <p style="color: black;" class="fs-base mb-3"><?php echo htmlspecialchars($category['name']); ?></p>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>                            
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="account-order.php">Tài Khoản</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">Tài khoản người dùng</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Lịch sử đặt hàng</a></li>
                                                <li><a class="dropdown-item" href="#">Cài đặt tài khoản</a></li>
                                                <li><a class="dropdown-item" href="#">Phương thức thanh toán</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="login.php">Đăng Nhập / Đăng Kí</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">Trang Liên Hệ</a>
                                    <ul class="dropdown-menu">

                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="about.php">Thông tin về chúng tôi</a></li>
                                        <li><a class="dropdown-item" href="contact.php">Liên hệ</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <?php
        if (isset($_SESSION['alert'])) {

            ?>
            <div class="container pt-5">
                <div class="alert alert-<?= $_SESSION['alert']['type'] ?>">
                    <?= $_SESSION['alert']['message'] ?>
                </div>
            </div>
        <?php unset($_SESSION['alert']);
     } ?>
