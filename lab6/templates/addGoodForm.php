<?php
require_once 'head.php';
require_once '../actions/addGoodLogic.php';
$categories = UserAction::readCategoryTable();
$brands = UserAction::readBrandTable();
?>
<div class="main py-5">
<div class="col-md-5 mx-auto" id="addGood">
    <form action="" method="POST" enctype="multipart/form-data">
        <h4 style="padding-bottom: 20px">Создать новый товар</h4>
        <?php showMes();?>
        <div class="input-group mb-3">
            <label class="input-group-text" style="background-color:#ecf3f9" for="input_pic">Загрузить фото</label>
            <input type="file" class="form-control" name="input_pic" accept="image/png, image/jpeg, image/webp" required>
        </div>

        <div class="mb-3">
            <label for="input_name_good" class="form-label">Название товара</label>
            <input type="text" class="form-control" name="input_name_good" required value="<?php echo isset($_POST['input_name_good']) ? htmlspecialchars($_POST['input_name_good']) : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="input_price_good" class="form-label">Цена товара</label>
            <input type="number" class="form-control" name="input_price_good" required value="<?php echo isset($_POST['input_price_good']) ? htmlspecialchars($_POST['input_price_good']) : ''; ?>">
        </div>

        <label for="category" class="form-label">Категория</label>
        <div class="input-group mb-3">
                <select name="category" id="category" class="form-control">
                    <option value="" selected="">Выберите категорию</option>
                    <?php
                    foreach ($categories as $category) { ?>
                        <option value="<?=$category['id']?>" <?php echo (isset($_POST['category']) && $_POST['category'] == $category['id']) ? 'selected' : ''; ?>><?=$category['name']?></option>
                    <?php }?>
                </select>
            <button type="button" class="btn btn-primary" onclick="document.location='addCategoryForm.php'">Добавить категорию</button>
        </div>

        <label for="brand" class="form-label">Производитель</label>
        <div class="input-group mb-3">
                <select name="brand" id="brand" class="form-control">
                    <option value="" selected="">Выберите производителя</option>
                    <?php
                    foreach ($brands as $brand) { ?>
                        <option value="<?=$brand['id']?>" <?php echo (isset($_POST['brand']) && $_POST['brand'] == $brand['id']) ? 'selected' : ''; ?>><?=$brand['name']?></option>
                    <?php }?>
                </select>
            <button type="button" class="btn btn-primary" onclick="document.location='addBrandForm.php'">Добавить производителя</button>
            </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea type="text" class="form-control" name="description" id="description" required><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
        </div>

        <div class="row justify-content-center" id="button-container">
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-primary" onclick="document.location = 'addGoodForm.php'" name="clearButton" id="clearButton">Очистить</button>
            </div>
        </div>
    </form>
    <a href="goodsTable.php">Вернуться к списку товаров</a>
</div>
</div>

<?php
require_once 'footer.html';
?>