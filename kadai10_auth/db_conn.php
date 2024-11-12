<?php
// データベース接続情報
$db_name = 'masumi1214_gs_kadai10';     // データベース名
$db_host = 'mysql3101.db.sakura.ne.jp'; // DBホスト
$db_id   = 'masumi1214_gs_kadai10';     // ユーザー名
$db_pw   = 'mieko0623';                 // パスワード

// データベース接続
try {
    $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
    $pdo = new PDO($server_info, $db_id, $db_pw);
    echo "データベース接続に成功しました。"; // 接続確認用メッセージ
} catch (PDOException $e) {
    exit('DB Connection Error: ' . $e->getMessage());
}
?>
