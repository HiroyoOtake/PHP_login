<?php

require_once('config.php');
require_once('functions.php');

session_start;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name = $_POST['name'];
	$password = $_POST['password'];

	$error = array();

	// バリデーション
	if ($name == '')
	{
		$errors['name'] = 'ユーザネームが未入力です';
	}

	if ($password == '')
	{
		$errors['password'] = 'パスワードが未入力です';
	}
}

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
		ユーザーネーム: <input type="text" name="name">
		<?php if ($errors['name']): ?>
			<?php echo h($errors['name']) ?>
		<?php endif; ?>
		<br>
		パスワード: <input type="text" name="password">
		<?php if ($errors['password']): ?>
			<?php echo h($errors['password']) ?>
		<?php endif; ?>
		<br>
		<input type="submit" value="ログイン">
	</form>
	<a href="login.php">ログインはこちら</a>
</body>
</html>
