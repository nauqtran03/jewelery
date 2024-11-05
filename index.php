<?php
require_once('files/header.php');
require_once('files/functions.php');
$products = db_select('products', '1 ORDER BY id DESC');

?>
<!-- Hero slider-->
<section class="tns-carousel tns-controls-lg">
  <div class="tns-carousel-inner"
    data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #fff;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img
          class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/banner_nhan2.jpg"
          alt="Summer Collection">
      </div>
    </div>
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #fff;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img
          class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/banner_nhancauhon1.jpg"
          alt="Women Sportswear">
      </div>
    </div>
    <!-- Item-->
    <div class="px-lg-5" style="background-color: #fff;">
      <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img
          class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/banner_nhancauhon2.jpg"
          alt="Men Accessories">
      </div>
    </div>
</section>
<!-- Popular categories-->
<section class="container position-relative pt-3 pt-lg-0 pb-5 mt-lg-n10" style="z-index: 10;">
  <div class="row">
    <div class="col-xl-8 col-lg-9">
      <div class="card border-0 shadow-lg">
        <div class="card-body px-3 pt-grid-gutter pb-0">
          <div class="row g-0 ps-1">
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1"
                href="shop.php"><img class="d-block rounded mb-3" src="img/home/categories/nhan_cap_5.png"
                  alt="NhanCap">
                <h3 class="fs-base pt-1 mb-0">Nhẫn Cặp</h3>
              </a></div>
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1"
                href="shop.php"><img class="d-block rounded mb-3" src="img/home/categories/nhan_cuoi_3.png"
                  alt="NhanCuoi">
                <h3 class="fs-base pt-1 mb-0">Nhẫn Cưới</h3>
              </a></div>
            <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1"
                href="shop.php"><img class="d-block rounded mb-3" src="img/home/categories/vong_tay_2.png"
                  alt="VongTay">
                <h3 class="fs-base pt-1 mb-0">Vòng Tay</h3>
              </a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Products grid (Trending products)-->
<section class="container pt-md-3 pb-5 mb-md-3">
  <h2 class="h3 text-center">Sản Phẩm Phổ Biến</h2>
  <div class="row pt-4 mx-n2">
    <!-- Product-->
    <?php
    $count = 0; // Khởi tạo biến đếm
    foreach ($products as $key => $pro) {
      if ($count < 8) { // Chỉ hiển thị nếu số lượng sản phẩm chưa đạt 8
        echo product_item_ui_3($pro);
        $count++; // Tăng biến đếm lên 1 sau khi hiển thị sản phẩm
      }
    }
    ?>

  </div>
  <div class="text-center pt-3"><a class="btn btn-outline-accent" href="shop.php">More products<i
        class="ci-arrow-right ms-1"></i></a></div>
</section>
<!-- Banners-->
<section class="container pb-4 mb-md-3">
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-3">
        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
          <h4 class="fs-lg fw-light mb-2">Hurry up! Limited time offer</h4>
          <h3 class="mb-4">Converse All Star on Sale</h3><a class="btn btn-primary btn-shadow btn-sm"
            href="https://www.converse.vn/">Shop Now</a>
        </div><img class="d-block ms-auto" src="img/shop/catalog/banner.jpg" alt="Shop Converse">
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="d-flex flex-column h-100 justify-content-center bg-size-cover bg-position-center rounded-3"
        style="background-image: url(img/blog/banner-bg.jpg);">
        <div class="py-4 my-2 px-4 text-center">
          <div class="py-1">
            <h5 class="mb-2">Your Add Banner Here</h5>
            <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-primary btn-shadow btn-sm"
              href="contact.php">Contact us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Featured category (Hoodie)-->
<section class="container mb-4 pb-3 pb-sm-0 mb-sm-5">
  <div class="row">
    <!-- Banner with controls-->
    <div class="col-md-5">
      <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #e2e9ef;">
        <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
          <div>
            <h3 class="mb-1">Valentine day</h3><a class="fs-md" href="shop.php">Mua sắm<i
                class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
          </div>
          <div class="tns-carousel-controls" id="valentine-day">
            <button type="button"><i class="ci-arrow-left"></i></button>
            <button type="button"><i class="ci-arrow-right"></i></button>
          </div>
        </div><a class="d-none d-md-block mt-auto" href="shop.php"><img class="d-block w-100"
            src="img/home/categories/banner_01.jpg" alt="For Women"></a>
      </div>
    </div>
    <!-- Product grid (carousel)-->
    <div class="col-md-7 pt-4 pt-md-0">
  <div class="tns-carousel">
    <div class="tns-carousel-inner"
      data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#valentine-day&quot;}">
      
      <!-- Carousel page 1-->
      <div>
        <div class="row mx-n2">
          <?php
          $count = 0;
          $shown_products = []; // Mảng lưu trữ sản phẩm đã hiển thị

          foreach ($products as $key => $pro) {
            // Kiểm tra giới hạn sản phẩm
            if ($count >= 6) {
              break;
            }

            // Kiểm tra xem sản phẩm đã hiển thị chưa
            if (!in_array($key, $shown_products)) {
              // Hiển thị sản phẩm kiểu UI 4 hoặc UI 5
              if ($count < 4) {
                echo product_item_ui_4($pro);
              } else {
                echo product_item_ui_5($pro);
              }

              // Lưu trữ sản phẩm đã hiển thị
              $shown_products[] = $key;
              $count++;
            }
          }
          ?>
        </div>
      </div>

      <!-- Carousel page 2-->
      <div>
        <div class="row mx-n2">
          <?php
          // Reset biến đếm và lặp lại để hiển thị sản phẩm tiếp theo
          $count = 0;

          foreach ($products as $key => $pro) {
            if ($count >= 6) {
              break;
            }

            // Kiểm tra trùng lặp
            if (!in_array($key, $shown_products)) {
              if ($count < 4) {
                echo product_item_ui_4($pro);
              } else {
                echo product_item_ui_5($pro);
              }

              $shown_products[] = $key;
              $count++;
            }
          }
          ?>
        </div>
      </div>

    </div>
  </div>
</div>
        </div>
      </div>
    </div>
</section>
<?php
require_once('files/footer.php');
?>