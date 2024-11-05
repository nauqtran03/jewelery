<?php
require_once('files/functions.php');
require_once('files/header.php');

// Kiểm tra nếu người dùng đã đăng nhập
$cart_items = $_SESSION['cart'] ?? [];
$subtotal = 0;

// Tính tổng giá trị giỏ hàng
foreach ($cart_items as $item) {
    $subtotal += $item['pro']['buying_price'] * $item['quantity'];
}

// Kiểm tra giỏ hàng có trống không
$is_cart_empty = empty($cart_items);
?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Your cart</h1>
        </div>
    </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php if (isset($_SESSION['user'])): ?>
            <?php if (!$is_cart_empty): ?>
                <!-- List of items-->
                <section class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                        <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="shop.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
                    </div>
                    <?php foreach ($cart_items as $key => $item): ?>
                        <!-- Item-->
                        <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                            <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                                <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="product.php?id=<?= $item['pro']['id'] ?>">
                                    <img src="<?= get_product_thumb($item['pro']['photo']) ?>" width="160" alt="Product">
                                </a>
                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2">
                                        <a href="product.php?id=<?= $item['pro']['id'] ?>"><?= substr($item['pro']['name'], 0, 45) ?></a>
                                    </h3>
                                    <div class="fs-sm"><span class="text-muted me-2">Giá: <?= number_format($item['pro']['buying_price']) ?>đ</span></div>
                                    <div class="fs-lg text-accent pt-2">Tổng: <?= number_format($item['pro']['buying_price'] * $item['quantity']) ?><small>Đ</small></div>
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                                <label class="form-label" for="quantity<?= $key ?>">Số lượng</label>
                                <input class="form-control" type="number" id="quantity<?= $key ?>" min="1" value="<?= $item['quantity'] ?>" onchange="updateQuantity(<?= $item['pro']['id'] ?>, this.value)">
                                <a class="btn btn-link px-0 text-danger" href="cart-process-remove.php?id=<?= $item['pro']['id'] ?>" type="button"><i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button class="btn btn-outline-accent d-block w-100 mt-4" type="button" onclick="updateCart()"><i class="ci-loading fs-base me-2"></i>Cập nhật giỏ hàng</button>
                </section>

                <!-- Sidebar-->
                <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                    <div class="bg-white rounded-3 shadow-lg p-4">
                        <div class="py-2 px-xl-2">
                            <div class="text-center mb-4 pb-3 border-bottom">
                                <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                                <h3 class="fw-normal"><?= number_format($subtotal) ?><small>Đ</small></h3>
                            </div>
                            <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="check-out.php"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
                        </div>
                    </div>
                </aside>
            <?php else: ?>
                <div class="col-lg-8">
                    <h2 class="h6 text-light mb-0">Giỏ hàng của bạn trống</h2>
                    <a class="btn btn-outline-primary btn-sm ps-2" href="shop.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="col-lg-8">
                <h2 class="h6 text-light mb-0">Vui lòng đăng nhập để xem giỏ hàng của bạn.</h2>
                <a class="btn btn-outline-primary btn-sm ps-2" href="login.php"><i class="ci-arrow-left me-2"></i>Đăng nhập</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
require_once('files/footer.php');
?>

<script>
    function updateQuantity(productId, quantity) {
        if (quantity < 1) {
            alert("Số lượng phải lớn hơn 0.");
            return;
        }
        fetch(`cart-process-update.php?id=${productId}&quantity=${quantity}`, {
            method: 'GET'
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  console.log("Quantity updated successfully");
              } else {
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error("Error updating quantity:", error);
          });
    }

    function updateCart() {
        const updates = [];
        document.querySelectorAll('input[type="number"]').forEach(input => {
            const productId = input.id.replace('quantity', ''); // Lấy ID sản phẩm từ id của input
            const quantity = input.value;
            updates.push({ id: productId, quantity: quantity });
        });

        fetch(`cart-process-update.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updates)
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  console.log("Cart updated successfully");
                  location.reload(); // Tải lại trang sau khi cập nhật
              } else {
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error("Error updating cart:", error);
          });
    }

    function removeItem(productId) {
        fetch(`cart-process-remove.php?id=${productId}`, {
            method: 'GET'
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  console.log("Item removed successfully");
                  location.reload(); // Tải lại trang sau khi xóa
              } else {
                  alert(data.message);
              }
          })
          .catch(error => {
              console.error("Error removing item:", error);
          });
    }
</script>
