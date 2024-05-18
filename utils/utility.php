<?php
// SQL injection là một kỹ thuật tấn công mà kẻ tấn công sử dụng để thực thi các câu lệnh SQL độc hại vào cơ sở dữ liệu của ứng dụng.
// fix sql injection => $sql = "ghi cau lenh sql vao"
function fixSqlInjection($sql) {
    $sql = str_replace('\\', '\\\\', $sql);
    $sql = str_replace('\'', '\\\'', $sql);
    return $sql;
}

function getGet($key) {
    $value = '';
    if(isset($_GET[$key])) {
        $value = $_GET[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}

function getPost($key) {
    $value = '';
    if(isset($_POST[$key])) {
        $value = $_POST[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}

function getRequest($key) {
    $value = '';
    if(isset($_REQUEST[$key])) {
        $value = $_REQUEST[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}

function getCookie($key) {
    $value = '';
    if(isset($_COOKIE[$key])) {
        $value = $_COOKIE[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}

// su dung ma hoa 1 chieu -> md5 -> hack
function getSecurityMDS($pwd) {
    return md5(md5($pwd).PRIVATE_KEY);
}


function getUserToken() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    $token = getCookie('token');
    $sql = "select * from tokens where token = '$token'";
    $item = executeResult($sql, true);
    if($item != null) {
        $userId = $item['user_id'];
        $sql = "select * from user where id = '$userId'";
        $item = executeResult($sql, true);
        if($item != null) {
            $_SESSION['user'] = $item;
            return $item;
        }
    }

    return null;
}