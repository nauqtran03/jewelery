<?php

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
                                class="ci-home"></i>Trang chủ</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Cửa hàng</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">
                    Thanh toán</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">
            Thanh toán</h1>
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
                        <div class="step-label"><i class="ci-cart"></i>Giỏ hàng</div>
                    </a><a class="step-item active current" href="check-out.php">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div class="step-label"><i class="ci-user-circle"></i>Thanh toán</div>
                    </a>
                    </a><a class="step-item" href="review.php">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div class="step-label"><i class="ci-check-circle"></i>Xem lại</div>
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
                    </div>
                </div>
                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Địa chỉ giao hàng</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?= text_input([
                                'name' => 'ten_tai_khoan',
                                'label' => 'Name',
                                'value' => $u['ten_tai_khoan'],
                                'attributes' => 'required'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <?= text_input([
                                'name' => 'sdt',
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
                                'name' => 'dia_chi',
                                'label' => 'Address',
                                'value' => $u['dia_chi'],
                                'attributes' => 'required'
                            ]) ?>
                        </div>
                    </div>
                </div>

                <h6 class="mb-3 py-3 border-bottom">Địa chỉ thanh toán</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked id="same-address">
                    <label class="form-check-label" for="same-address">Giống như địa chỉ giao hàng</label>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Quay lại giỏ hàng</span><span class="d-inline d-sm-none">Trở về</span></a></div>
                    <div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100"
                            href="checkout-shipping.html"><span class="d-none d-sm-inline">Tiến hành vận chuyển</span><span class="d-inline d-sm-none">Tiếp</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
                </div>
            </form>
        </section>
        <!-- Sidebar-->
        
    </div>
    <!-- Navigation (mobile)-->
    <div class="row d-lg-none">
        <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
                <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Quay lại giỏ hàng</span><span class="d-inline d-sm-none">Trở về</span></a></div>
                <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span
                            class="d-none d-sm-inline">Tiến hành vận chuyển</span><span
                            class="d-inline d-sm-none">Tiếp</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
        </div>
    </div>
</div>



<?php
require_once('files/footer.php');
?>