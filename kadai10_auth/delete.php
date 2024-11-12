<?php
include("funcs.php");
$pdo = db_conn();

$id = $_GET["id"];

$sql = "DELETE FROM gs_book_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>
