<?php
require_once('files/functions.php');


protected_erea();

$rows = db_select('categories', 'parent_id != 0');

$categories[0] = "No Parent";
foreach ($rows as $val) {
  $categories[$val['id']] = $val['name'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['form']['value'] = $_POST;
  $imgs = upload_images($_FILES);
  $data['name'] = $_POST['name'];
  $data['description'] = $_POST['description'];
  $data['photo'] = json_encode($imgs);
  $data['parent_id'] = 0;

  if (db_insert('categories', $data)) {
    alert('success', 'Tạo dữ liệu mưới thành công.');
    header('Location: admin-categories.php');
    unset($_SESSION['form']);
  } else {
    alert('danger', 'Lỗi khi tạo dữ liệu mới. Làm ơn thử lại.');
    header('Location: admin-categories-add.php');
  }

  die();

}
require_once('files/header.php');
?>

<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Product Add</h1>
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
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
          <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>
          <div class="py-2">
            <!-- <?= select_input([
              'name' => 'parent_id',
              'label' => 'Parent category'
            ], $categories) ?> -->
          </div>
        </div>
        <form action="admin-categories-add.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3 pb-2">

            <div class="row ">
              <div class="col-md-12">
                <?= text_input([
                  'name' => 'name',
                ]) ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mt-2">
                <?= text_input([
                  'name' => 'buying_price',
                  'label' => 'Buying price',
                ]) ?>
              </div>
              <div class="col-md-6 mt-2">
                <?= text_input([
                  'name' => 'price',
                  'label' => 'Selling price',
                ]) ?>
              </div>
            </div>

              <div class="row mt-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="photo">Product photo 1</label>
                    <input class="form-control" name="photo_1" type="file" accept=".jpg,.jpeg,.png">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="photo">Product photo 2</label>
                    <input class="form-control" name="photo_21" type="file" accept=".jpg,.jpeg,.png">
                  </div>
                </div>
              </div>
            

          </div>
          <div class="row mt-3">
            <div class="col-12">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="desciption" class="form-control"></textarea>
              </div>
            </div>
          </div>
      </div>
      <button class="btn btn-primary d-block w-100" type="submit"><i
          class="ci-cloud-upload fs-lg me-2"></i>SUBMIT</button>
      </form>
  </div>
  </section>
</div>
</div>


<?php
require_once('files/footer.php');
?>