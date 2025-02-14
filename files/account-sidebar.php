<?php

require_once('files/functions.php');

$u = $_SESSION['user'];

?>
<!-- Thanh bên-->
<aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
  <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
    <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
      <div class="d-md-flex align-items-center">
        <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem;">
          <span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip" title="Điểm thưởng"><?= $u['id'] ?></span>
          <img class="rounded-circle" src="img/shop/account/avatar.jpg" alt="Lỗi">
        </div>
        <div class="ps-md-3">
          <h3 class="fs-base mb-0"><?= $u['ten_tai_khoan'] ?></h3>
          <span class="text-accent fs-sm"><?= $u['email'] ?></span>
        </div>
      </div>
      <a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false">
        <i class="ci-menu me-2"></i>Menu tài khoản
      </a>
    </div>
    <div class="d-lg-block collapse" id="account-menu">
      <div class="bg-secondary px-4 py-3">
        <h3 class="fs-sm mb-0 text-muted">Bảng điều khiển Admin</h3>
      </div>
      <ul class="list-unstyled mb-0">
        <li class="border-bottom mb-0">
          <a class="nav-link-style d-flex align-items-center px-4 py-3" href="admin-products-add.php">
            <i class="ci-user opacity-60 me-2"></i>Tạo sản phẩm
          </a>
        </li>
        <li class="border-bottom mb-0">
          <a class="nav-link-style d-flex align-items-center px-4 py-3" href="admin-products.php">
            <i class="ci-user opacity-60 me-2"></i>Sản phẩm
          </a>
        </li>
        <li class="border-bottom mb-0">
          <a class="nav-link-style d-flex align-items-center px-4 py-3" href="admin-categories.php">
            <i class="ci-user opacity-60 me-2"></i>Danh mục sản phẩm
          </a>
        </li>
        <li class="border-bottom mb-0">
          <a class="nav-link-style d-flex align-items-center px-4 py-3" href="admin-categories-add.php">
            <i class="ci-user opacity-60 me-2"></i>Tạo danh mục sản phẩm
          </a>
        </li>
      </ul>
    </div>
    <div class="bg-secondary px-4 py-3">
      <h3 class="fs-sm mb-0 text-muted">Tài khoản của tôi</h3>
    </div>
    <ul class="list-unstyled mb-0">
      <li class="border-bottom mb-0">
        <a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-order.php">
          <i class="ci-user opacity-60 me-2"></i>Đơn hàng của tôi
        </a>
      </li>
      <li class="border-top mb-0">
        <a class="nav-link-style d-flex align-items-center px-4 py-3" href="logout.php">
          <i class="ci-sign-out opacity-60 me-2"></i>Đăng xuất
        </a>
      </li>
    </ul>
  </div>
</aside>
