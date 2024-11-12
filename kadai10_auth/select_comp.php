<?php
// データベース接続
try {
  $db_name = "kadai_db";     // データベース名
  $db_id   = "root";         // アカウント名
  $db_pw   = "";             // パスワード：XAMPPはパスワード無しに修正
  $db_host = "localhost";    // DBホスト
  $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DB Connection Error:'.$e->getMessage());
}

// データ取得SQL作成
$sql = "SELECT * FROM gs_bm_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示
if ($status == false) {
  // エラーハンドリング
  $error = $stmt->errorInfo();
  exit("SQLError: ".$error[2]);
}

// データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($values, JSON_UNESCAPED_UNICODE);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>書籍名表示</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
    table {
      width: 100%;
      margin: 20px 0;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 8px;
      text-align: left;
    }
  </style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container jumbotron">
  <h2>書籍一覧</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>書籍名</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($values as $v) { ?>
        <tr>
          <td><?= h($v["id"]) ?></td>
          <td><a href="detail.php?id=<?= h($v["id"]) ?>"><?= h($v["name"]) ?></a></td>
          <td><a href="delete.php?id=<?= h($v["id"]) ?>">[削除]</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<!-- Main[End] -->

<script>
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
