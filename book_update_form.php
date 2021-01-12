<?php

//book_idがなければ一覧に戻る
if(!isset($_GET['book_id'])){
    header("location:book_list.php");
    exit();
}


require_once('db_info.php');
$book_id = $_GET['book_id'];
$title = '';
$author = '';
$publisher = '';
$price = '';
$error_array = array();

try {
    //DBに接続
    $pdo = new PDO($dsn, $user, $password);
    $sql = 'select book_id, title, author, publisher, price from books where book_id = :book_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':book_id', $book_id);

    $stmt->execute();
    $result = $stmt->fetch();
    //対象がなければ終了
    if(!$result){
        die("指定されたデータはありません");
        exit();
    }
    $title = $result['title'];
    $author = $result['author'];
    $publisher = $result['publisher'];
    $price = $result['price'];

}catch (PDOException $e) {
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

    <title>BOOK FORM</title>
  </head>
  <body>
    <div class="container">
    <h1>BOOK FORM</h1>
    <?php if(count($error_array)>0):?>
    <ul class="alert alert-danger">
      <?php foreach($error_array as $error):?>
      <li><?=$error ?></li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
    <form action="book_confirm.php" method="post">
      <div>
        <label for="title">書名</label>
        <input type="text" name="title" id="title" value="<?=$title?>">
      </div>
      <div>
        <label for="author">著者</label>
        <input type="text" name="author" id="author" value="<?=$author?>">
      </div>
      <div>
        <label for="publisher">出版社</label>
        <input type="text" name="publisher" id="publisher" value="<?=$publisher?>">
      </div>
      <div>
        <label for="price">価格</label>
        <input type="number" name="price" id="price" value="<?=$price?>">
      </div>
      <button type="submit" class="btn btn-primary">確認</button>
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