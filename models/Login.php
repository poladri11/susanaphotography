<?php

namespace Model;

include '../includes/app.php';

class Login extends Config {

    public static function hashPass($pass) {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public static function userExist($email) {

        $query = "SELECT * from users WHERE email = '$email' LIMIT 1";
        $response = self::$db->prepare($query);
        $response->execute();
        $data = $response->fetch(self::$db::FETCH_ASSOC);
        if(isset($data['email'])) {
            return true;
        } else { return false; }
    }

    public static function passVerify($pass, $email) {
        $user = self::get($email);
        return password_verify($pass, $user['password']);
    }

    public static function get($email) {

        $query = "SELECT * FROM users WHERE email = '$email'";
        $response = self::$db->prepare($query);
        $response->execute();
        $data = $response->fetch(self::$db::FETCH_ASSOC);

        return $data;
    }

    public static function isAdmin($email) {
        $user = self::get($email);
        if($user['admin'] === 1) {
            return true;
        } else {
            return false;
        }
    }
}


?>