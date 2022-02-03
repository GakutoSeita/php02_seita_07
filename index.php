<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>”ありがとう”の投稿</title>
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
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    <p><?= $user_name ?></p>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <!--<div class="jumbotron">-->
  <div class="">
   <fieldset>
    <legend>同僚への”ありがとう”を投稿しよう！</legend>
     <label>あなたのお名前<br>
      <input type="text" name="name"></label><br>
     <label>”ありがとう”を伝えたい人のお名前(敬称不要)<br>
      <input type="text" name="toname"></label><br>
     <label>”ありがとう”のストーリーとメッセージ<br>
      <textArea name="comment" rows="4" cols="40"></textArea></label><br>
      <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
