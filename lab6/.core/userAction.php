<?php
require_once '../controller.php';

class UserAction{
    public static function CheckAuth() : bool
    {
        if (isset($_SESSION["auth"])) {
            return $_SESSION["auth"];
        }
        else{
            return false;
        }
    }

    public static function SignIn()
    {
        if(!self::CheckAuth()){
            PageController::WriteMessage(UserLogin::Auth($_POST['input_email_signIn'], $_POST['input_password_singIn']));
        }
    }

    public static function SignUp()
    {
        if($_POST['input_password_singUp'] == $_POST['confirm_password_singUp']) {
             PageController::WriteMessage(UserRegister::createUser($_POST['input_name'], $_POST['input_gender'], $_POST['input_birth_date'],
                                            $_POST['input_region'], $_POST['input_phone'], $_POST['input_vk'],
                                            $_POST['input_email_signUp'], $_POST['input_password_singUp']));
            }
        else{
            PageController::WriteMessage('PASSWORDS_DO_NOT_MATCH');
        }
    }

    public static function readGoodsTable()
    {
        return CRUDTables::GetGoods();
    }

    public static function addGood()
    {
        CRUDTables::addGood($_FILES['input_pic'], $_POST['input_name_good'], $_POST['category'], $_POST['brand'], $_POST['description'], $_POST['input_price_good']);
    }

    public static function readCategoryTable()
    {
        return CRUDTables::GetCategories();
    }
    public static function addCategory()
    {
        CRUDTables::addCategory($_POST['input_name_category']);
    }

    public static function readBrandTable()
    {
        return CRUDTables::GetBrands();
    }
    public static function addBrand()
    {
        CRUDTables::addBrand($_POST['input_name_brand']);
    }



}
?>