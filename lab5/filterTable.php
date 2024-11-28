<?php
require_once 'sessionStart.php';
if (isset($_SESSION['auth'])) {
  
  require_once 'filterLogic.php';
  require_once 'filterForm.php';

  $result = filter();
?>
    <div class="container" id="goods_table">
        <table class="table">
            <?php if($result):?>
            <thead>
                <tr>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Производитель</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Стоимость</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($result as $item):?>
              <tr>
                <th scope="row"><img src="<?=$item['img_path']?>" style="max-width: 200px; max-height: 200px"></th>
                <td><?=htmlspecialchars($item['name'])?></td>
                <td><?=htmlspecialchars($item['name_category'])?></td>
                <td><?=htmlspecialchars($item['name_brand'])?></td>
                <td><?=htmlspecialchars($item['description'])?></td>
                <td><?=htmlspecialchars($item['price'])?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
    </div>

<?php
}
else{
  header('Location: authorizationForm.php');
  exit();
}
?>