<?php


$fullname = $email = $msg = '';

if(!empty($_POST)) {
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMDS($pwd);

    $sql = "select * from user where email = '$email' and password = '$pwd'";
    $userExist = executeResult($sql, true);
    if($userExist == null) {
        $msg = 'Đăng nhập không thành công, vui lòng kiểm tra lại email hoặc mật khẩu!!!';
    } else {
        // login thanh cong
        $token = getSecurityMDS($userExist['email'].time());
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
        $created_at = date('Y-m-d H:i:s');

        $_SESSION['user'] = $userExist;

        $userId = $userExist['id'];
        $sql = "insert into tokens (user_id, token,	created_at) 
        values ('$userId', '$token', '$created_at')";
        execute($sql);

        header('Location: ../');
        die();
    }
}
