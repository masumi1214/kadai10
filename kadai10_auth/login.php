<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        /* 必要であれば追加のスタイルを記述 */
        .container { max-width: 500px; margin-top: 50px; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">ログイン</h1>
        <form method="POST" action="login_act.php">
            <div class="form-group">
                <label for="lid">ユーザーID:</label>
                <input type="text" name="lid" id="lid" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lpw">パスワード:</label>
                <input type="password" name="lpw" id="lpw" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
</body>
</html>
