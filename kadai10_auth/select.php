<?php
session_start();
include("funcs.php");
sessChk();
$pdo = db_conn();

$sql = "SELECT * FROM gs_book_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<tr>";
        $view .= "<td>" . h($r["id"]) . "</td>";
        $view .= "<td>" . h($r["title"]) . "</td>";
        $view .= "<td>" . h($r["author"]) . "</td>";
        $view .= "<td>" . h($r["genre"]) . "</td>";
        $view .= "<td>" . h($r["description"]) . "</td>";
        $view .= "<td>" . h($r["published_date"]) . "</td>";
        $view .= '<td><a class="btn btn-secondary" href="detail.php?id=' . h($r["id"]) . '">更新</a></td>';
        $view .= '<td><a class="btn btn-danger" href="delete.php?id=' . h($r["id"]) . '">削除</a></td>';
        $view .= "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍一覧</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .container { max-width: 900px; margin-top: 30px; }
        table { width: 100%; margin-bottom: 20px; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>書籍一覧</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>書籍名</th>
                <th>著者</th>
                <th>ジャンル</th>
                <th>説明</th>
                <th>出版日</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
            <?= $view ?>
        </table>
        <a class="btn btn-primary" href="logout.php">ログアウト</a>
    </div>
</body>
</html>
