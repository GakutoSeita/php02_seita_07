<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$name = $_POST['name'];
$toname = $_POST['toname'];
$comment = $_POST['comment'];



// 2. DB接続します
// try {
//   $pdo = new PDO('mysql:dbname=goldsheep3_arigatou_db;charset=utf8;host=mysql57.goldsheep3.sakura.ne.jp','goldsheep3','gakuto1209');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }

// 課題(関数)
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_arigatou_table(id,name,toname,comment,indate)
  VALUES( NULL, :name, :toname, :comment, sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':toname', $toname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //$error = $stmt->errorInfo();
  //exit("ErrorMassage:".$error[2]);
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  //header('Location: index.php');
  redirect('index.php');
}
?>
