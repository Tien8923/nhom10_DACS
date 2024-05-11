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
    return $value;
}

function getPost($key) {
    $value = '';
    if(isset($_POST[$key])) {
        $value = $_POST[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}

function getRequest($key) {
    $value = '';
    if(isset($_REQUEST[$key])) {
        $value = $_REQUEST[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}

function getCookie($key) {
    $value = '';
    if(isset($_COOKIE[$key])) {
        $value = $_COOKIE[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}