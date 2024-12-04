<?php
require_once '../controller.php';

class PageController{
   // private $messageCode;
    //public static $messageText;
    public static function WriteMessage($mes)
    {
       // $messageCode = $mes;
       // echo $mes;
        if($mes === 'SUCCESSFUL_LOGIN'){
            //echo "<pre>"; print_r($_SESSION); echo "</pre>";
            header("Location: ../templates/welcome.php");
            exit();
        }
        if($mes === 'USER_NOT_FOUND'){
            //self::$messageText = "<p class=\"showMessage\" style=\"color: red;\">Пользователь не найден</p>";
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Пользователь не найден</p>");
            header("Location: ../templates/loginForm.php");
            exit();
        }
        if($mes === 'INVALID_PASSWORD_OR_LOGIN'){
            //self::$messageText = "<p class=\"showMessage\" style=\"color: red;\">Неверный логин или пароль</p>";
             self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Неверный логин или пароль</p>");
             //echo self::$messageText;
            header("Location: ../templates/loginForm.php");
            exit();
        }

        if($mes === 'SUCCESSFUL_SIGN_UP'){
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Регистрация прошла успешно</p>");
            header("Location: ../templates/loginForm.php");
            exit();
        }

        if($mes === 'PASSWORDS_DO_NOT_MATCH'){
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Пароли не совпадают</p>");
        }

        if($mes === 'SUCCESSFUL_ADDITION_CATEGORY')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Категория успешно добавлена</p>");
            //echo self::$messageText;
            header("Location: ../templates/addCategoryForm.php");
            exit();
        }

        if($mes === 'ERROR_ADDITION_CATEGORY')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Ошибка добавления категории</p>");
            //echo self::$messageText;
            header("Location: ../templates/addCategoryForm.php");
            exit();
        }

        if($mes === 'SUCCESSFUL_ADDITION_BRAND')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Производитель успешно добавлен</p>");
            //echo self::$messageText;
            header("Location: ../templates/addBrandForm.php");
            exit();
        }

        if($mes === 'ERROR_ADDITION_BRAND')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Ошибка добавления производителя</p>");
            //echo self::$messageText;
            header("Location: ../templates/addBrandForm.php");
            exit();
        }

        if($mes === 'SUCCESSFUL_ADDITION_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Товар успешно добавлен</p>");
            //echo self::$messageText;
            header("Location: ../templates/addGoodForm.php");
            exit();
        }

        if($mes === 'ERROR_ADDITION_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Ошибка добавления товара</p>");
            //echo self::$messageText;
            header("Location: ../templates/addGoodForm.php");
            exit();
        }

        if(false !== strpos($mes, 'ERROR_FIELDS'))
        {
            $mes = str_replace('ERROR_FIELDS_', '', $mes);
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Заполните поля корректно $mes</p>");
        }

        if(false !== strpos($mes, 'FILE_ALREADY_EXISTS'))
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Файл с таким именем уже существует</p>");
        }

        if($mes === 'SUCCESSFUL_DELETE_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Товар успешно удален</p>");
            header("Location: ../templates/goodsTable.php");
            exit();
        }

        if($mes === 'ERROR_DELETE_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Ошибка удаления товара</p>");
            header("Location: ../templates/goodsTable.php");
            exit();
        }

        if($mes === 'SUCCESSFUL_UPDATE_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: green;\">Товар успешно обновлен</p>");
            header("Location: ../templates/goodsTable.php");
            exit();
        }

        if($mes === 'ERROR_UPDATE_GOOD')
        {
            self::SetMessage("<p class=\"showMessage\" style=\"color: red;\">Ошибка обновления товара</p>");
            header("Location: ../templates/goodsTable.php");
            exit();
        }

    }

    private static function SetMessage($mesString)
    {
        $_SESSION['message'] = $mesString;
    }
    public static function showMes()
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            $_SESSION['message'] = null;
        }
    }
}

?>