<?php
require_once '../.core/sessionStart.php';
require_once 'head.php';
if (isset($_SESSION['auth'])) {

    $result = UserAction::readGoodsTable();
    ?>
    <div class="container" id="goods_table">
        <div class="row">
            <button type="button" class="btn btn-primary" onclick="document.location='addGoodForm.php'">Добавить товар</button>
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
                            <td><?=htmlspecialchars($item['name'])?></td>
                            <td><?=htmlspecialchars($item['name_category'])?></td>
                            <td><?=htmlspecialchars($item['name_brand'])?></td>
                            <td><?=htmlspecialchars($item['description'])?></td>
                            <td><?=htmlspecialchars($item['price'])?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php
}
else{
    header('Location: loginForm.php');
    exit();
}

require_once 'footer.html';
?>