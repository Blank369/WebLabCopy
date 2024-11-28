<div class="container-fluid">
        <div class="d-flex justify-content-end">
        <p>Сейчас вы <?php echo (isset($_SESSION['auth'])) ? "авторизованы" : "не авторизованы";?>.&nbsp</p>
        <?php
            if (!empty($_SESSION['auth']))
            { ?>
                <p>Вы вошли как: <strong> <?php echo htmlspecialchars($_SESSION['login']);?></strong>.&nbsp;</p>
                <p><a href='../.core/logOut.php'>Выйти</a></p>
            <?php
            }
            else
            {
        ?>
            <p><a href="loginForm.php" >Авторизоваться</a> или <a href="registerForm.php">Зарегистрироваться</a></p>
        <?php
            }
        ?>
        </div>

</div>