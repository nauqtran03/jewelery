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
                <h2 class="h4 pb-3">Thank you for your order!</h2>
                <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                
                <?php if ($u): ?>
                    <!-- Hiển thị thông tin tài khoản -->
                    <p class="fs-sm mb-2">
                        Account name: <span class='fw-medium'><?= htmlspecialchars($u['ten_tai_khoan']) ?></span>
                    </p>
                    <p class="fs-sm mb-2">
                        Email: <span class='fw-medium'><?= htmlspecialchars($u['email']) ?></span>
                    </p>
                    <p class="fs-sm mb-2">
                        Phone: <span class='fw-medium'><?= htmlspecialchars($u['sdt']) ?></span>
                    </p>
                <?php else: ?>
                    <p class="fs-sm mb-2">We could not retrieve your account information.</p>
                <?php endif; ?>

                <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p>
                <a class="btn btn-secondary mt-3 me-3" href="shop.php">Go back shopping</a>
                <a class="btn btn-primary mt-3" href="account-order.php"><i class="ci-location"></i>&nbsp;Go to my order</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once('files/footer.php');
?>  
