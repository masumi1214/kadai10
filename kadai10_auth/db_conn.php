<?php
// データベース接続情報
$db_name = '';     // データベース名
$db_host = ''; // DBホスト
$db_id   = '';     // ユーザー名
$db_pw   = '';                 // パスワード

// データベース接続
try {
    $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
    $pdo = new PDO($server_info, $db_id, $db_pw);
    echo "データベース接続に成功しました。"; // 接続確認用メッセージ
} catch (PDOException $e) {
    exit('DB Connection Error: ' . $e->getMessage());
}
?>
