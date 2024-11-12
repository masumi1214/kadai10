<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍一覧</a></div>
    </div>
  </nav>
</header>

<div class="container">
  <form method="POST" action="insert.php">
    <div class="jumbotron">
     <fieldset>
      <legend>書籍登録</legend>
        <label>書籍名：<input type="text" name="name" class="form-control"></label><br>
        <label>書籍URL：<input type="text" name="url" class="form-control"></label><br>
        <label>書籍コメント：<textarea name="comment" rows="4" class="form-control"></textarea></label><br>
        <input type="submit" value="登録" class="btn btn-primary">
      </fieldset>
    </div>
  </form>
</div>
</body>
</html>
