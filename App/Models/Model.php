<?php

namespace App\Models;

use App\Resources\Db;
use App\View\View;

abstract class Model
{
    protected const TABLE = '';
    public $id;
    
    /*
     * Функция findAll() возвращает все записи из таблицы
     * return @array
     * */
    public static function findAll() : array
    {
        $db = Db::give();        
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->getDataInArray($sql, []);
    }
    
    /*
     * Функция findById($id) возвращает одну запись из таблицы с заданным id
     * @param $id integer
     * @return bool | object
     * */
    public static function findById($id)
    {
        $db = Db::give();       
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = [':id' => $id];
        $value = $db->getDataInArray($sql, $data);
        return $value ? $value[0] : null;
    }
    
    /*
     * Функция проверяет есть ли значение в переменной $id
     * return @bool
     * */
    public function isNew(): bool
    {
        return empty($this->id);
    }
    
    /*
     * функция вставляет новую запись
     * */
    public function insert() 
    {
        if (!$this->isNew()) {
            return;
        }
        
        $columns = [];
        $values = [];
        
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            
            $columns[] = $key;
            $values[':' . $key] = $value;
        }
        
        $sql = 'INSERT INTO ' . static::TABLE . '
            (' . implode(',', $columns) . ')
            VALUES
            (' . implode(',', array_keys($values)) . ')
         ';
        
       
       $db = Db::give();
       $result = $db->query($sql, $values);
       
       if (!$result) {
           View::errorcode(1);
       }
    }
}

