<?php
// エラーメッセージを表示する設定
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("funcs.php");
$pdo = db_conn();

// 管理者ユーザーの追加
$sql = "INSERT INTO gs_user_table (name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, :kanri_flg, :life_flg)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => 'Admin User',
    ':lid' => 'admin',
    ':lpw' => password_hash('admin123', PASSWORD_DEFAULT),
    ':kanri_flg' => 1,
    ':life_flg' => 0,
]);

// 一般ユーザーの追加
$stmt->execute([
    ':name' => 'General User1',
    ':lid' => 'user1',
    ':lpw' => password_hash('user1234', PASSWORD_DEFAULT),
    ':kanri_flg' => 0,
    ':life_flg' => 0,
]);

echo "ユーザーが登録されました。";
?>
