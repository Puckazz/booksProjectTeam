<!-- kiểm tra tính hoàn chỉnh của dữ liệu -->
<?php

//kiểm tra họ và tên
function is_fullname($fullname)
{
    $patter = "/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêễìịíòóôõọùúăđĩũơẠ-ỹ\s]{8,25}$/";
    if (preg_match($patter, $fullname, $matches)) {
        return true;
    } else {
        return false;
    }
}
// kiểm tra username 
function is_username($username)
{
    if ((strlen($username) >= 6 && strlen($username) <= 32)) {
        return true;
    } else
        return false;
}


// kiem tra password

function is_password($password)
{
    $patter = "/^([A-Z]){1}([\w_\.!#$%@^&*()]+){5,60}$/";
    if (preg_match($patter, $password, $matches)) {
        return true;
    } else {
        return false;
    }
}
// kiểm tra trùng lặp password
function validate_password_matches($password, $confPassword){
    if($password == $confPassword){
        return true;
    }
    else{
        return false;
    }
}

// kiểm tra lỗi số điện thoại

function is_phoneNumber($phoneNumber)
{
    $patter = "/^\d{10,11}$/";
    if (preg_match($patter, $phoneNumber, $matches)) {
        return true;
    } else return false;
}

// kiểm tra dia chi giao hanh

function is_address($address)
{
    $patter = "/^[a-zA-Z0-9\s]+$/";
    if (preg_match($patter, $address, $matches)) {
        return true;
    } else {
        return false;
    }
}

// echo loi ra cho nguoi dung

function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field])) return "<p class='error'>" . $error[$label_field] . "</p>";;
}

// giữ nguyên dữ liệu

function setData($data)
{
    if (isset($data)) {
        if (!empty($data)) {
            return $data;
        }
    }
}

?>