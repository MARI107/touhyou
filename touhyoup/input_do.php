<?php
require_once('inc/config.php');
require_once('inc/functions.php');

session_start();

if ( !isset($_POST['name']) || empty($_POST['name']) ) {
  header('Location: index.php');
  exit();
}
try {
  //データベースの接続
  $dbh =  new PDO(DSN, DB_USER, DB_PASSWORD);
  
  // SQLのエラーが発生したら PDOException という例外のカプセルを投げる設定
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //SQL文の作成（memosテーブルのidと一致するレコードを抽出）
  $sql = 'insert into answers(answer, created	)
   values(?, now())';
  
  //プリペアアド・ステートメントの作成（テンプレートみたいなもの）
  $stmt = $dbh->prepare($sql);

  //?に値をガっチャンコ
  $stmt->bindValue(1, $_POST['name'], PDO::PARAM_INT);
  
  // ステートメント実行
  $stmt->execute();
   
  //DBの接続終了
  $dbh = null;
 
} catch(PDOException $e) {
  echo 'エラー' . h( $e->getMessage(),ENT_QUOTES, 'UTF-8' );
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleput.css">
  <title>投票済み</title>
</head>
<body>
<div class="main-ni">
  <h1>投票ありがとうございます！</h1>
</div>
<img src="img/go3.png" width="160" height="120" alt="Go3">
  <p><a href="count.php">投票結果を見てみる</a></p>
  <p><a href="./">前の画面に戻る</a></p>
</body>
</html>