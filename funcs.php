<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//課題(関数)：DB接続関数：db_conn() 
function db_conn(){
    try {
        // Localhost用
        //$db_name = "arigatou_db";    //データベース名
        //$db_host = "localhost"; //DBホスト
        //$db_id   = "root";      //アカウント名
        //$db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        
        // さくらサーバ用
        $db_name = "goldsheep3_arigatou_db";    //データベース名
        $db_host = "mysql57.goldsheep3.sakura.ne.jp"; //DBホスト
        $db_id   = "goldsheep3";      //アカウント名
        $db_pw   = "gakuto1209";      //パスワード：XAMPPはパスワード無しに修正してください。
        
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo; //この追記を忘れない！
      } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}


//課題(関数)：SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
}


//課題(関数)：リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header('Location: index.php');
}
