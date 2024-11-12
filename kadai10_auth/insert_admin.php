<?php
include("funcs.php");
$pdo = db_conn();

$sql = "INSERT INTO gs_user_table (lid, lpw, kanri_flg, life_flg) VALUES (:lid, :lpw, :kanri_flg, :life_flg)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', 'admin', PDO::PARAM_STR);
$stmt->bindValue(':lpw', password_hash('admin123', PASSWORD_DEFAULT), PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', 1, PDO::PARAM_INT); // 管理者権限
$stmt->bindValue(':life_flg', 0, PDO::PARAM_INT); // 有効フラグ
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}else{
    echo "ユーザーが登録されました。";
}
?>
