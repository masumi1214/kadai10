<?php
session_start();
include("funcs.php");
loginCheck(); // ログインチェックを実行

if ($_SESSION["kanri_flg"] != "1") {
    // 管理者でなければアクセスを制限
    exit("管理者のみアクセス可能です。");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">ユーザー登録</h1>
        <form method="POST" action="user_insert_act.php">
            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lid">ユーザーID:</label>
                <input type="text" name="lid" id="lid" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lpw">パスワード:</label>
                <input type="password" name="lpw" id="lpw" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kanri_flg">管理フラグ (0:一般, 1:管理者):</label>
                <select name="kanri_flg" id="kanri_flg" class="form-control">
                    <option value="0">一般</option>
                    <option value="1">管理者</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
</body>
</html>
