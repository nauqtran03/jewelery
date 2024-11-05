<?php
require_once('files/functions.php');
protected_erea();

$products = db_select('products', '1 ORDER BY id DESC');


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
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Products</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Products</h1>
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
          '<h2 class="h3 py-2 me-2 text-sm-start" style="color: #ffffff;">
            Products
            <span class="badge bg-faded-accent fs-sm text-body align-middle ms-2"></span>
          </h2>';
          <div class="py-2">
            <div class="d-flex flex-nowrap align-items-center pb-3">
              <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sort by:</label>
              <select class="form-select form-select-sm me-2" id="sorting">
                <option>Date Created</option>
                <option>Product Name</option>
                <option>Price</option>
                <option>Your Rating</option>
                <option>Updates</option>
              </select>
              <!-- <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i class="ci-arrow-up"></i></button> -->
            </div>
          </div>
        </div>

        <?php
        // Giả sử $products chứa tất cả sản phẩm
        $productsPerPage = 6; // Số lượng sản phẩm trên mỗi trang
        $totalProducts = count($products); // Tổng số sản phẩm
        $totalPages = ceil($totalProducts / $productsPerPage); // Tổng số trang
        
        // Xác định trang hiện tại từ URL (mặc định là trang 1)
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $currentPage = max(1, min($currentPage, $totalPages)); // Đảm bảo trang nằm trong phạm vi hợp lệ
        
        // Tính toán chỉ số bắt đầu và kết thúc cho sản phẩm của trang hiện tại
        $startIndex = ($currentPage - 1) * $productsPerPage;
        $endIndex = min($startIndex + $productsPerPage, $totalProducts);

        // Hiển thị các sản phẩm cho trang hiện tại
        for ($i = $startIndex; $i < $endIndex; $i++) {
          $pro = $products[$i];
          ?>
          <!-- Product-->
          <div class="d-block d-sm-flex align-items-center py-4 border-bottom">
            <a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="product.php?id=<?= $pro['id']?>"
              style="width: 12.5rem;">
              <img class="rounded-3" src="<?= get_product_thumb($pro['photo']) ?>" alt="Product">
            </a>
            <div class="text-center text-sm-start">
              <h3 class="h6 product-title mb-2">
                <a href="product.php?id=<?= $pro['id']?>"><?= $pro['name'] ?></a>
              </h3>
              <div class="d-inline-block text-accent"><?= $pro['price'] ?><small>Đ</small></div>
              <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                <button class="btn bg-faded-accent btn-icon me-2" type="button" data-bs-toggle="tooltip"
                  title="Download"><i class="ci-download text-accent"></i></button>
                <button class="btn bg-faded-info btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Edit"><i
                    class="ci-edit text-info"></i></button>
                <button class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i
                    class="ci-trash text-danger"></i></button>
              </div>
            </div>
          </div>
          <?php
        }

        // Hiển thị phân trang
        echo '<nav>';
        echo '<ul class="pagination justify-content-center">';

        // Nút Previous
        if ($currentPage > 1) {
          echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
        }

        // Hiển thị các nút trang
        for ($page = 1; $page <= $totalPages; $page++) {
          $activeClass = $page == $currentPage ? ' active' : '';
          echo '<li class="page-item' . $activeClass . '"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
        }

        // Nút Next
        if ($currentPage < $totalPages) {
          echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
        }

        echo '</ul>';
        echo '</nav>';
        ?>
      </div>
    </section>
  </div>
</div>


<?php
require_once('files/footer.php');
?>