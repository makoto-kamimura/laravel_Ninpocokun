<?php

// ドライバ呼び出しを使用して MySQL データベースに接続します
$dsn = 'mysql:dbname=phpsample;host=127.0.0.1';
$user = 'php';
$password = 'Secret01%';

try {
    //DBに接続
    $dbh = new PDO($dsn, $user, $password);
    
    //SQL
    $sql = 'select id, name, password from user';

    //実行
    $sth = $dbh->query($sql);

    //取得
    foreach ($sth as $row) {
        print $row['id'] . "\t";
        print $row['name'] . "\t";
        print $row['password'] . PHP_EOL;
    }

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

//MySQL切断
$dbh = null;