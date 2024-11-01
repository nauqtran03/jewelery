<?php
require_once('files/header.php');

// Nhận ID danh mục từ URL
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;

// Lấy danh sách danh mục từ bảng categories
$categories = db_select('categories', '1 ORDER BY id ASC');

// Lấy danh sách sản phẩm từ bảng products, lọc theo category_id nếu có
if ($category_id) {
    $products = db_select('products', "category_id = $category_id ORDER BY id DESC");
} else {
    $products = db_select('products', '1 ORDER BY id DESC');
}

// Khởi tạo mảng để lưu sản phẩm theo danh mục
$categorized_products = [];

// Phân loại sản phẩm theo danh mục
foreach ($categories as $category) {
    $categorized_products[$category['id']] = [
        'name' => $category['name'], // Tên danh mục
        'products' => [] // Mảng chứa sản phẩm tương ứng
    ];
}

// Phân loại sản phẩm vào các danh mục tương ứng
foreach ($products as $product) {
    $category_id = $product['category_id']; // Hoặc product['category'] nếu bạn dùng tên danh mục
    if (isset($categorized_products[$category_id])) {
        $categorized_products[$category_id]['products'][] = $product;
    }
}
?>
<!-- Page Title (Shop Alt)-->
<div class="bg-dark pt-4 pb-5">
  <div class="container pt-2 pb-3 pt-lg-3 pb-lg-4">
    <div class="d-lg-flex justify-content-between pb-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Trang Chủ</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a></li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Sản phẩm</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Sản Phẩm</h1>
      </div>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <!-- Toolbar-->
  <div class="bg-light shadow-lg rounded-3 p-4 mt-n5 mb-4">
    <div class="d-flex justify-content-between align-items-center">
      <div class="dropdown me-2"><a class="btn btn-outline-secondary dropdown-toggle" href="#shop-filters" data-bs-toggle="collapse"><i class="ci-filter me-2"></i>Filters</a></div>
      <div class="d-flex"><a class="nav-link-style me-3" href="#"><i class="ci-arrow-left"></i></a><span class="fs-md">1 / 5</span><a class="nav-link-style ms-3" href="#"><i class="ci-arrow-right"></i></a></div>
      <div class="d-none d-sm-flex"><a class="btn btn-icon nav-link-style me-2" href="#"><i class="ci-view-grid"></i></a><a class="btn btn-icon nav-link-style bg-primary text-light disabled opacity-100" href="#"><i class="ci-view-list"></i></a></div>
    </div>
    <!-- Toolbar with expandable filters-->
    <div class="collapse" id="shop-filters">
      <div class="row pt-4">
        <div class="col-lg-4 col-sm-6">
          <!-- Categories-->
          <div class="card mb-grid-gutter">
            <div class="card-body px-4">
              <div class="widget widget-categories">
                <div class="accordion mt-n1" id="shop-categories">
                  <!-- Hiển thị danh mục -->
                  <div class="dropdown me-2">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Chọn danh mục
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                      <li><a class="dropdown-item" href="shop.php">Tất cả sản phẩm</a></li>
                      <?php foreach ($categories as $category): ?>
                        <li>
                          <a class="dropdown-item" href="shop.php?category_id=<?php echo $category['id']; ?>">
                            <?php echo htmlspecialchars($category['name']); ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <!-- Products list-->
    <section class="col-lg-8 pt-2">
      <!-- Số sản phẩm trên mỗi trang -->
      <?php
      $products_per_page = 6;
      $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Lấy trang hiện tại từ URL, mặc định là 1
      $total_products = count($products); // Tổng số sản phẩm
      $total_pages = ceil($total_products / $products_per_page); // Tổng số trang
      
      // Tính chỉ số bắt đầu cho sản phẩm
      $start_index = ($current_page - 1) * $products_per_page;
      $end_index = min($start_index + $products_per_page, $total_products); // Tính chỉ số kết thúc
      
      // Hiển thị sản phẩm
      for ($i = $start_index; $i < $end_index; $i++) {
        echo product_item_ui_1($products[$i]);
      }
      ?>

      <!-- Pagination-->
      <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
        <ul class="pagination">
          <?php if ($current_page > 1): ?>
              <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $current_page - 1; ?>&category_id=<?php echo $category_id; ?>">
                      <i class="ci-arrow-left me-2"></i>Prev
                  </a>
              </li>
          <?php else: ?>
              <li class="page-item disabled">
                  <span class="page-link"><i class="ci-arrow-left me-2"></i>Prev</span>
              </li>
          <?php endif; ?>
        </ul>
        <ul class="pagination">
          <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>" aria-current="<?php echo ($i == $current_page) ? 'page' : ''; ?>">
                  <a class="page-link" href="?page=<?php echo $i; ?>&category_id=<?php echo $category_id; ?>">
                      <?php echo $i; ?>
                  </a>
              </li>
          <?php endfor; ?>
        </ul>
        <ul class="pagination">
          <?php if ($current_page < $total_pages): ?>
              <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $current_page + 1; ?>&category_id=<?php echo $category_id; ?>" aria-label="Next">
                      Next<i class="ci-arrow-right ms-2"></i>
                  </a>
              </li>
          <?php else: ?>
              <li class="page-item disabled">
                  <span class="page-link">Next<i class="ci-arrow-right ms-2"></i></span>
              </li>
          <?php endif; ?>
        </ul>
      </nav>
    </section>
    <!-- Sidebar with banners-->
    <aside class="col-lg-4 d-none d-lg-block">
      <div class="d-flex d-lg-block p-4 ms-auto w-100" style="max-width: 21.25rem;">
        <div class="widget mb-4">
          <h3 class="widget-title">Popular products</h3>
          <?php
          // Kiểm tra xem mảng có ít nhất 5 phần tử không
          if (count($products) >= 5) {
            // Lấy 5 chỉ số ngẫu nhiên từ mảng $products
            $random_keys = array_rand($products, 5);
            foreach ($random_keys as $key) {
              echo product_item_ui_2($products[$key]); // Hiển thị sản phẩm dựa trên chỉ số ngẫu nhiên
            }
          } else {
            // Nếu có ít hơn 5 sản phẩm, lặp qua tất cả sản phẩm
            foreach ($products as $pro) {
              echo product_item_ui_2($pro);
            }
          }
          ?>
        </div>
        <div class="position-relative bg-size-cover bg-position-center rounded-3 py-5 mb-grid-gutter" style="background-image: url(img/blog/banner-bg.jpg);">
          <div class="py-5 px-4 text-center">
            <h5 class="mb-2">Your Add Banner Here</h5>
            <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-info btn-shadow btn-sm stretched-link" href="#">Contact Us</a>
          </div>
        </div>
        <div class="position-relative bg-faded-primary rounded-3 overflow-hidden pt-4">
          <div class="py-4 px-4 text-center">
            <p class="fs-sm text-muted mb-2">Converse All Star</p>
            <h5 class="mb-3">Make Your Day Comfortable</h5><a class="btn btn-primary btn-shadow btn-sm stretched-link" href="#">Shop Now</a>
          </div><img src="img/shop/catalog/banner2.jpg" alt="Banner">
        </div>
      </div>
    </aside>
  </div>
</div>
<?php
require_once('files/footer.php');
?>
