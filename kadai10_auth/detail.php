<?php
$id = $_GET["id"];
include("funcs.php");
$pdo = db_conn();

$sql = "SELECT * FROM gs_book_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍更新</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .container { max-width: 500px; margin-top: 50px; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>書籍更新</h1>
        <form method="POST" action="update.php">
            <div class="form-group">
                <label>書籍名:</label>
                <input type="text" name="title" value="<?= h($row['title']) ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>著者:</label>
                <input type="text" name="author" value="<?= h($row['author']) ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>ジャンル:</label>
                <input type="text" name="genre" value="<?= h($row['genre']) ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>説明:</label>
                <textarea name="description" rows="4" class="form-control"><?= h($row['description']) ?></textarea>
            </div>
            <div class="form-group">
                <label>出版日:</label>
                <input type="date" name="published_date" value="<?= h($row['published_date']) ?>" class="form-control">
            </div>
            <input type="hidden" name="id" value="<?= h($row['id']) ?>">
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</body>
</html>
