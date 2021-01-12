<?php
/**
 * 書籍の追加
 * 
 * 書籍新規追加の確認画面
 * 
 */

//セッション利用の開始
session_start();

require_once('./Validation.php');

//POST送信なら
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $title = htmlspecialchars($_POST['title']);
  $author = htmlspecialchars($_POST['author']);
  $publisher = htmlspecialchars($_POST['publisher']);
  $price = htmlspecialchars($_POST['price']);

  //連想配列に格納
  $book = array(
    'title' => $title,
    'author' => $author,
    'publisher' => $publisher,
    'price' => $price,
  );
  //セッションに登録
  $_SESSION['book'] = $book;

  //バリデーション
  $validate = new Validation($title, $author, $publisher, $price);
  $error_array = $validate->validate();
  if(count($error_array)>0){//エラーがあれば
    //book_formに戻る
    $_SESSION['error_array'] = $error_array;
    header('location:./book_form.php');
    exit();
  }
}else{
  //GETアクセスなら入力フォームに戻す
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
    <form action="book_complete.php" method="post">
      <div>
        <p>タイトル：<?=$title?></p>
      </div>
      <div>
        <p>著者：<?=$author?></p>
      </div>
      <div>
        <p>出版社：<?=$publisher?></p>
      </div>
      <div>
        <p>価格：<?=$price?></p>
      </div>
      <button type="submit" class="btn btn-primary">確認</button>
      <a href="book_form.php" class="btn btn-info">戻る</a>
    </form>
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