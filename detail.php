<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();


//2.対象のIDを取得
$id = $_GET['id'];


//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare('SELECT * FROM gs_arigatou_table WHERE id=:id');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ表示
$view = '';

if ($status == false) {
    sql_error($stmt);
}else {
    $result = $stmt->fetch();
}


?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>”ありがとう”の投稿（更新）</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">これまで届いた”ありがとう”を見る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <!--<div class="jumbotron">-->
  <div class="">
   <fieldset>
    <legend>同僚への”ありがとう”を投稿しよう！（更新）</legend>
     <label>あなたのお名前<br>
      <input type="text" name="name" value="<?= $result['name']?>"></label><br>
     <label>”ありがとう”を伝えたい人のお名前(敬称不要)<br>
      <input type="text" name="toname" value="<?= $result['toname']?>"></label><br>
     <label>”ありがとう”のストーリーとメッセージ<br>
      <textArea name="comment" rows="4" cols="40"><?= $result['comment']?></textArea></label><br>
      <input type="hidden" name="id" value="<?=$result['id']?>">
      <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
