
    <h2>社員登録</h2>
    <?php if (count($errors)) : ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li>
            <?= $error ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif ; ?>
    <div>
      <form action="/employee/create" method="post">
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
            <?= $employee['name'] ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
