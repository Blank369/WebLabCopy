<?php
class UserLogin{

    public static function GetUser($email)
    {
        $login = sanitizeHTML($email);

        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $query = Config::prepare($query);
        $query->bindParam(":email", $login);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if(empty($user)){
            return null;
        }
        return $user;
    }

    public static function Auth($email, $password) : string {
        if (isset($email) && isset($password)) {
            $user = self::GetUser($email);
            if(null === $user){
                return 'USER_NOT_FOUND';
            }
            $login = $user['email'];
            $password_hash = $user['password_hash'];
            $password = sanitizeHTML($password);

            if (password_verify($password, $password_hash)) {
                $_SESSION['auth'] = true;
                $_SESSION['login'] = sanitizeHTML($user['name']);

                return 'SUCCESSFUL_LOGIN';
            } else {
                return 'INVALID_PASSWORD_OR_LOGIN';
            }
        }
        else {
            return 'EMPTY_LOGIN_OR_PASSWORD';
        }
    }
}

?>