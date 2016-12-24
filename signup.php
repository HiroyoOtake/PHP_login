<?php

require_once('config.php');
require_once('functions.php');

session_start;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>新規登録画面</title>
</head>
<body>
	<h1>新規登録画面です!</h1>
	<form action="" method="post">
		ユーザーネーム: <input type="text" name="name"><br>
		パスワード: <input type="text" name="password"><br>
		<input type="submit" value="ログイン">
	</form>
	<a href="login.php">ログインはこちら</a>
</body>
</html>
