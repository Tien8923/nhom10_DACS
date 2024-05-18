<?php

$fullname = $email = $msg = '';

if(!empty($_POST)) {
    $fullname = getPost('fullname');
    $email = getPost('email');
    $pwd = getPost('password');

    //validate
    if(empty($fullname)  || empty($email) || empty($pwd) || 
    strlen($pwd) < 6) {

    } else {
        // validate thanh cong
        $userExist = executeResult("select * from user where email = 
        '$email'", true);
        if($userExist != null) {
            $msg = 'Email đã được đăng ký trên hệ thống';
        } else {
            $created_at = $updated_at = date('Y-m-d H:i:s');
            // su dung ma hoa 1 chieu -> md5 -> hack
            $pwd = getSecurityMDS($pwd);

            $sql = "insert into user (fullname, email, password, role_id,
            created_at,	updated_at,	deleted) values ('$fullname', '$email', 
            '$pwd', 2, '$created_at',	'$updated_at', 0)";
            // chen du lieu vao trong
            execute($sql);
            //Dang ky tai khoan thanh cong se nhay sang trang login
            header('Localion: login.php');
            // dung xu ly de nhay sang trang login
            die();
        }
    }
}