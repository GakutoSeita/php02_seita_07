<?php

//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();

//以下ログインユーザーのみ
$user_name = $_SESSION['name'];
$kanri_flg = $_SESSION['kanri_flg'];//0が一般で1が管理者


//1.  DB接続します
// try {
//   $pdo = new PDO('mysql:dbname=goldsheep3_arigatou_db;charset=utf8;host=mysql57.goldsheep3.sakura.ne.jp','goldsheep3','gakuto1209');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

// 課題(関数)
require_once('funcs.php');
$pdo = db_conn();


//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_arigatou_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result['id'].'">';
    $view .= $result['indate'].' : '.$result['name'].'さん から  '.$result['toname'].'さん への”ありがとう”'."<br>";
    $view .= '「'.$result['comment'].'」';
    $view .= "</a>";
    $view .= '<a href="delete.php?id=' . $result['id'] . '">';//追記
    $view .= '  [削除]';//追記
    $view .= '</a>';//追記
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>これまで届いた”ありがとう”を見る</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">”ありがとう”を投稿する</a>
      </div>
      <p><?= $user_name ?></p>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <!-- <div class="container jumbotron"><?= $view ?></div> -->
    <div class="arigatou"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
