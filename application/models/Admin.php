<?php

namespace application\models;

use application\core\Model;
use Imagick;

class Admin extends Model {

	public $error;

	public function loginValidate($post) {
	    $sql = "SELECT * FROM users WHERE login = :login AND password = :pass";
        $statement = $this->db->row($sql, ['login' => trim($post['login']), 'pass' => md5(trim($post['password']))]);
	    if(count($statement)){
	        return true;
        }

        $_SESSION['error'] = 'Логин или пароль указан неверно';
        return false;
	}

}