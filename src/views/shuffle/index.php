
      <p><a href="employee">社員を登録する</a></p>
    </div>
    <div>
      <form method="post" action="shuffle">
        <button type="submit" name="shuffle">シャッフルする</button>
      </form>
    </div>
    <div>
      <h2>シャッフル一覧</h2>
        <?php foreach ($groups as $i => $group): ?>
          <h3>
            グループ <?php echo ($i + 1); ?>
          </h3>
          <?php foreach ($group as $employee): ?>
            <p>
              <?php echo  $employee['name']; ?>
            </p>
          <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
