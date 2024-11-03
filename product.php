<?php
if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];

}
if ($id < 1) {
  die("ID không được tìm thấy.");
}

require_once('files/header.php');
$data = get_product($id);
$pro = $data['pro'];

if ($pro == null) {
  die("Không tìm thấy sản phẩm");
}
$images = get_product_photo($pro['photo']);
$products = db_select('products', '1 ORDER BY id DESC');
?>
<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url('') ?>"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="<?= url('') ?>/shop.php">Shop</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page"><?= $pro['name'] ?></li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0"><?= $pro['name'] ?></h1>
    </div>
  </div>
</div>
<div class="container">
  <!-- Gallery + details-->
  <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
    <div class="px-lg-3">
      <div class="row">
        <!-- Product gallery-->
        <div class="col-lg-7 pe-lg-0 pt-lg-4">
          <div class="product-gallery">
            <div class="product-gallery-preview order-sm-2">
              <div class="product-gallery-preview">
                <?php
                $active_class = 'active';
                foreach ($images as $key => $img) { ?>
                  <div class="product-gallery-preview-item <?= $active_class ?>" id="pro-<?= $key ?>"
                    style="width: 100%; height: auto; object-fit: contain; <?= $key > 0 ? 'display: none;' : '' ?>">
                    <img class="image-zoom" src="<?= $img->thumb ?>" data-zoom="<?= $img->src ?>" alt="Product image">
                  </div>
                  <?php
                  $active_class = ''; // Chỉ kích hoạt lớp active cho ảnh đầu tiên
                } ?>
              </div>

            </div>
            <div class="product-gallery-thumblist order-sm-1">
              <?php
              $active_class = 'active';
              foreach ($images as $key => $img) { ?>
                <a class="product-gallery-thumblist-item <?= $active_class ?>" href="#pro-<?= $key ?>">
                  <img src="<?= $img->thumb ?>" alt="Product thumb">

                </a>
                <?php $active_class = "";
              } ?>
              
              </a>
            </div>
          </div>
        </div>
        <!-- Product details-->
        <div class="col-lg-5 pt-4 pt-lg-0">
          <div class="product-details ms-auto pb-3">
            <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1"></span>
              </a>
              <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip"
                title="Add to wishlist"><i class="ci-heart"></i></button>
            </div>
            <div class="mb-3"><span
                class="h3 fw-normal text-accent me-1"><?= $pro['buying_price'] ?><small>Đ</small></span>
              <del class="text-muted fs-lg me-3"><?= $pro['price'] ?><small>Đ</small></del><span
                class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
            </div>

            <form action="cart-process-add.php" class="mb-grid-gutter" method="post">
              <input type="hidden" name="id" value="<?= $pro['id'] ?>">
              <div class="mb-3 d-flex align-items-center">
                <select name="quantity" class="form-select me-3" style="width: 5rem;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <?php if (isset($_SESSION['user'])): ?>
                  <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i
                      class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                <?php else: ?>
                  <?php

                  alert('warning', 'Bạn cần đăng nhập trước khi thêm sản phẩm vào giỏ hàng.');
                  ?>
                  <button class="btn btn-secondary d-block w-100" type="button"
                    onclick="window.location.href='login.php'"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                <?php endif; ?>
              </div>
            </form>

            <!-- Product panels-->
            <div class="accordion mb-4" id="productPanels">
              <div class="accordion-item">
                <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button"
                    data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i
                      class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
                  <div class="accordion-body">
                    <!-- <h6 class="fs-sm mb-2">Composition</h6> -->
                    <ul class="fs-sm ps-4">
                      <li>Mô tả: <?= $pro['description'] ?></li>
                      <li>Ngày nhập: <?= $pro['created_at'] ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sharing-->
            <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a
              class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a
              class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a
              class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product carousel (Style with)-->
  <div class="container pt-5">
    <h2 class="h3 text-center pb-4">Style with</h2>
    <div class="tns-carousel tns-controls-static tns-controls-outside">
      <div class="tns-carousel-inner"
        data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">
        <!-- Product-->
        <?php
        $count = 0; // Khởi tạo biến đếm
        foreach ($products as $key => $pro) {
          if ($count < 12) { // Chỉ hiển thị nếu số lượng sản phẩm chưa đạt 8
            echo product_item_ui_6($pro);
            $count++; // Tăng biến đếm lên 1 sau khi hiển thị sản phẩm
          }
        }
        ?>



      </div>
    </div>
  </div>
  <?php
  require_once('files/footer.php');
  ?>
  <script>
    document.querySelectorAll('.product-gallery-thumblist-item').forEach((thumb, index) => {
      thumb.addEventListener('click', function (event) {
        event.preventDefault();
        // Ẩn tất cả ảnh trong gallery
        document.querySelectorAll('.product-gallery-preview-item').forEach(item => {
          item.style.display = 'none';
        });
        // Hiện ảnh được chọn
        document.getElementById('pro-' + index).style.display = 'block';
      });
    });
  </script>