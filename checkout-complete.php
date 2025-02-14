<?php
require_once('files/header.php');
require_once('files/functions.php');

$cart_items = [];
$u = isset($_SESSION['user']) ? $_SESSION['user'] : null;

// Kiểm tra xem giỏ hàng có tồn tại trong session không
if (isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
}
?>

<div class="container pb-5 mb-sm-4">
    <div class="pt-5">
        <div class="card py-3 mt-sm-3">
            <div class="card-body text-center">
                <h2 class="h4 pb-3">Cảm ơn bạn đã đặt hàng!</h2>
                <p class="fs-sm mb-2">Đơn hàng của bạn đã được đặt và sẽ được xử lý trong thời gian sớm nhất.
                </p>
                
                <?php if ($u): ?>
                    <!-- Hiển thị thông tin tài khoản -->
                    <p class="fs-sm mb-2">
                        Tên tài khoản: <span class='fw-medium'><?= htmlspecialchars($u['ten_tai_khoan']) ?></span>
                    </p>
                    <p class="fs-sm mb-2">
                        Email: <span class='fw-medium'><?= htmlspecialchars($u['email']) ?></span>
                    </p>
                    <p class="fs-sm mb-2">
                        Số điện thoại: <span class='fw-medium'><?= htmlspecialchars($u['sdt']) ?></span>
                    </p>
                <?php else: ?>
                    <p class="fs-sm mb-2">We could not retrieve your account information.</p>
                <?php endif; ?>

                <p class="fs-sm">Bạn sẽ sớm nhận được email xác nhận đơn đặt hàng của bạn. <u>Bây giờ bạn có thể:</u></p>
                <a class="btn btn-secondary mt-3 me-3" href="shop.php">Quay lại mua sắm</a>
                <a class="btn btn-primary mt-3" href="account-order.php"><i class="ci-location"></i>&nbsp;Đi đến đơn hàng của tôi</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once('files/footer.php');
?>  
