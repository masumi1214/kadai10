<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍登録</title>
</head>
<body>
    <form method="POST" action="insert_act.php">
        <label>書籍名: <input type="text" name="title"></label><br>
        <label>著者: <input type="text" name="author"></label><br>
        <label>ジャンル: <input type="text" name="genre"></label><br>
        <label>説明: <textarea name="description"></textarea></label><br>
        <label>出版日: <input type="date" name="published_date"></label><br>
        <button type="submit">登録</button>
    </form>
</body>
</html>
