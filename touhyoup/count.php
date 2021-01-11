<?php
require_once('inc/config.php');
require_once('inc/functions.php');

// $total = ceil('SELECT COUNT(*) AS total FORM answers');
     try {
        //データベースの接続
        $dbh =  new PDO(DSN, DB_USER, DB_PASSWORD);
        
        // SQLのエラーが発生したら PDOException という例外のカプセルを投げる設定
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //SQL文の作成（memosテーブルのidと一致するレコードを抽出）
        $sql = 'SELECT answer, COUNT(*) AS total FROM answers group by answer ORDER BY total DESC';
        
        //プリペアアド・ステートメントの作成（テンプレートみたいなもの）
        $stmt = $dbh->prepare($sql);

        // ステートメント実行
        $stmt->execute();

        $count = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($count);
        //?に値をガっチャンコ
        // $stmt->bindValue(1, $_POST['answer'], $_POST['id'], PDO::PARAM_INT)

        $array = [
          'HTML CSS JavaScript',
          'flutter',
          'gatsby',
          'PHP',
          'Python',
          'laravel',
          'Ruby',
          'React',
          'TypeScript',
          'Next.js'
        ];
         //print_r($count);
        for ($i = 0 ; $i < count($array); $i++)
        {
        // echo $array[$i];
        // echo '<br>';select *
      }

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
    <link rel="stylesheet" href="stylecou.css">
    <title>投票結果</title>
</head>
<body>
<h1 class="main-san">【!!!投票結果!!!】</h1>
  <h3>※投票が多い順番から並んでいます。</h3>
      <ol>
        <?php foreach($count as $name) : ?> 
          <li>
            <?php echo h($array[$name['answer'] - 1 ]) ; ?>
            <?php echo h($name['total']); ?>票
        　</li>
        <?php endforeach; ?>
      </ol>
      <p>▶Thank you for your vote　</p>
    <p><a href="index.php">投票ページに戻る</a></p>
</body>
</html>

    