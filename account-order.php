<?php
require_once('files/functions.php');
protected_erea();
require_once('files/header.php');
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

// Gọi hàm mới để lấy đơn hàng của user
$orders = db_select_orders_by_user($user_id);
?>

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="<?= url('') ?>"><i class="ci-home"></i>Trang Chủ</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Tài Khoản</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Tài Khoản Mua Sắm</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0"></h1>
        </div>
    </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once('files/account-sidebar.php'); ?>
        <!-- Content  -->
        <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                <div class="d-flex align-items-center"></div>
                <a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="logout.php"><i class="ci-sign-out me-2"></i>Đăng Xuất</a>
            </div>
            <div class="table-responsive fs-md mb-4">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Mã đặt hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#"><?= $order['id'] ?></a></td>
                                <td class="py-3">
                                    <?php
                                    // Kiểm tra và chuyển đổi ngày tháng
                                    if ($order['order_date'] != '0000-00-00 00:00:00') {
                                        echo date('d-m-Y', strtotime($order['order_date']));
                                    } else {
                                        echo "Ngày không hợp lệ";
                                    }
                                    ?>
                                </td>
                                <td class="py-3">
                                    <span class="badge bg-info m-0"><?= $order['order_status'] == 1 ? 'Đang tiến hành' : 'Hoàn thành' ?></span>
                                </td>
                                <td class="py-3"><?= number_format($order['total_price']) ?> Đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?php
require_once('files/footer.php');
?>