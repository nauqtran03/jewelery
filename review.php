<?php
require_once('files/functions.php');
if(isset($_POST['ten_tai_khoan'])){
    $_SESSION['shipping']['ten_tai_khoan'] = $_POST['ten_tai_khoan'];
    $_SESSION['shipping']['sdt'] = $_POST['sdt'];
    $_SESSION['shipping']['dia_chi'] = $_POST['dia_chi'];
}




if (!isset($_SESSION['user'])) {
    alert('warning', 'Đăng kí hoặc đăng nhập trước khi bạn đặt hàng.');
    header('Location: login.php');
    die();
}


require_once('files/header.php');
$cart_items = [];
$_SESSION['cart'];
if(isset($_SESSION['cart'])){
    $cart_items = $_SESSION['cart'];
}

$u = $_SESSION['user'];

?>
<div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Review</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Review</h1>
          </div>
        </div>
      </div>
<div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <section class="col-lg-8">
            <form action="submit-order.php" method="post">
                <!-- Steps-->
            <div class="steps steps-light pt-2 pb-3 mb-5"><a class="step-item active" href="cart.php">
                <div class="step-progress"><span class="step-count">1</span></div>
                <div class="step-label"><i class="ci-cart"></i>Cart</div>
            </a>
            <a class="step-item active" href="check-out.php">
                <div class="step-progress"><span class="step-count">2</span></div>
                <div class="step-label"><i class="ci-user-circle"></i>Checkout</div>
            </a>
            <a class="step-item active current" href="review.php">
                <div class="step-progress"><span class="step-count">3</span></div>
                <div class="step-label"><i class="ci-check-circle"></i>Review</div>
            </a>
        </div>
           
            <!-- Shipping address-->
            <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
           

            <?php 
                foreach($cart_items as $key => $item){       
                    
            ?>
            <!-- Item-->
            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
              <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="product.php?id=<?= $item['pro']['id']?>"><img src="<?= get_product_thumb($item['pro']['photo']) ?>" width="160" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="product.php?id=<?= $item['pro']['id']?>"><?= substr($item['pro']['name'],0,45) ?></a></h3>
                  <div class="fs-sm"><span class="text-muted me-2">Giá: <?= $item['pro']['buying_price']?>đ</span></div>
                  <!-- <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div> -->
                  <div class="fs-lg text-accent pt-2">Tổng: <?= $item['pro']['buying_price']*$item['quantity'] ?><small>Đ</small></div>
                </div>
              </div>
              <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                
                
              </div>
            </div>
            <?php }?>


            <div class="form-check">
              <input class="form-check-input" type="checkbox" checked id="same-address">
              <label class="form-check-label" for="same-address">Same as shipping address</label>
            </div>
            <!-- Navigation (desktop)-->
            <div class="d-none d-lg-flex pt-4 mt-3">
              <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
              <div class="w-50 ps-2"><button type="submit" class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Submit order</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></button></div>
            </div>
            </form>
          </section>
         
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
          <div class="col-lg-8">
            <div class="d-flex pt-4 mt-3">
              <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100" href="cart.php"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></a></div>
              <div class="w-50 ps-2"><a class="btn btn-primary d-block w-100" href="checkout-shipping.html"><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></a></div>
            </div>
          </div>
        </div>
      </div>



<?php
require_once('files/footer.php');
?>