<?php

require_once 'Zebra_Image.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = new mysqli('localhost', 'root', '', 'jewelry');


function db_select($table,$condition = null){
    $sql = "SELECT * FROM $table";
    if($condition != null){
        $sql .= " WHERE $condition ";
    }
    global $conn;
    $res = $conn->query($sql);
    $rows=[];
    while ($row = $res->fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

function db_insert($table_name, $data)
{

    $sql = "INSERT INTO $table_name ";

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
            $column_values .= "'$value'";
        } else {
            $column_values .= $value;
        }
    }
    $column_names .= ")";
    $column_values .= ")";
    $sql .= $column_names . " VALUES " . $column_values;


    global $conn;
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }

}



function create_thumb($source, $target)
{

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
            $thumb_destination = 'uploads\thumb_' . $file_name;

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
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    alert('success', 'Đăng xuất thành công.');
    header('Location: login.php');
    die();
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
    $sql = "SELECT * FROM users WHERE email ='{$email}'";
    $res = $conn->query($sql);
    if ($res->num_rows < 1) {
        return false;
    }


    $row = $res->fetch_assoc();
    if (!password_verify($password, $row['mat_khau'])) {
        return false;
    }


    $_SESSION['user'] = $row;


    return true;
}

function text_input($data)
{
    $name = (isset($data['name'])) ? $data['name'] : "";
    $atrributes = (isset($data['attributes'])) ? $data['atrributes'] : "";
    $value = "";
    $error = "";
    $error_text = "";
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['name'])) {
            if (isset($_SESSION['form']['value'][$name])) {
                $value = $_SESSION['form']['value'][$name];
            }
        }
    }
    if (isset($_SESSION['form'])) {
        if (isset($_SESSION['form']['name'])) {
            if (isset($_SESSION['form']['error'][$name])) {
                $error = $_SESSION['form']['error'][$name];
                $error_text = '<div class="form-text text danger">' . $error . '</div>';
            }
        }
    }
    $name = (isset($data['name'])) ? $data['name'] : "";
    $label = (isset($data['label'])) ? $data['label'] : $name;
    $value = (isset($data['value'])) ? $data['value'] : $value;
    $error = (isset($data['error'])) ? $data['error'] : $error;

    return
        '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
    <input name ="' . $name . '" value="' . $value . '" class="form-control" type="text" placeholder ="' . $label . '" ' . $atrributes . '>'
        . $error_text;
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
    $selected ="";
    foreach ($options as $key => $val) {
        $selected = ($key == $value) ? "selected" : "";
        $select_options .= '<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
    }

    // Tạo thẻ <select> và chèn các thuộc tính khác nếu có
    $select_tag = '<select name="' . $name . ' '.$selected.' " class="form-control" id="' . $name . '" placeholder="' . $label . '" ' . $attributes . '>
        ' . $select_options . '
    </select>';

    // Trả về toàn bộ mã HTML cho form input
    return
        '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>'
        . $select_tag
        . $error_text;
}
