<?php
session_start();
include("funcs.php");
loginCheck();

if ($_SESSION["kanri_flg"] != "1") {
    exit("管理者のみアクセス可能です。");
}

// DB接続
$pdo = db_conn();

// ユーザー一覧を取得
$sql = "SELECT * FROM gs_user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">ユーザー一覧</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>ユーザーID</th>
                <th>権限</th>
                <th>操作</th>
            </tr>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= h($row["id"]) ?></td>
                    <td><?= h($row["name"]) ?></td>
                    <td><?= h($row["lid"]) ?></td>
                    <td><?= h($row["kanri_flg"]) == 1 ? "管理者" : "一般" ?></td>
                    <td>
                        <a href="user_update.php?id=<?= h($row["id"]) ?>" class="btn btn-info btn-sm">編集</a>
                        <a href="user_delete.php?id=<?= h($row["id"]) ?>" class="btn btn-danger btn-sm" onclick="return confirm('削除しますか？')">削除</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
