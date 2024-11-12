<?php
session_start();
include("funcs.php");
loginCheck();

if ($_SESSION["kanri_flg"] != "1") {
    exit("管理者のみアクセス可能です。");
}

// POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

// DB接続
$pdo = db_conn();

// データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name, lid, lpw, kanri_flg) VALUES(:name, :lid, :lpw, :kanri_flg)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("user.php");
}
?>
