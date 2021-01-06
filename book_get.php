<?php

require_once('db_info.php');
$book_id = 1;

try {
    //DBに接続
    $pdo = new PDO($dsn, $user, $password);
    $sql = 'select book_id, title, author, publisher, price from books where book_id = :book_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':book_id', $book_id);

    $stmt->execute();
    $result = $stmt->fetch();
    var_dump($result);
}catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

