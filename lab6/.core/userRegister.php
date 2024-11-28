<?php 

class UserRegister{
    
     public static function checkFields($name, $gender, $birth_date, $region, $phone_number, $VK_link, $email, $password)
     {
        if(isset($name) && preg_match("/^[а-яА-ЯёЁ]+ [а-яА-ЯёЁ]+ ?[а-яА-ЯёЁ]+$/u", $name)){}
        else{ return 'NAME_ERROR';}

        if(!empty($gender) && preg_match("/^(Мужской|Женский|Не скажу)$/u", $gender)){}
        else{ return 'GENDER_ERROR';}
        
        if(!empty($birth_date) && preg_match("/[12][0-9][0-9][0-9]-[0-1][0-9]-[0-3][0-9]/u", $birth_date)){}
        else{ return 'BIRTH_ERROR';}
        
        if(!empty($region) && preg_match("/^([А-Яа-я\s]+)\s+(область|республика|край|автономный округ|город|республика)$/u", $region)){}
        else{ return 'REGION_ERROR';}

        if(!empty($phone_number) && preg_match("/^((\+7|7|8)+([0-9]){10})$/u", $phone_number)){}
        else{ return 'PHONE_ERROR';}

        if(!empty($VK_link) && preg_match("/^https:\/\/vk\.com\/\w{6,}$/u", $VK_link)){}
        else{ return 'VK_ERROR';}
        
        if(!empty($email) && preg_match("/\w+\.*\w+@\w+\.\w+/u", $email)){}
        else{ return 'EMAIL_ERROR';}
        
        if(!empty($password) && preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{6,}$/u", $password)){}
        else{ return 'PASSWORD_ERROR';}
        return 'FIELDS_OK';
     }

    public static function createUser($name, $gender, $birth_date, $region, $phone_number, $VK_link, $email, $password){
          if(self::checkFields($name, $gender, $birth_date, $region, $phone_number, $VK_link, $email, $password) === 'FIELDS_OK') {
              $query = "INSERT INTO users (email, password_hash, name, gender, birth_date, phone_number, VK_link, region) 
                      VALUES (:email, :password_hash, :name, :gender, :birth_date, :phone_number, :VK_link, :region)";

              $query = Config::prepare($query);

              $email = sanitizeHTML($email);
              $password_hash = password_hash(sanitizeHTML($password), PASSWORD_DEFAULT);
              $name = sanitizeHTML($name);
              $gender = sanitizeHTML($gender);
              $birth_date = sanitizeHTML($birth_date);
              $region = sanitizeHTML($region);
              $phone_number = sanitizeHTML($phone_number);
              $VK_link = sanitizeHTML($VK_link);

              $query->bindParam(":email", $email);
              $query->bindParam(":password_hash", $password_hash);
              $query->bindParam(":name", $name);
              $query->bindParam(":gender", $gender);
              $query->bindParam(":birth_date", $birth_date);
              $query->bindParam(":phone_number", $phone_number);
              $query->bindParam(":VK_link", $VK_link);
              $query->bindParam(":region", $region);

              if ($query->execute()) {
                  return 'SUCCESSFUL_SUGN_UP';
              }
              else {
                  return 'ERROR_SIGN_UP';
              }
          }
            else{
                return 'FIELD_' . self::checkFields($name, $gender, $birth_date, $region, $phone_number, $VK_link, $email, $password);
          }
     }

}

?>