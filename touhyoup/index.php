<?php
require_once('inc/config.php');
require_once('inc/functions.php');

session_start();

 if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = sha1(uniqid(mt_rand(), true));
 }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylein.css">
    <title>どれが好き？投票</title>
</head>
<body>
     <?php if ( isset( $error['name'] ) ) : ?>
        <p><?php echo h($error['name']); ?></p>
        <?php endif; ?>

    <div class="main">
    <h1 class="fuchidori">プログラミング・フレームワーク<br>人気投票</h1>
    <h2 class="fuchidori2">【好きな言語を一つ選んで、一番下の投票するを押してください！】</h2>
   </div>
     <div id="gokuma">
     <img src="img/go2.png" width="250" height="100" alt="Go2">
     </div>
     
    <form action="input_do.php" method="post">
    <div id="th">
    <ul>
      <div id="ing-1">
      <li class="li"><img src="img/html.css.js.png" width="200" height="170" alt="HTML CSS JavaScript"><br>
      <input type="radio" name="name" value="1">HTML CSS JavaScript</input></li>
    </div>
    
      <div id="ing-2">
      <li class="li"><img src="img/flutter.png" width="200" height="170" alt="flutter"><br>
      <input type="radio" name="name" value="2">flutter</input></li>
      </div>
    
      <div id="ing-3"> 
      <li class="li"><img src="img/gatsbyjs.png" width="200" height="170" alt="gatsby"><br>
      <input type="radio" name="name" value="3">gatsby</input></li>
      </div>
    
      <div id="img-4">
      <li class="li"><img src="img/php.png" width="200" height="170" alt="PHP"><br>
      <input type="radio" name="name" value="4">PHP</input></li>
      </div>
    
      <div id="img-5">
      <li class="li"><img src="img/python.png" width="200" height="170" alt="Python"><br>
      <input type="radio" name="name" value="5">Python</input></li>
      </div>
      <div id="img-6">
      <li class="li"><img src="img/laravel.png" width="200" height="170" alt="laravel"><br>
      <input type="radio" name="name" value="6">laravel</input></li>
      </div>
      <div id="img-7">
      <li class="li"><img src="img/ruby.png" width="200" height="170" alt="Ruby"><br>
      <input type="radio" name="name" value="7">Ruby</input></li>
      </div>
      <div id="img-8"> 
      <li class="li"><img src="img/react.png" width="200" height="170" alt="React"><br>
      <input type="radio" name="name" value="8">React</input></li>
      </div>
      <div id="img-9">
      <li class="li"><img src="img/typescript.png" width="200" height="170" alt="TypeScript"><br>
      <input type="radio" name="name" value="9">TypeScript</input></li>
      </div>
      <div id="img-10">
      <li class="li"><img src="img/next_js.png" width="200" height="170" alt="Next.js"><br>
      <input type="radio" name="name" value="10">Next.js</input></li>
      </div>
     </div>
      <footer class="touhyou">
      <p><input type="submit" value="投票する"></p>
     </footer>

      <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
     </ul>
</form>
<div class="cp">
      <small>© 2021 mari.y</small>
</div>
</body>
</html>