<?php

namespace App\Models;

use App\Resources\Db;

abstract class Model
{
    protected const TABLE = '';
    public $id;
    
    /*
     * Функция findAll() возвращает все записи из таблицы
     * return @array
     * */
    public static function findAll($param) : array
    {
        $db = Db::give();
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->getDataInClasses($class, $sql, []);
    }
    
    /*
     * Функция findById($id) возвращает одну запись из таблицы с заданным id
     * @param $id integer
     * @return bool | object
     * */
    public static function findById($id)
    {
        $db = Db::give();
        $class = static::class;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = ['id' => $id];
        $value = $db->getDataInClasses($class, $sql, $data);
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
}

