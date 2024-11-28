<?php
require_once 'head.php';
?>

<div class="main py-5">
    <div class="col-md-5 mx-auto" id="addGood">
        <form action="../actions/addCategoryLogic.php" method="POST">
            <h4 style="padding-bottom: 20px">Добавить новую категорию</h4>

            <div class="mb-3">
                <label for="input_name_category" class="form-label">Название категории</label>
                <input type="text" class="form-control" name="input_name_category" required value="<?php echo isset($_POST['input_name_category']) ? htmlspecialchars($_POST['input_name_category']) : ''; ?>">
            </div>
            <?php showMes();?>
            <button type="submit" class="btn btn-primary">Добавить</button>
            <a href="addGoodForm.php">Вернуться к добавлению товара</a>
        </form>
    </div>
</div>

<?php
require_once 'footer.html';
?>
