<?php
require_once('files/functions.php');
require_once('files/header.php');

$cart_items = [];
if (isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
}
$u = $_SESSION['user'];
?>

<section class="row g-0" style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f8f9fa;">
  <div class="col-md-12 bg-position-center bg-size-cover bg-secondary order-md-2" style="background-color: #e2e2e2;"></div>
  <div class="col-md-6 px-3 px-md-5 py-5 order-md-1" style="display: flex; justify-content: center;">
    <div class="mx-auto py-lg-5" style="max-width: 100rem; width: 100%; background: #ffffff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <h2 class="h3 mb-2 text-center">Hãy gửi phản hồi về cho chúng tôi</h2>
      <p class="fs-sm text-muted pb-2 text-center">Nếu có gì không hài lòng mong bạn cho qua</p> 
      <!-- Hiển thị thông báo thành công -->  
      <form action="submit-contact.php" class="needs-validation row g-4" method="post" novalidate style="max-width: 500px; margin: 0 auto;">
        <div class="col-sm-6">
          <?= text_input([
              'name' => 'ten_tai_khoan',
              'label' => 'Name',
              'value' => $u['ten_tai_khoan'],
              'attributes' => 'required'
          ]) ?>
        </div>
        <div class="col-sm-6">
          <?= text_input([
              'name' => 'email',
              'label' => 'Email',
              'value' => $u['email'],
              'attributes' => 'required'
          ]) ?>
        </div>
        <div class="col-12">
          <?= text_input([
              'name' => 'noi_dung',
              'label' => 'Nội dung',
              'attributes' => 'required'
          ]) ?>
        </div>
        <div class="col-12 text-center">
          <button class="btn btn-info btn-shadow" type="submit">Gửi Phản Hồi</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php
require_once('files/footer.php');
?>