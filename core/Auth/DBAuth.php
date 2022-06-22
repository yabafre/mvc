<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $email
     * @param $password
     * @return boolean
     */
    public function login($email, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE email = ?', [$email], null, true);
        var_dump(password_hash($password, PASSWORD_DEFAULT));
        if($user){
          //  if($user->password === password_hash($password, PASSWORD_DEFAULT)){
            if(password_verify($password,$user->password )){
                $_SESSION['auth'] = $user->id;
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }

}