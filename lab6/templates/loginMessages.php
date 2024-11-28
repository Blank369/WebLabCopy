<?php
require_once '../controller.php';

    if (!empty($_SESSION['message'])) {
?>
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" style="bottom:20px; right=20px;">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
      <div class="toast-body">
            <?=$_SESSION['message']?>
      </div>
    </div>
<?php
    }
  ?>
