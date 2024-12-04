<?php
require_once 'head.php';
$categories = UserAction::readCategoryTable();
$brands = UserAction::readBrandTable();
?>

<div class="modal fade" id="updateModal<?=sanitizeHTML($item['id'])?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Редактирование товара</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="col-md-8 mx-auto" id="updateGood">
            <form action="?edit_id=<?=sanitizeHTML($item['id'])?>" method="POST" enctype="multipart/form-data">
                <?php PageController::showMes();?>
                <div class="input-group mb-3">
                    <label class="input-group-text" style="background-color:#ecf3f9" for="update_pic">Загрузить фото</label>
                    <input type="file" class="form-control" name="update_pic" accept="image/png, image/jpeg, image/webp">
                </div>

                <div class="mb-3">
                    <label for="update_name_good" class="form-label">Название товара</label>
                    <input type="text" class="form-control" name="update_name_good" required value="<?php echo isset($item['name']) ? sanitizeHTML($item['name']) : ''; ?>">
                </div>

                <div class="mb-3">
                    <label for="update_price_good" class="form-label">Цена товара</label>
                    <input type="number" class="form-control" name="update_price_good" required value="<?php echo isset($item['price']) ? sanitizeHTML($item['price']) : ''; ?>">
                </div>

                <label for="category" class="form-label">Категория</label>
                <div class="input-group mb-3">
                    <select name="update_category" id="update_category" class="form-control">
                        <option value="" selected="">Выберите категорию</option>
                        <?php
                        foreach ($categories as $category) { ?>
                            <option value="<?=$category['id']?>" <?php echo (isset($item['id_category']) && $item['id_category'] == $category['id']) ? 'selected' : ''; ?>><?=$category['name']?></option>
                        <?php }?>
                    </select>
                </div>

                <label for="brand" class="form-label">Производитель</label>
                <div class="input-group mb-3">
                    <select name="update_brand" id="update_brand" class="form-control">
                        <option value="" selected="">Выберите производителя</option>
                        <?php
                        foreach ($brands as $brand) { ?>
                            <option value="<?=$brand['id']?>" <?php echo (isset($item['id_brand']) && $item['id_brand'] == $brand['id']) ? 'selected' : ''; ?>><?=$brand['name']?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="update_description" class="form-label">Описание</label>
                    <textarea type="text" class="form-control" name="update_description" id="update_description" required><?php echo isset($item['description']) ? sanitizeHTML($item['description']) : ''; ?></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update_submit">Сохранить</button>
                    <button type="submit" class="btn btn-outline-primary" data-bs-dismiss="modal">Отменить</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>