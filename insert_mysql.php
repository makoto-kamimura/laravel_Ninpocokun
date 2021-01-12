<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
$dsn = 'mysql:dbname=phpsample;host=127.0.0.1';
$user = 'php';
$password = 'Secret01%';

try {
    //接続
    $dbh = new PDO($dsn, $user, $password);

    //登録情報
    $username = "國森菜々穂";
    $password = "abcd1234";

    //SQL
    $sql = 'INSERT INTO user (name, password) VALUES(?,?)';
    //PreparedStatment
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $result = $stmt->execute();

    var_dump($result);
    
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}