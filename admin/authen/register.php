<?php
    session_start();

	require_once('../../utils/utility.php');
	require_once('../../database/dbhelper.php');
	require_once('process_form_register.php');

	$user = getUserToken();
    if($user != null) {
        header('Location: ../');
        die();
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
    <meta charset="utf-́́8">
    <link rel="icon" href="../../assets/img/icon/logo.jpg" type="image/x-icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(../../assets/img/background-register-1.jpg); background-size: cover; background-repeat: no-repeat;">
	<div class="container">
		<div class="panel panel-primary" style="width: 480px; margin: 0 -100px auto; margin-top: 100px; background-color: #fff; padding: 10px; border-radius: 5px;">
			<div class="panel-heading">
				<h2 class="text-center">Đăng Ký Tài Khoản</h2>
				<h4 style="color: red;" class="text-center"><?=$msg?></h4>
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="return validateForm();">
					<div class="form-group">
						<label for="usr">Họ & Tên:</label>
						<input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
						<label for="pwd">Mật Khẩu:</label>
						<input required="true" type="password" class="form-control" id="pwd" name="password" minlength="6">
					</div>
					<div class="form-group">
						<label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
						<input required="true" type="password" class="form-control" id="confirmation_pwd" minlength="6">
					</div>
					<p>
						<a href="login.php">Tôi đã có tài khoản</a>
					</p>
					<button class="btn btn-success">Đăng Ký</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function validateForm() {
			$pwd = $('#pwd').val();
			$confirmPwd = $('#confirmation_pwd').val();
			if($pwd != $confirmPwd) {
				alert("Mật khẩu không khớp, vui lòng kiểm tra lại");
				return false;
			}
			return true;
		}
	</script>
</body>
</html>