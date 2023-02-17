<?php
namespace App\Models;

use App\View\View;
use App\Resources\Db;

class Admin extends Model
{
    protected const TABLE = 'admin';
    public $login;
    public $password;
    
    /*
     * Function check insert login and password for administration
     * */
    public static function isAdmin($post) 
    {        
        if (empty($post['login']) || empty($post['password'])) {
            View::errorcode(4);
        };
        
        $login = static::cleanData($post['login']);
        $adminpass = trim($post['password']);
        
        $db = Db::give();
        $sql = 'SELECT password FROM ' . static::TABLE . ' WHERE login=:login';
        $data = [':login' => $login];
        $result = $db->getDataInArray($sql, $data);  
        if (!$result) {
            return false;
        }
        $password = $result[0]['password'];      
        
        if (!password_verify($adminpass, $password)) {
            return false;
        } else {
            return true;
        }
        
    }
}

