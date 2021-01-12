<?php
/**
 * 書籍の追加
 * 
 * 書籍をデータベースに追加、完了表示をする
 * 
 */

//セッション利用の開始
session_start();

//セッションにデータがあれば
if($_SESSION['book']){
  $book = $_SESSION['book'];
  $title = $book['title'];
  $author = $book['author'];
  $publisher = $book['publisher'];
  $price = $book['price'];

  $result_string = "";

  //MySQLに登録
  // ドライバ呼び出しを使用して MySQL データベースに接続します
  $dsn = 'mysql:dbname=phpsample;host=127.0.0.1';
  $user = 'php';
  $password = 'Secret01%';

  try {
    //接続
    $pdo = new PDO($dsn, $user, $password);


    //SQL
    $sql = 'INSERT INTO books(title,author,publisher,price) VALUES (:title, :author, :publisher, :price);';
    //PreparedStatment
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':publisher', $publisher);
    $stmt->bindParam(':price', $price);
    $result = $stmt->execute();

    if($result){
      $result_string = "登録が完了しました";
    }else{
      $result_string = "登録が失敗しました";
    }

    //セッションを削除
    unset($_SESSION['book']);
    
  } catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
  }
  //MySQL切断
  $pdo = null;

}else{
  //セッションにデータがなかった時
  //入力フォームに戻す
  header('location:./book_form.php');
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

    <title>BOOK FORM</title>
  </head>
  <body>
    <div class="container">
    <h1>BOOK FORM</h1>
    <p><?=$result_string?></p>
    <p><a href="./book_list.php">一覧</a></p>
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