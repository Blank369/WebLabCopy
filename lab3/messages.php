<?php
    if (!empty($_GET['message']) && $_GET['message'] === 'success') {
?>
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" style="bottom:20px; right=20px;">
        <svg class="bd-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#008000"></rect></svg>
        <strong class="me-auto">Поздравляем!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
      <div class="toast-body">
          Вы успешно зарегистрировались!
      </div>
    </div>
<?php
    }
    
    if (!empty($_GET['message']) && $_GET['message'] === 'invalid') {
?>
    <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header" style="bottom:20px; right=20px;">
        <svg class="bd-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FF0000"></rect></svg>
        <strong class="me-auto">Ошибка авторизации!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
      <div class="toast-body">
        Неверный логин или пароль
      </div>
    </div>
<?php
    }
?>
    