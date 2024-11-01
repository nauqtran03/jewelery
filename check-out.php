<?php

require_once('files/functions.php');

if (isset($_POST['ten_tai_khoan'])) {
    echo '<pre>';
    print_r($_POST);
    die();
    $_SESSION['shipping']['ten_tai_khoan'] = $_POST['ten_tai_khoan'];
    $_SESSION['shipping']['sdt'] = $_POST['sdt'];
    $_SESSION['shipping']['dia_chi'] = $_POST['dia_chi'];
}

require_once('files/functions.php');

if (!isset($_SESSION['user'])) {
    alert('warning', 'Đăng kí hoặc đăng nhập trước khi bạn đặt hàng.');
    header('Location: login.php');
    die();
}
$cart_items = [];
$_SESSION['cart'];
if (isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
}
$u = $_SESSION['user'];
require_once('files/header.php');




?>
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i
                                class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Checkout</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <section class="col-lg-8">
            <form action="review.php" method="post">
                <!-- Steps-->
                <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="cart.php">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div class="step-label"><i class="ci-cart"></i>Cart</div>
                    </a><a class="step-item active current" href="check-out.php">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Checkout</div>
                    </a>
                    </a><a class="step-item" href="review.php">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Review</div>
                    </a>
                </div>
                <!-- Autor info-->
                <div
                    class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                    <div class="d-flex align-items-center">
                        <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span
                                class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip"
                                title="Reward points"><?= $u['id'] ?></span><img class="rounded-circle"
                                src="img/user.jpg" width="90" alt="<Ảnh lỗi"></div>
                        <div class="ps-3">
                            <h3 class="fs-base mb-0"><?= $u['ten_tai_khoan'] ?></h3><span
                                class="text-accent fs-sm"><?= $u['email'] ?></span>
                        </div>
                    </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i
                            class="ci-edit me-2"></i>Edit profile</a>
                </div>
                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?= text_input([
                                'name' => 'name',
                                'label' => 'Name',
                                'value' => $u['ten_tai_khoan'],
                                'attributes' => 'required'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?= text_input([
                                'name' => 'phone',
                                'label' => 'Phone',
                                'value' => $u['sdt'],
                                'attributes' => 'required'
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <?= text_input([
                                'name' => 'address',
                                'label' => 'Address',
                                'value' => $u['dia_chi'],
                                'attributes' => 'required'
                            ]) ?>
                        </div>
                    </div>
                </div>

                <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="same-address">
                    <label class="form-check-label" for="same-address">Same as shipping address</label>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                                Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                    <div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100"
                            href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to
                                Shipping</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
                </div>
            </form>
        </section>
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
            <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                <div class="py-2 px-xl-2">
                    <div class="widget mb-3">
                        <h2 class="widget-title text-center">Order summary</h2>
                        <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                href="shop-single-v1.html"><img src="img/shop/cart/widget/01.jpg" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title"><a href="shop-single-v1.html">Women Colorblock
                                        Sneakers</a></h6>
                                <div class="widget-product-meta"><span
                                        class="text-accent me-2">$150.<small>00</small></span><span class="text-muted">x
                                        1</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                href="shop-single-v1.html"><img src="img/shop/cart/widget/02.jpg" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title"><a href="shop-single-v1.html">TH Jeans City
                                        Backpack</a></h6>
                                <div class="widget-product-meta"><span
                                        class="text-accent me-2">$79.<small>50</small></span><span class="text-muted">x
                                        1</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                href="shop-single-v1.html"><img src="img/shop/cart/widget/03.jpg" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title"><a href="shop-single-v1.html">3-Color Sun Stash Hat</a>
                                </h6>
                                <div class="widget-product-meta"><span
                                        class="text-accent me-2">$22.<small>50</small></span><span class="text-muted">x
                                        1</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-2 border-bottom"><a class="d-block flex-shrink-0"
                                href="shop-single-v1.html"><img src="img/shop/cart/widget/04.jpg" width="64"
                                    alt="Product"></a>
                            <div class="ps-2">
                                <h6 class="widget-product-title"><a href="shop-single-v1.html">Cotton Polo Regular
                                        Fit</a></h6>
                                <div class="widget-product-meta"><span
                                        class="text-accent me-2">$9.<small>00</small></span><span class="text-muted">x
                                        1</span></div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled fs-sm pb-2 border-bottom">
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Subtotal:</span><span class="text-end">$265.<small>00</small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Shipping:</span><span class="text-end">—</span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Taxes:</span><span class="text-end">$9.<small>50</small></span></li>
                        <li class="d-flex justify-content-between align-items-center"><span
                                class="me-2">Discount:</span><span class="text-end">—</span></li>
                    </ul>
                    <h3 class="fw-normal text-center my-4">$274.<small>50</small></h3>
                    <form class="needs-validation" method="post" novalidate>
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Promo code" required>
                            <div class="invalid-feedback">Please provide promo code.</div>
                        </div>
                        <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                    </form>
                </div>
            </div>
        </aside>
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to
                            Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span
                            class="d-none d-sm-inline">Proceed to Shipping</span><span
                            class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>



<?php
require_once('files/footer.php');
?>