<?php
require_once('files/functions.php');
protected_erea();

$categories = db_select('categories', '1 ORDER BY id DESC');
// echo'<pre>';
// print_r($categories);
// die();

require_once('files/header.php');
?>

<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang chủ</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">
          Danh mục sản phẩm</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">
      Danh mục sản phẩm</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <?php require_once('files/account-sidebar.php') ?>
    <!-- Content  -->
    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
      <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
        <!-- Title-->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
          <h2 class="h3 py-2 me-2 text-center text-sm-start">
          Danh mục sản phẩm<span
              class="badge bg-faded-accent fs-sm text-body align-middle ms-2">5</span></h2>
          <div class="py-2">
            <div class="d-flex flex-nowrap align-items-center pb-3">
              <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sắp xếp theo:</label>
              <select class="form-select form-select-sm me-2" id="sorting">
                <option>Ngày tạo</option>
                <option>Tên sản phẩm</option>
                <option>Giá</option>
                <option>Đánh giá của bạn</option>
                <option>Cập nhật</option>
              </select>
              <!-- <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i class="ci-arrow-up"></i></button> -->
            </div>
          </div>
        </div>

        <?php
        foreach ($categories as $key => $category) {
          echo category_item_ui_7($category);
        }
        ?>
      </div>
    </section>
  </div>
</div>


<?php
require_once('files/footer.php');
?>