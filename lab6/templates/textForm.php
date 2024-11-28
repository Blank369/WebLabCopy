<?php
require_once 'head.php';
require_once '..\.core\textLogic.php';
?>


<div class="main py-5">
    <div class="col-md-6 mx-auto">
    <form action="" method="POST">
    <div class="row">
            <button type="button" onclick="document.location = 'textForm.php?preset=1'" name="preset1" class="btn btn-secondary mb-3">Киноринхи</button>
            <button type="button" onclick="document.location = 'textForm.php?preset=2'" name="preset2" class="btn btn-danger mb-3">Интервью</button>
            <button type="button" onclick="document.location = 'textForm.php?preset=3'" name="preset3" class="btn btn-info mb-3">Винни-Пух</button>         
        </div>
        <div class="mb-3">
            <label for="input_text" class="form-label">Введите текст</label>
            <textarea type="text" class="form-control" name="input_text" value="<?php echo checkPreset() ? setPreset() : ''; ?>"></textarea>
        </div>
        <div class="row">
            <select name="select_ex" class="form-select" style="margin-bottom: 20px;" value="<?php echo isset($_POST['select_ex']) ? htmlspecialchars($_POST['select_ex']) : ''; ?>" required>
                <option value = "0">Без обработки</option>
                <option value = "5" <?= (isset($_POST['select_ex']) && $_POST['select_ex'] == '5') ? 'selected' : ''; ?>> Задание 5 (замена тире и минусов)</option>
                <option value = "8" <?= (isset($_POST['select_ex']) && $_POST['select_ex'] == '8') ? 'selected' : ''; ?>>Задание 8 (точки в сокращениях)</option>
                <option value = "14" <?= (isset($_POST['select_ex']) && $_POST['select_ex'] == '14') ? 'selected' : ''; ?>>Задание 14 (указатель ссылок)</option>
                <option value = "16" <?= (isset($_POST['select_ex']) && $_POST['select_ex'] == '16') ? 'selected' : ''; ?>>Задание 16 (запретные слова)</option>
            </select>
            <button type="submit" name="send" class="btn btn-primary mb-3">Отправить</button>
            <button type="button" onclick="document.location = 'textForm.php'" name="clear" class="btn btn-outline-primary mb-3">Очистить</button>
        </div>
    </form>
    </div>


    <div class="container" id="output">
        <?php if(isset($_POST['send'])){
            echo pastProcessedTextFromForm();
        } ?>
    </div>

</div>

<?php
require_once 'footer.html';
?>