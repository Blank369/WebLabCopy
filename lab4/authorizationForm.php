<?php
//require_once 'sessionStart.php';
require_once 'header.php';
require_once 'authorizationLogic.php';
?>

<?php
    if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>
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

    if (isset($_GET['message']) && $_GET['message'] == 'error') { ?>
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header" style="bottom:20px; right=20px;">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#FF0000"></rect></svg>
            <strong class="me-auto">Ошибка авторизации!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
          </div>
          <div class="toast-body">
            Неверный логин или пароль!
          </div>
        </div>
    
        <?php
        }
    
?>

<div class="main py-5">
    <div class="col-md-5 mx-auto" id="signIn">
        <form action="" method="POST">
            <h4 style="padding-bottom: 20px">Вход</h4>
            <div class="mb-3">
                <label for="input_email_signIn" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="input_email_signIn" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="input_password_singIn" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="input_password_singIn">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            <div class="mb-3">
                Нет аккаунта? <a href="registrationForm.php">Зарегистрироваться</a>
            </div>
        </form>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']); // Удаляем сообщение после его показа
        }
        ?>
    </div>  
</div>  

<?php
require_once 'footer.html';
?>