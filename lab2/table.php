<?php
require_once 'logic.php';
require_once 'electronics.php';
?>

<?php
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
                <td><?=$item['name']?></td>
                <td><?=$item['name_category']?></td>
                <td><?=$item['name_brand']?></td>
                <td><?=$item['description']?></td>
                <td><?=$item['price']?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
    </div>

<?php require_once 'footer.php'; ?>