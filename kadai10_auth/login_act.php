<?php
session_start();
include("funcs.php");
$pdo = db_conn();

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$sql = "SELECT * FROM gs_user_table WHERE lid=:lid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
}

$val = $stmt->fetch(PDO::FETCH_ASSOC);

if ($val === false) {
    echo "ユーザーIDが見つかりません";
} else {
    if (password_verify($lpw, $val["lpw"])) {
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["lid"] = $val["lid"];
        $_SESSION["kanri_flg"] = $val["kanri_flg"];
        $_SESSION["name"] = $val["lid"];
        header("Location: select.php");
        exit();
    } else {
        echo "パスワードが一致しません";
    }
}
?>
