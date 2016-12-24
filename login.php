<?php

require_once('config.php');
require_once('functions.php');

session_start();

// $_session['id'] = id;
// $_session['id'] = array();

if (!empty($_session['id']))
{
	header('location: index.php');
	exit;
}

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

// バリデーション突破後
if (empty($errors))
{
	// 入力された値を持つレコードがあるか調べる
	$dbh = connectDatabase();

	$sql = "select * from users where name = :name and password = :password";
	$stmt = $dbh->prepare($sql);

	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":password", $password);

	$stmt->execute();

	$row = $stmt->fetch();

	var_dump($row);

	// 該当レコードがあった場合は$_SESSION['id']に値を持たせてindex.phpへ
	// なかった場合は、エラーメッセージを出す 	
	
	if ($row)
	{
		$_SESSION['id'] = $row['id'];
		header('Location: index.php');
		exit;
	}
	else
	{
		echo 'ユーザーネームかパスワードが間違っています';
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ログイン画面</title>
</head>
<body>
	<h1>ログイン画面です!</h1>
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
	<a href="signup.php">新規ユーザー登録はこちら</a>
</body>
</html>
