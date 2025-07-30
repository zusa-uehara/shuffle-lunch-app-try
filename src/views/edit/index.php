<h2>社員名の変更</h2>
<div>
  <form action="/edit/create" method="post">
    <div>
        <label for="name">変更したい社員名: </label>
      <input type="text" name="name">
    </div>
    <div>
      <label for="update_name">新しい社員名: </label>
      <input type="text" name="update_name">
    </div>
    <div>
      <button type="submit">変更する</button>
    </div>
  </form>
</div>
<div>
  <h2>社員の一覧</h2>
  <ul style="list-style-type : none;">
    <?php foreach ($employees as $employee): ?>
      <li>
        <?= $employee['id'] ?>：<?= $employee['name'] ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
