<?php
require_once 'head.php';
require_once 'importJSON.php';
require_once 'exportJSON.php';
?>


<div class="main py-5">
    <div class="container">
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
      <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <img class="icon2" src="pic/icons/icon_file-earmark-arrow-down.svg">
              Импорт
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img class="icon2" src="pic/icons/icon_filetype-json.svg"></span>
                    <input type="text" class="form-control" name="import_address" placeholder="/lab5/files/import/import.json" aria-describedby="basic-addon1" 
                            pattern='/(\/(\w[^\\/:*\"<>|]+))*\/(\w[^\\/:*\"<>|]+)\.json/u' required
                            value="<?= isset($_POST['import_address']) && !empty($_POST['import_address']) ? htmlspecialchars($_POST['import_address']) : ''?>">
                </div>
                <?php if (!empty($messageI) && $messageI==="INCORRECT_ADDRESS"){echo "<p class=\"showMessage\" style=\"color: red;\"> Введите корректный адрес </p>";}?>
                <?php if (!empty($messageI) && $messageI==="FAILED_OPEN_FILE"){echo "<p class=\"showMessage\" style=\"color: red;\"> Ошибка при открытии файла. Файл с данным адресом не существует. </p>";}?>
                <?php if (!empty($messageI) && $messageI==="JSON_ERROR"){echo "<p class=\"showMessage\" style=\"color: red;\"> Ошибка при дешифровании файла. Некорректная структура JSON файла </p>";}?>
                <?php if (!empty($messageI) && $messageI==="IMPORT_SUCCESSFUL"){echo "<p class=\"showMessage\"> Импорт данных произошел успешно! 
                    Добавлено записей: " . $importData[0] . ". Обнаружено дубликатов: " . $importData[1] . ". Ошибок добавления: " . $importData[2] ."</p>";}?>

                <button type="submit" name="sendIm" class="btn btn-primary mb-3">Импорт</button>
            </form>

      </div>
    </div>
  </div>
  <div class="accordion-item">
      <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <img class="icon2" src="pic/icons/icon_file-earmark-arrow-up.svg">
              Экспорт
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <form action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><img class="icon2" src="pic/icons/icon_filetype-json.svg"></span>
            <input type="text" class="form-control" name="export_address" placeholder="/lab5/files/export/export.json" aria-describedby="basic-addon1" 
                    pattern='/(\/(\w[^\\\/:*"<>|]+))*\/(\w[^\\\/:*"<>|]+).json/u' required
                    value="<?= isset($_POST['export_address']) && !empty($_POST['export_address']) ? htmlspecialchars($_POST['export_address']) : ''?>">
        </div>
        <?php if (!empty($messageE) && $messageE==="INCORRECT_ADDRESS"){echo "<p class=\"showMessage\" style=\"color: red;\"> Введите корректный адрес </p>";}?> 
        <button type="submit" name="sendEx" class="btn btn-primary mb-3">Экспорт</button>
        <div>
        <?php if (!empty($messageE) && $messageE==="EXPORT_SUCCESSFUL"){echo "<p class=\"showMessage\">Экспорт произведен успешно! Ссылка на файл 
                                                                        <a href=" . htmlspecialchars($jsonFile) . ">" . $jsonFile . "</a></p>";}
            if (!empty($messageE) && $messageE==="ERROR_WRITE"){echo "<p class=\"showMessage\" style=\"color: red;\"> Ошибка при записи в файл </p>";}?>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php
require_once 'footer.html';
?>