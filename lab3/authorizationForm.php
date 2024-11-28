<?php
require_once 'head.php';
require_once 'authorizationLogic.php';
require_once 'messages.php';
?>

<div class="main py-5">
    <div class="col-md-5 mx-auto" id="signIn">
        <form action="" method="POST">
            <h4 style="padding-bottom: 20px">Вход</h4>
            <div class="mb-3">
                <label for="input_email_signIn" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="input_email_signIn" aria-describedby="emailHelp" 
                value="<?= isset($_POST['input_email_signIn']) && !empty($_POST['input_email_signIn']) ? htmlspecialchars($_POST['input_email_signIn']) : ''?>">
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
    </div>  
</div>  

<?php
require_once 'footer.html';
?>