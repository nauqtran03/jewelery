<?php

require_once 'Zebra_Image.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = new mysqli('localhost', 'root', '', 'jewelry');

function save_cart_to_db($user_id, $cart) {
    global $conn;
    $cart_content = json_encode($cart);
    $sql = "REPLACE INTO carts (user_id, cart_content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $cart_content);
    $stmt->execute();
    $stmt->close();
}
function get_product($id)
{
    global $conn;
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    
    if (!$result || $result->num_rows == 0) {
        return null;
    }

    $data['pro'] = $result->fetch_assoc();
    $data['cat'] = null;

    if ($data['pro'] != null) {
        $cat_id = $data['pro']['category_id'];
        $sql = "SELECT * FROM categories WHERE id = $cat_id";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $data['cat'] = $result->fetch_assoc();
        }
    }
    return $data;
}
function get_product_photo($json)
{
    $img['src'] = "assets/no_image.jpg";
    $img['thumb'] = "assets/no_image.jpg";
    $photo[] = $img; 
    if ($json == null) {
        return $photo;
    }
    if (strlen($json) < 4) {
        return $photo;
    }
    $objects = json_decode($json);
    if (empty($objects)) {
        return $photo;
    }
    if (!isset($objects[0]->thumb)) {
        return $photo;
    }
    return $objects;
}
function get_product_thumb($json)
{
    $img = "assets/no_image.jpg";
    if ($json == null) {
        return $img;
    }
    if (strlen($img) < 4) {
        return $img;
    }
    $objects = json_decode($json);
    if (empty($objects)) {
        return $img;
    }
    if (!isset($objects[0]->thumb)) {
        return $img;
    }
    return $objects[0]->thumb;
}

function db_select($table, $condition = null)
{
    $sql = "SELECT * FROM $table";

    if ($condition != null) {
        $sql .= " WHERE $condition ";
    }
    global $conn;
    $res = $conn->query($sql);
    $rows = [];
    while ($row = $res->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function db_insert($table_name, $data)
{

    $sql = "INSERT INTO $table_name ";
    global $conn;
    $column_names = "(";
    $column_values = "(";
    $is_first = true;
    foreach ($data as $key => $value) {
        if ($is_first) {
            $is_first = false;
        } else {
            $column_names .= ",";
            $column_values .= ",";
        }
        $column_names .= $key;
        $gettype = gettype($value);
        if ($gettype == 'string') {
            $value = $conn->real_escape_string($value);
            $column_values .= "'$value'";
        } else {
            $value = $conn->real_escape_string($value);
            $column_values .= $value;
        }
    }
    $column_names .= ")";
    $column_values .= ")";
    $sql .= $column_names . " VALUES " . $column_values;


    
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }

}



function create_thumb($source, $target)
{
    // ini_set('memory_limit','-1');
    // ini_set('max_execution_time', '-1');
    $image = new Zebra_Image();

    $image->auto_handle_exif_orientation = true;
    $image->source_path = $source;
    $image->target_path = $target;
    $image->preserve_aspect_ratio = true;
    $image->enlarge_smaller_images = true;
    $image->preserve_time = true;

    $image->png_quality = get_png_quality(filesize($image->source_path));
    $width = 500;
    $height = 500;
    if (!$image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER)) {
        return $image->source_path;
    } else {
        return $image->target_path;
    }
}
function get_png_quality($_size)
{
    $size = ($_size / 1000000);
    $qt = 50;
    if ($size > 5) {
        $qt = 10;
    } elseif ($size > 4) {
        $qt = 13;
    } elseif ($size > 2) {
        $qt = 15;
    } elseif ($size > 1) {
        $qt = 17;
    } elseif ($size > 0.8) {
        $qt = 50;
    } elseif ($size > 0.5) {
        $qt = 80;
    } else {
        $qt = 90;
    }
    return $qt;
}
function upload_images($files)
{
    if ($files == null || empty($files)) {
        return [];
    }
    echo "<pre>";
    $uploaded_images = array();
    foreach ($files as $file) {

        if (
            isset($file['name']) &&
            isset($file['type']) &&
            isset($file['tmp_name']) &&
            isset($file['error']) &&
            isset($file['size'])
        ) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_name = time() . "-" . rand(100000, 1000000) . "." . $ext;
            $destination = 'uploads/' . $file_name;
            $thumb_destination = 'uploads/thumb_' . $file_name;

            $res = move_uploaded_file($file['tmp_name'], $destination);
            if (!$res) {
                continue;
            }
            $thumb_destination = create_thumb($destination, $thumb_destination);
            $img['src'] = $destination;
            $img['thumb'] = $thumb_destination;
            $uploaded_images[] = $img;
        }
    }
    return $uploaded_images;
}

function load_cart_from_db($user_id) {
    global $conn;
    $sql = "SELECT cart_content FROM carts WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_content = $result->fetch_assoc()['cart_content'];
    $stmt->close();

    return $cart_content ? json_decode($cart_content, true) : [];
}



define('BASE_URL', 'http://localhost/jewellery');

function url($path = '/')
{
    return BASE_URL . $path;
}
function protected_erea()
{
    if (!isset($_SESSION['user'])) {
        alert('warning', 'Truy cập được ủy quyền, Đăng nhập trước khi bạn tiến hành');
        header('Location: login.php');
        die();
    }
}
function logout()
{
    function logout() {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            if (isset($_SESSION['cart'])) {
                save_cart_to_db($user_id, $_SESSION['cart']);
            }
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
        }
        alert('success', 'Đăng xuất thành công.');
        header('Location: login.php');
        die();
    }
}
function is_logged_in()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}
function login_user($email, $password)
{

    global $conn;
    $sql = "SELECT * FROM users WHERE email = '{$email}'";
    $res = $conn->query($sql);
    if ($res->num_rows < 1) {
        return false;
    }

    $row = $res->fetch_assoc();
    if (!password_verify($password, $row['mat_khau'])) {
        return false;
    }

    $_SESSION['user'] = $row;

    // Tải giỏ hàng từ cơ sở dữ liệu khi đăng nhập
    $_SESSION['cart'] = load_cart_from_db($row['id']);

    return true;
}

function text_input($data)
{
    $name = (isset($data['name'])) ? $data['name'] : "";
    $attributes = (isset($data['attributes'])) ? $data['attributes'] : "";
    
    $value = "";
    $error = "";
    $error_text = "";
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['value'])) {
            if (isset($_SESSION['form']['value'][$name])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['error'])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $error_text = '<div class="form-text text danger">' . $error . '</div>';
            }
        }
    }
  
    $label = (isset($data['label'])) ? $data['label'] : $name;
    $value = (isset($data['value'])) ? $data['value'] : $value;
    $error = (isset($data['error'])) ? $data['error'] : $error;

    return
        '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
    <input name ="' . $name . '" value="' . $value . '" class="form-control" type="text" id="'.$name.'" placeholder ="' . $label . '" ' . $attributes . '>'
        . $error_text;
}
function add_to_cart($product_id, $quantity) {
    // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Khởi tạo giỏ hàng nếu chưa có
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$product_id])) {
        // Nếu sản phẩm đã có, cập nhật số lượng
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        // Nếu sản phẩm chưa có, thêm mới vào giỏ hàng
        $_SESSION['cart'][$product_id] = $quantity;
    }
}
function select_input($data, $options)
{
    $name = isset($data['name']) ? $data['name'] : "";
    $attributes = isset($data['attributes']) ? $data['attributes'] : "";
    $value = "";
    $error = "";
    $error_text = "";

    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['value'][$name])) {
            $value = $_SESSION['form']['value'][$name];
        }
        if (isset($_SESSION['form']['error'][$name])) {
            $error = $_SESSION['form']['error'][$name];
            $error_text = '<div class="form-text text-danger">' . $error . '</div>';
        }
    }

    $label = isset($data['label']) ? $data['label'] : $name;
    $value = isset($data['value']) ? $data['value'] : $value;
    $error = isset($data['error']) ? $data['error'] : $error;

    // Xây dựng các tùy chọn của thẻ <select>
    $select_options = "";
    $selected = "";
    foreach ($options as $key => $val) {
        $selected = ($key == $value) ? "selected" : "";
        $select_options .= '<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
    }

    // Tạo thẻ <select> và chèn các thuộc tính khác nếu có
    $select_tag = '<select name="' . $name . ' ' . $selected . ' " class="form-control" id="' . $name . '" placeholder="' . $label . '" ' . $attributes . '>
        ' . $select_options . '
    </select>';

    // Trả về toàn bộ mã HTML cho form input
    return
        '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>'
        . $select_tag
        . $error_text;
}
function product_item_ui_1($pro)
{

    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF

              <div class="card product-card product-list">
              <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button>
              <div class="d-sm-flex align-items-center"><a class="product-list-thumb" href="product.php?id={$pro['id']}"><img src="{$thumb}" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="product.php?id={$pro['id']}"></a>
                  <h3 class="product-title fs-base"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">{$pro['buying_price']}<small>Đ</small></span></div>
                    <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="border-top pt-3 mt-3"></div>

    EOF;
    return $str;
}
function product_item_ui_2($pro)
{

    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF

              <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block" href="product.php?id={$pro['id']}"><img src="{$thumb}" width="64" alt="Product"></a>
                  <div class="ps-2">
                    <h6 class="widget-product-title"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h6>
                    <div class="widget-product-meta"><span class="text-accent me-2">{$pro['buying_price']}<small>Đ</small></span></div>
                  </div>
                </div>

    EOF;
    return $str;
}
function product_item_ui_3($pro){
    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
              <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button>
              <a class="card-img-top d-block overflow-hidden" href="product.php?id={$pro['id']}"><img src="{$thumb}" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="product.php?id={$pro['id']}"></a>
                <h3 class="product-title fs-sm"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">{$pro['buying_price']}<small>Đ</small></span></div>
                  <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                  </div>
                </div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>
    EOF;
    return $str;
}
function product_item_ui_4($pro){
    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF
        <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="product.php?id={$pro['id']}">
                        <img src="{$thumb}" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="product.php?id={$pro['id']}"></a>
                          <h3 class="product-title fs-sm"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">{$pro['buying_price']}<small>Đ</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
    EOF;
    return $str;
}
function product_item_ui_5($pro){
    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF
        <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                <div class="card product-card card-static">
                  <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Add to wishlist"><i class="ci-heart"></i></button><a
                    class="card-img-top d-block overflow-hidden" href="product.php?id={$pro['id']}"><img
                      src="{$thumb}" alt="Product"></a>
                  <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="product.php?id={$pro['id']}"></a>
                    <h3 class="product-title fs-sm"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h3>
                    <div class="d-flex justify-content-between">
                      <div class="product-price"><span class="text-accent">{$pro['buying_price']}<small>Đ</small></span></div>
                      <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                          class="star-rating-icon ci-star-filled active"></i><i
                          class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i><i
                          class="star-rating-icon ci-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    EOF;
    return $str;
}
function product_item_ui_6($pro){
    $thumb = get_product_thumb($pro['photo']);
    $str = <<<EOF
        <div>
          <div class="card product-card card-static">
            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
              title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden"
              href="product.php?id={$pro['id']}"><img src="{$thumb}" alt="Product"></a>
            <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="product.php?id={$pro['id']}"></a>
              <h3 class="product-title fs-sm"><a href="product.php?id={$pro['id']}">{$pro['name']}</a></h3>
              <div class="d-flex justify-content-between">
                <div class="product-price"><span class="text-accent">{$pro['buying_price']}<small>Đ</small></span></div>
                <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i
                    class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    EOF;
    return $str;
}

