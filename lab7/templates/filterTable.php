<?php
require_once '../.core/filterLogic.php';
$result = filter();
?>
    <div class="container" id="filter_goods_table">
        <div class="row">
        <table class="table">
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
            <?php if($result):?>
            <tbody>
            <?php foreach($result as $item):?>
              <tr>
                <th scope="row"><img src="<?=$item['img_path']?>" style="max-width: 200px; max-height: 200px"></th>
                <td><?=sanitizeHTML($item['name'])?></td>
                <td><?=sanitizeHTML($item['name_category'])?></td>
                <td><?=sanitizeHTML($item['name_brand'])?></td>
                <td><?=sanitizeHTML($item['description'])?></td>
                <td><?=sanitizeHTML($item['price'])?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
          </table>
    </div>
    </div>
