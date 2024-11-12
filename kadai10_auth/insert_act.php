<?php
include("funcs.php");
$pdo = db_conn();

$title = $_POST["title"];
$author = $_POST["author"];
$genre = $_POST["genre"];
$description = $_POST["description"];
$published_date = $_POST["published_date"];

$sql = "INSERT INTO gs_book_table(title, author, genre, description, published_date) VALUES(:title, :author, :genre, :description, :published_date)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':published_date', $published_date, PDO::PARAM_STR);

$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>
