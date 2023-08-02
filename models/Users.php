<?php

namespace Model;

include '../includes/app.php';

class Users extends Config {

    public static function hashPass($pass) {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public static function userExist($email) {

        $query = "SELECT * from users WHERE email = '$email' LIMIT 1";
        $data = self::queryDB($query);
        
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
        $data = self::queryDB($query);

        return $data;
    }

    public static function getAll() {

        $query = "SELECT * FROM users";
        $data = self::queryDB($query);

        return $data;
    }

    public static function isAdmin($email) {
        $user = self::get($email);
        if($user['admin'] == 1) {
            return true;
        } else {
            return false;
        }
    }
}


?>