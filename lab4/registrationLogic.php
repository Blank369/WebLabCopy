<?php 
if (!isset($_SESSION['auth'])) {

require_once 'config.php';

class UserRegistration{

    private $email, $password_hash, $name, $gender, $birth_date, $phone_number, $VK_link, $region;

     function getField(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo "вошли в getField";  
       /* echo "<pre>"; 
        print_r($_POST); 
        echo "</pre>";*/
        //if(isset($_POST['input_name'])){echo "Имя непусто!";}
            if(isset($_POST['input_name']) && preg_match("/^[а-яА-ЯёЁ]+ [а-яА-ЯёЁ]+ ?[а-яА-ЯёЁ]+$/u", $_POST['input_name'])){
              $this->name = htmlspecialchars($_POST['input_name']);
            }

            if(isset($_POST['input_gender']) && preg_match("/^(Мужской|Женский|Не скажу)$/u", $_POST['input_gender'])){
              $this->gender = htmlspecialchars($_POST['input_gender']);
            }
            
            if(isset($_POST['input_birth_date']) && preg_match("/[12][0-9][0-9][0-9]-[0-1][0-9]-[0-3][0-9]/u", $_POST['input_birth_date'])){
              $this->birth_date = htmlspecialchars($_POST['input_birth_date']);
            }
            
            if(isset($_POST['input_region']) && preg_match("/^([А-Яа-я\s]+)\s+(область|республика|край|автономный округ|город|республика)$/u", $_POST['input_region'])){
              $this->region = htmlspecialchars($_POST['input_region']);
            }
          
            if(isset($_POST['input_phone']) && preg_match("/^((\+7|7|8)+([0-9]){10})$/u", $_POST['input_phone'])){
              $this->phone_number = htmlspecialchars($_POST['input_phone']);
            }
            
            if(isset($_POST['input_vk']) && preg_match("/^https:\/\/vk\.com\/\w{6,}$/u", $_POST['input_vk'])){
              $this->VK_link = htmlspecialchars($_POST['input_vk']);
            }

            if(isset($_POST['input_email_signUp']) && preg_match("/\w+\.*\w+@\w+\.\w+/u", $_POST['input_email_signUp'])){
              $this->email = htmlspecialchars($_POST['input_email_signUp']);
            }

            if(isset($_POST['input_password_singUp']) && $_POST['input_password_singUp'] == $_POST['confirm_password_singUp'] && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{6,}$/u", $_POST['input_password_singUp'])){
              $this->password_hash = password_hash(htmlspecialchars($_POST['input_password_singUp']), PASSWORD_DEFAULT);
            }
            else{
              header("Location: registrationForm.php?message=notConfirmPas");
              exit();
            }

            //echo "$this->name, $this->gender, $this->birth_date, $this->region, $this->phone_number, $this->VK_link, $this->email, $this->password_hash";
          }
    }

    function createUser(){
      if(!empty($this->name) && !empty($this->gender) && !empty($this->birth_date) && !empty($this->region) && !empty($this->phone_number) && !empty($this->VK_link) && !empty($this->email) && !empty($this->password_hash))
      {
        //echo "Началась регистрация";
        $query = "INSERT INTO users (email, password_hash, name, gender, birth_date, phone_number, VK_link, region) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        //$conn = pdo();
        global $conn;
        $stmt = $conn->prepare($query);

        $stmt->bind_param("ssssssss",$this->email, $this->password_hash, $this->name, $this->gender, $this->birth_date, $this->phone_number, $this->VK_link, $this->region);
        if ($stmt->execute()) {
          //echo "Вы успешно зарегистрировались!";
          //header('Location: authorizationForm.php');
            header("Location: authorizationForm.php?message=success");
            //$_SESSION['message'] = "Регистрация прошла успешно!"
          exit();
        } else {
            //echo "Ошибка: ";
            //. $stmt->error;
        }   
        $stmt->close();
      }
    }

    function UserRegistration(){
      $this->getField();
      $this->createUser();
    }
}

$newUser = new UserRegistration();
$newUser->UserRegistration();

}
else{
  header('Location: welcome.php');
  exit();
}
?>