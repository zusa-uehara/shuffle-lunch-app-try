<?php
function getEmployees() {
    return [
        ['id' => 1, 'name' => '山田 太郎'],
        ['id' => 2, 'name' => '佐藤 花子'],
        ['id' => 3, 'name' => '鈴木 次郎'],
    ];
}

$groups = [];
$groupSize = (int)3;

$employees = getEmployees();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['shuffle'])){
  shuffle($employees);
}

for ($i = 0; $i < count($employees) ; $i += $groupSize) {
  $groups[] = array_slice($employees, $i , $groupSize);
}
?>
<!DOCTYPE html>
<html lang='ja'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>シャッフルランチ</title>
</head>
<body>
  <div>
    <h1>
      <a href="index.php">シャッフルランチ</a>
    </h1>
    <div>
      <p><a href="employee.php">社員を登録する</a></p>
    </div>
    <div>
      <form method="post" action="index.php">
        <button type="submit" name="shuffle">シャッフルする</button>
      </form>
    </div>
    <div>
      <h2>シャッフル一覧</h2>
      <ul>
        <?php foreach ($groups as $index => $group): ?>
          <h2>グループ <?php echo $index + 1 ?></h2>
          <?php foreach ($group as $employee): ?>
          <li>
            <?php echo  htmlspecialchars($employee['name']) ?>
          </li>
        <?php endforeach; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</body>
</html>
