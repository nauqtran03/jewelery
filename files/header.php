<?php
require_once('files/functions.php');
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
    <!-- Google Tag Manager-->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    '../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKV3GT5');
    </script>
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
        <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Go to product page">Sports Hooded Sweatshirt<i
                                    class="ci-arrow-right fs-lg ms-2"></i></a></h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Product gallery-->
                            <div class="col-lg-7 pe-lg-0">
                                <div class="product-gallery">
                                    <div class="product-gallery-preview order-sm-2">
                                        <div class="product-gallery-preview-item active" id="first"><img
                                                class="image-zoom" src="img/shop/single/gallery/01.jpg"
                                                data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="second"><img class="image-zoom"
                                                src="img/shop/single/gallery/02.jpg"
                                                data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="third"><img class="image-zoom"
                                                src="img/shop/single/gallery/03.jpg"
                                                data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                        <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom"
                                                src="img/shop/single/gallery/04.jpg"
                                                data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                                            <div class="image-zoom-pane"></div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-thumblist order-sm-1"><a
                                            class="product-gallery-thumblist-item active" href="#first"><img
                                                src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#second"><img
                                                src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#third"><img
                                                src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a
                                            class="product-gallery-thumblist-item" href="#fourth"><img
                                                src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a></div>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                                <div class="product-details ms-auto pb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2"><a
                                            href="shop-single-v1.html#reviews">
                                            <div class="star-rating"><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star-filled active"></i><i
                                                    class="star-rating-icon ci-star"></i>
                                            </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74
                                                Reviews</span>
                                        </a>
                                        <button class="btn-wishlist" type="button" data-bs-toggle="tooltip"
                                            title="Add to wishlist"><i class="ci-heart"></i></button>
                                    </div>
                                    <div class="mb-3"><span
                                            class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                                        <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span
                                            class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                                    </div>
                                    <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span
                                            class="text-muted" id="colorOptionText">Red/Dark blue/White</span></div>
                                    <div class="position-relative me-n4 mb-3">
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color1"
                                                data-bs-label="colorOptionText" value="Red/Dark blue/White" checked>
                                            <label class="form-option-label rounded-circle" for="color1"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color2"
                                                data-bs-label="colorOptionText" value="Beige/White/Black">
                                            <label class="form-option-label rounded-circle" for="color2"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                                        </div>
                                        <div class="form-check form-option form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="color" id="color3"
                                                data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                                            <label class="form-option-label rounded-circle" for="color3"><span
                                                    class="form-option-color rounded-circle"
                                                    style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
                                        </div>
                                        <div class="product-badge product-available mt-n1"><i
                                                class="ci-security-check"></i>Product available</div>
                                    </div>
                                    <form class="mb-grid-gutter">
                                        <div class="mb-3">
                                            <label class="fw-medium pb-1" for="product-size">Size:</label>
                                            <select class="form-select" required id="product-size">
                                                <option value="">Select size</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center">
                                            <select class="form-select me-3" style="width: 5rem;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i
                                                    class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                                        </div>
                                    </form>
                                    <h5 class="h6 mb-3 pb-2 border-bottom"><i
                                            class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product
                                        info</h5>
                                    <h6 class="fs-sm mb-2">Style</h6>
                                    <ul class="fs-sm ps-4">
                                        <li>Hooded top</li>
                                    </ul>
                                    <h6 class="fs-sm mb-2">Composition</h6>
                                    <ul class="fs-sm ps-4">
                                        <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                        <li>Lining: Cotton 100%</li>
                                        <li>Cotton 80%, Polyester 20%</li>
                                    </ul>
                                    <h6 class="fs-sm mb-2">Art. No.</h6>
                                    <ul class="fs-sm ps-4 mb-0">
                                        <li>183260098</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <small>Hello, <?= $_SESSION['user']['ten_tai_khoan']  ?></small>
                                    <?php } else { ?>
                                        <small>Hello, Sign in</small>
                                    <?php } ?>
                                    My Account</div>
                            </a>
                            <div class="navbar-tool dropdown ms-3"><a
                                    class="navbar-tool-icon-box bg-secondary dropdown-toggle"
                                    href="shop-cart.html"><span class="navbar-tool-label">4</span><i
                                        class="navbar-tool-icon ci-cart"></i></a><a class="navbar-tool-text"
                                    href="shop-cart.html"><small>My Cart</small>$265.00</a>
                                <!-- Cart dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                                        <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                            <div class="widget-cart-item pb-2 border-bottom">
                                                <button class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="shop-single-v1.html"><img
                                                            src="img/shop/cart/widget/01.jpg" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="shop-single-v1.html">Women Colorblock Sneakers</a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2">$150.<small>00</small></span><span
                                                                class="text-muted">x 1</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-cart-item py-2 border-bottom">
                                                <button class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="shop-single-v1.html"><img
                                                            src="img/shop/cart/widget/02.jpg" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="shop-single-v1.html">TH Jeans City Backpack</a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2">$79.<small>50</small></span><span
                                                                class="text-muted">x 1</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-cart-item py-2 border-bottom">
                                                <button class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="shop-single-v1.html"><img
                                                            src="img/shop/cart/widget/03.jpg" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="shop-single-v1.html">3-Color Sun Stash Hat</a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2">$22.<small>50</small></span><span
                                                                class="text-muted">x 1</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-cart-item py-2 border-bottom">
                                                <button class="btn-close text-danger" type="button"
                                                    aria-label="Remove"><span aria-hidden="true">&times;</span></button>
                                                <div class="d-flex align-items-center"><a class="flex-shrink-0"
                                                        href="shop-single-v1.html"><img
                                                            src="img/shop/cart/widget/04.jpg" width="64"
                                                            alt="Product"></a>
                                                    <div class="ps-2">
                                                        <h6 class="widget-product-title"><a
                                                                href="shop-single-v1.html">Cotton Polo Regular Fit</a>
                                                        </h6>
                                                        <div class="widget-product-meta"><span
                                                                class="text-accent me-2">$9.<small>00</small></span><span
                                                                class="text-muted">x 1</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span
                                                    class="text-accent fs-base ms-1">$265.<small>00</small></span></div>
                                            <a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">Expand
                                                cart<i class="ci-arrow-right ms-1 me-n1"></i></a>
                                        </div><a class="btn btn-primary btn-sm d-block w-100"
                                            href="checkout-details.html"><i
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
                                <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Home</a>

                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Shop</a>
                                    <div class="dropdown-menu p-0">
                                        <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                            <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">
                                                <div class="widget widget-links mb-4">
                                                    <a href="">
                                                    <h6 class="fs-base mb-3">Nhẫn Cưới</h6>
                                                    </a>
                                                    
                                                </div>
                                                <div class="widget widget-links mb-4">
                                                    <a href="">
                                                    <h6 class="fs-base mb-3">Nhẫn Cầu Hôn</h6>
                                                    </a>
                                                    
                                                </div>
                                                <div class="widget widget-links">
                                                    <a href="">
                                                    <h6 class="fs-base mb-3">Dây Chuyển</h6>
                                                    </a>
                                                    
                                                </div>
                                                <div class="widget widget-links">
                                                    <a href=""></a>
                                                    <h6 class="fs-base mb-3">Vòng Tay</h6>
                                                </div>
                                                <div class="widget widget-links">
                                                    <a href="#">
                                                    <h6 class="fs-base mb-3">Khuyên Tai</h6>
                                                    </a>  
                                                </div>
                                                <div class="widget widget-links">
                                                    <a href="">
                                                    <h6 class="fs-base mb-3">Lắc</h6>
                                                    </a>
                                                    
                                                </div>
                                            </div>                            
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside">Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">Shop User Account</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="account-orders.html">Orders
                                                        History</a></li>
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
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">Vendor Dashboard</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="dashboard-purchases.html">Purchases</a></li>
                                                <li><a class="dropdown-item"
                                                        href="dashboard-favorites.html">Favorites</a></li>
                                                <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                                                <li><a class="dropdown-item" href="dashboard-products.html">Products</a>
                                                </li>
                                                <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add
                                                        New Product</a></li>
                                                <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                data-bs-toggle="dropdown">NFT Marketplace<span
                                                    class="badge bg-danger ms-1">NEW</span></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="nft-account-settings.html">Profile
                                                        Settings</a></li>
                                                <li><a class="dropdown-item" href="nft-account-payouts.html">Wallet
                                                        &amp; Payouts</a></li>
                                                <li><a class="dropdown-item" href="nft-account-my-items.html">My
                                                        Items</a></li>
                                                <li><a class="dropdown-item" href="nft-account-my-collections.html">My
                                                        Collections</a></li>
                                                <li><a class="dropdown-item"
                                                        href="nft-account-favorites.html">Favorites</a></li>
                                                <li><a class="dropdown-item"
                                                        href="nft-account-notifications.html">Notifications</a></li>
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