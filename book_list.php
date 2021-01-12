<?php
/**
 * 書籍の一覧表示
 * 
 * phpsampleデータベースのbooksテーブルより
 * 書籍の一覧を取り出し、テーブルで表示する。
 * 
 */

require_once('db_info.php');

try {
    //DBに接続
    $pdo = new PDO($dsn, $user, $password);
    
    //SQL
    $sql = 'select book_id, title, author, publisher, price from books';

    //実行
    $book_result = $pdo->query($sql);

    //MySQL切断
    $pdo = null;
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
?>
<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>BOOK LIST</title>
  </head>
  <body>
    <div class="container">
    <h1>BOOK LIST</h1>
    <p><a href="book_form.php" class="btn btn-primary">追加</a></p>
    <table class="table table-striped">
      <tr>
        <th>#</th>
        <th>タイトル</th>
        <th>著者</th>
        <th>出版社</th>
        <th>価格</th>
        <th>#️</th>
      </tr>
      <?php foreach($book_result as $book):?>
      <tr>
        <td><?=$book['book_id']?></td>
        <td><?=$book['title']?></td>
        <td><?=$book['author']?></td>
        <td><?=$book['publisher']?></td>
        <td><?=$book['price']?></td>
        <td><a href="book_update_form.php?book_id=<?=$book['book_id']?>">修正</a></td>
      </tr>
      <?php endforeach ?>
    </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>