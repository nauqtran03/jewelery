<?php
session_start();

if (isset($_SESSION['cart'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý yêu cầu POST cho nhiều sản phẩm
        $updates = json_decode(file_get_contents('php://input'), true);
        foreach ($updates as $update) {
            $productId = $update['id'] ?? null;
            $quantity = $update['quantity'] ?? 1;

            // Kiểm tra nếu sản phẩm có trong giỏ hàng và cập nhật số lượng
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
             } 
            // else {
            //     // Trả về thông báo nếu sản phẩm không tìm thấy
            //     echo json_encode(['success' => false, 'message' => "Không tìm thấy sản phẩm với ID: $productId"]);
            //     exit; // Ngừng thực hiện mã ngay lập tức
            // }
        }
        echo json_encode(['success' => true, 'message' => 'Giỏ hàng đã được cập nhật']);
    } else {
        // Xử lý yêu cầu GET cho từng sản phẩm
        $productId = $_GET['id'] ?? null;
        $quantity = $_GET['quantity'] ?? 1;

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
            echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
        } 
        // else {
        //     echo json_encode(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
        // }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Giỏ hàng không tồn tại']);
}

