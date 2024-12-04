<?php
require_once '../.core/sessionStart.php';
require_once 'head.php';
require_once '../actions/deleteGoodLogic.php';
require_once '../actions/updateGoodLogic.php';
if (isset($_SESSION['auth'])) {

    $result = UserAction::readGoodsTable();
    ?>
    <div class="container" id="goods_table">
        <div class="row">
            <?php PageController::showMes(); ?>
            <button type="button" class="btn btn-primary" onclick="document.location='addGoodForm.php'">Добавить товар</button>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Код</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Производитель</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <?php if($result):?>
                    <tbody>
                    <?php foreach($result as $item):?>
                        <tr>
                            <td><?=sanitizeHTML($item['id'])?></td>
                            <th scope="row"><img src="<?=$item['img_path']?>" style="max-width: 200px; max-height: 200px"></th>
                            <td><?=sanitizeHTML($item['name'])?></td>
                            <td><?=sanitizeHTML($item['name_category'])?></td>
                            <td><?=sanitizeHTML($item['name_brand'])?></td>
                            <td><?=sanitizeHTML($item['description'])?></td>
                            <td><?=sanitizeHTML($item['price'])?></td>
                            <td><a href="?edit_id=<?=sanitizeHTML($item['id'])?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal<?=sanitizeHTML($item['id'])?>">Редактировать</a>
                                <?php require 'updateGoodForm.php'; ?>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?=sanitizeHTML($item['id'])?>">Удалить</a>
                                <?php require 'deleteGoodModal.php'; ?>

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