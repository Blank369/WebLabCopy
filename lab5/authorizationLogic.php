<?php
require_once 'config.php';

if (!isset($_SESSION['auth'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginUser = new UserLogin();
        $loginUser->UserLogin();
    }
}
else{
    header('Location: welcome.php');
    exit();
}


class UserLogin{

    private $login, $password;

    function checkAuth()
    {
       // echo "вошли в логин";
        if (isset($_SESSION["auth"])) {
            return $_SESSION["auth"];
           // echo "сессия есть";
        }
        else{
           // echo "сессии нет";
            return false;
        } 
    }

    /*function SaveParam(){
        if (isset($_POST['input_email_signIn'])) {
            $_SESSION["input_email_signIn"] = htmlspecialchars($_POST['input_email_signIn']);
        }
    }*/

    function Auth(){
        /*echo "начинаем авторизацию";
        echo "<pre>"; 
        print_r($_POST); 
        echo "</pre>";*/
        if (isset($_POST['input_email_signIn']) && isset($_POST['input_password_singIn'])) {
            //echo "переменные не пусты";
            $this->login = htmlspecialchars($_POST['input_email_signIn']);
            $this->password = htmlspecialchars($_POST['input_password_singIn']);
            
            $query = "SELECT * FROM users WHERE email='$this->login'";
            global $conn;
            $res = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($res);
            
            if (!empty($user)) {
                $password_hash = $user['password_hash'];
                if (password_verify($this->password, $password_hash)) {
                    $_SESSION['auth'] = true;
		            $_SESSION['login'] = htmlspecialchars($user['name']);
                    $message = "Вы успешно зарегистрировались!";
                    header('Location: welcome.php?message=success');
                    exit();
                } else {
                    $message = "Неверный логин или пароль!";
                    header('Location: authorizationForm.php?message=invalid');
                    exit();
                }
            } else {
                $message = "Неверный логин или пароль!";
                header('Location: authorizationForm.php?message=invalid');
                exit();
            }
        }
        else{
            $message = "Неверный логин или пароль!";
            header('Location: authorizationForm.php?message=invalid');
            exit();
        }
    }

    function UserLogin()
    {
        //$this->SaveParam();
        if(!$this->checkAuth()){
            $this->Auth();
        }
    }
}

?>