<?php
    session_start();

	require_once('../../utils/utility.php');
	require_once('../../database/dbhelper.php');

	$user = getUserToken();
    if($user == null) {
        // header('Location: ../');
        header('Location: authen/login.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
</head>
<body>
    <h1>hello</h1>
</body>
</html>