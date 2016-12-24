<?php
クッキーについて
// クライアント側(ブラウザ)に保存できる小さなデータ

setcookie('name', 'kashiwagi', time() - 3600);
setcookie('name', 'kashiwagi', time() + 60*60);
setcookie('name', 'kashiwagi');
setcookie('email', 'kashiwagi@example.com');

var_dump($_COOKIE);


セッションについて

// サーバー側にデータを保存する

session_start();

$_SESSION['name'] = 'kashiwagi';

var_dump($_SESSION);

$_SESSION = array();
