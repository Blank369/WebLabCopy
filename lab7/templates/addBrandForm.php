<?php
require_once 'head.php';
?>

<div class="main py-5">
    <div class="col-md-5 mx-auto" id="addGood">
        <form action="../actions/addBrandLogic.php" method="POST">
            <h4 style="padding-bottom: 20px">Добавить нового производителя</h4>

            <div class="mb-3">
                <label for="input_name_brand" class="form-label">Название категории</label>
                <input type="text" class="form-control" name="input_name_brand" required value="<?php echo isset($_POST['input_name_brand']) ? htmlspecialchars($_POST['input_name_brand']) : ''; ?>">
            </div>
            <?php PageController::showMes();?>
            <button type="submit" class="btn btn-primary">Добавить</button>
            <a href="addGoodForm.php">Вернуться к добавлению товара</a>
        </form>
    </div>
</div>

<?php
require_once 'footer.html';
?>
