
<?php
require_once('files/functions.php');
protected_erea();
    require_once('files/header.php');
?>

<div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url('') ?>"><i class="ci-home"></i>Trang chủ</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="#">Tài khoản</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">
                Đơn đặt hàng của tôi</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">
            Đơn đặt hàng của tôi</h1>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <?php require_once('files/account-sidebar.php') ?>
          <!-- Content  -->
          <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
              <div class="d-flex align-items-center">
                <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sắp xếp:</label>
                <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sắp xếp:</label>
                <select class="form-select" id="order-sort">
                  <option>Tất cả</option>
                  <option>Đã giao hàng</option>
                  <option>Đang tiến hành</option>
                  <option>Bị trì hoãn</option>
                  <option>Đã hủy</option>
                </select>
              </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i class="ci-sign-out me-2"></i>Đăng xuất</a>
            </div>
          </section>
        </div>
      </div>


      <?php
    require_once('files/footer.php');
?>  