<?php
require_once('files/header.php');

?>


<div class="container py-4 py-lg-5 my-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card border-0 shadow">
        <div class="card-body">
          <form action="login-logic.php" method="post">
            <h2 class="h4 mb-1">Đăng nhập</h2>
            <div class="py-3">
              <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">Dùng tải khoản mạng xã hội:</h3>
              <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#"
                  data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a
                  class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip"
                  title="Sign in with Facebook"><i class="ci-facebook"></i></a><a
                  class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip"
                  title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
            </div>
            <hr>
            <h3 class="fs-base pt-4 pb-2">Hoặc đăng nhập</h3>
            <form class="needs-validation" novalidate>
              <div class="input-group mb-3"><i
                  class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" name="email" type="email" placeholder="Email" required>
              </div>
              <div class="input-group mb-3"><i
                  class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                <div class="password-toggle w-100">
                  <input class="form-control" name="mat_khau" type="password" placeholder="Mật khẩu" required>
                  <label class="password-toggle-btn" aria-label="Show/hide password">
                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                  </label>
                </div>
              </div>
              <div class="d-flex flex-wrap justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked id="remember_me">
                  <label class="form-check-label" for="remember_me">Ghi nhớ tôi</label>
                </div><a class="nav-link-inline fs-sm" href="account-password-recovery.html">Quên mật khẩu?</a>
              </div>
              <hr class="mt-4">
              <div class="text-end pt-4">
                <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign In</button>
              </div>
            </form>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 pt-4 mt-3 mt-md-0">
      <h2 class="h4 mb-3">No account? Sign up</h2>
      <p class="fs-sm text-muted mb-4">Registration takes less than a minute but gives you full control over your
        orders.</p>
      <form method="post" action="register-logic.php" class="needs-validation" novalidate>
        <div class="row gx-4 gy-3">
          <div class="col-sm-6">
            <label class="form-label" for="reg-fn">Tên Tài Khoản</label>
            <input class="form-control" name="ten_tai_khoan" type="text" required id="reg-fn">
            <div class="invalid-feedback">Làm ơn điền tên tài khoản của bạn!</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="reg-ln">Tên Đăng Nhập</label>
            <input class="form-control" name="ten_dang_nhap" type="text" required id="reg-ln">
            <div class="invalid-feedback">Làm ơn điền tên đăng nhập!</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="reg-email">E-mail</label>
            <input class="form-control" name="email" type="email" required id="reg-email">
            <div class="invalid-feedback">Làm ơn điền địa chỉ email!</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="reg-phone">Số điện thoại</label>
            <input class="form-control" name="sdt" type="text" required id="reg-phone">
            <div class="invalid-feedback">Làm ơn điền số điện thoại!</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="reg-password">Mật khẩu</label>
            <input class="form-control" name="mat_khau" type="password" required id="reg-password">
            <div class="invalid-feedback">Làm ơn điền mật khẩu!</div>
          </div>
          <div class="col-sm-6">
            <label class="form-label" for="reg-password">Nhập lại mật khẩu</label>
            <input class="form-control" name="mat_khau_1" type="password" required id="reg-password-confirm">
            <div class="invalid-feedback">Làm ơn điền mật khẩu!</div>
          </div>
          <div class="col-sm-12">
            <label class="form-label" for="reg-address">Địa chỉ</label>
            <input class="form-control" name="dia_chi" type="text" required id="reg-address">
            <div class="invalid-feedback">Làm ơn điền địa chỉ!</div>
          </div>
          <div class="col-12 text-end">
            <button class="btn btn-primary" type="submit"><i class="ci-user me-2 ms-n1"></i>Đăng Kí</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<?php
require_once('files/footer.php');
?>