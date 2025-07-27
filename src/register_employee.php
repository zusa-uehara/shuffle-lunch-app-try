<?php
#データベースに接続する
$mysqli = new mysqli('db','test_user', 'pass', 'test_database');
if ($mysqli->connect_error) {
  throw new RuntimeException('mysqli接続エラー:' . $mysqli->connect_error);
}
#postされたデータを保存する
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $stmt = $mysqli->prepare('INSERT INTO employees (name) VALUES (?)');
  $stmt->bind_param('s', $_POST['name']);
}

#データベースと切断する
function getEmployees() {
    return [
        ['id' => 1, 'name' => '山田 太郎'],
        ['id' => 2, 'name' => '佐藤 花子'],
        ['id' => 3, 'name' => '鈴木 次郎'],
    ];
}

$employees = getEmployees();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員の登録</title>
</head>
<body>
  <div>
    <h1>
      <a href="index.php">社員の登録</a>
    </h1>
    <div>
      <form action="register_employee.php" method="post">
        <div>
          <label for="name">社員名: </label>
          <input type="text" name="name">
          <button type="submit">登録する</button>
        </div>
      </form>
    </div>
    <div>
      <h2>社員の一覧</h2>
      <ul>
        <?php foreach ($employees as $employee): ?>
          <li>
            名前: <?= htmlspecialchars($employee['name']) ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</body>
</html>
