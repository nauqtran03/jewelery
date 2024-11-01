
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
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab"
                                data-bs-toggle="tab" role="tab" aria-selected="true"><i
                                    class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab"
                                role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form class="needs-validation tab-pane fade show active" autocomplete="off" novalidate
                        id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" type="email" id="si-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" placeholder="johndoe@example.com"
                                required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                        class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                        class="ci-support text-muted me-2"></i>(00) 33 169 7720</a></li>
                            <li><a class="dropdown-item" href="order-tracking.html"><i
                                        class="ci-location text-muted me-2"></i>Order tracking</a></li>
                        </ul>
                    </div>
                    <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                            class="text-muted me-1">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33
                            169 7720</a></div>
                    <div class="tns-carousel tns-controls-static d-none d-md-block">
                        <div class="tns-carousel-inner"
                            data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                            <div class="topbar-text">Free shipping for order over $200</div>
                            <div class="topbar-text">We return money within 30 days</div>
                            <div class="topbar-text">Friendly 24/7 customer support</div>
                        </div>
                    </div>
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
                                placeholder="Search for products"><i
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
                                    <small>Hello, <?= $_SESSION['user']['ten_tai_khoan'] ?></small>
                                    <?php } else { ?>
                                        <small>Hello, Sign in</small>
                                    <?php } ?>
                                    My Account</div>
                            </a>
                            <div class="navbar-tool dropdown ms-3"><a
                                    class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                    href="cart.php"><span class="navbar-tool-label"><?= $cart_count ?></span><i
                                        class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                                    href="cart.php"><small>My Cart</small><?= $cart_total ?>đ</a>
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
                                                                class="text-accent me-2"><?= $item['pro']['buying_price'] ?><small>Đ</small></span><span
                                                                class="text-muted">x <?= $item['quantity'] ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php }?>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span
                                                    class="text-accent fs-base ms-1"><?= $cart_total ?><small>Đ</small></span></div>
                                            <a class="btn btn-outline-secondary btn-sm" href="cart.php">Expand
                                                cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                                        </div><a class="btn btn-primary btn-sm d-block w-100"
                                            href="check-out.php"><i
                                                class="ci-card me-2 fs-base align-middle"></i>Checkout</a>
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
                                <input class="form-control rounded-start" type="text" placeholder="Search for products">
                            </div>

                            <!-- Primary menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="<?= url('') ?>"
                                        >Trang Chủ</a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="shop.php">Shop</a>
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
                                    <a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">Tài Khoản</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">Tài khoản người dùng</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="account-orders.html">Lịch sử đặt hàng</a></li>
                                                <li><a class="dropdown-item" href="account-profile.html">Profile
                                                        Settings</a></li>
                                                <li><a class="dropdown-item" href="account-address.html">Account
                                                        Addresses</a></li>
                                                <li><a class="dropdown-item" href="account-payment.html">Payment
                                                        Methods</a></li>
                                                <li><a class="dropdown-item" href="account-wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-tickets.html">My Tickets</a>
                                                </li>
                                                <li><a class="dropdown-item" href="account-single-ticket.html">Single
                                                        Ticket</a></li>
                                            </ul>
                                        </li>

                                        <li><a class="dropdown-item" href="login.php">Sign In / Sign Up</a>
                                        </li>
                                        <li><a class="dropdown-item" href="account-password-recovery.html">Password
                                                Recovery</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">Pages</a>
                                    <ul class="dropdown-menu">

                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">Help Center</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="help-topics.html">Help Topics</a>
                                                </li>
                                                <li><a class="dropdown-item" href="help-single-topic.html">Single
                                                        Topic</a></li>
                                                <li><a class="dropdown-item" href="help-submit-request.html">Submit a
                                                        Request</a></li>
                                            </ul>
                                        </li>
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
