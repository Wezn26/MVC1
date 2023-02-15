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
    
    /*
     * функция вставляет новую запись
     * */
    public function insert() 
    {
        if (!$this->isNew()) {
            return;
        }
        
        $this->title   = $title;
        $this->image   = $image;
        $this->content = $content;
        $this->author  = $author;
        $this->data    = $data;
        
        $sql = 'INSERT INTO ' . static::TABLE . '
                    (title, image, content, author, data)
                    VALUES
                    (:title, :image, :content, :author, :data)
               ';
        $data = [
            'title'   => $this->title,
            'image'   => $this->image,
            'content' => $this->content,
            'author'  => $this->author,
            'data'    => $this->data
        ];
        
        $db = Db::give();
        $result = $db->query($sql, $data);
        $this->id = $db->getLastId();
        
        if (!$result) {
            View::errorcode(1);
        }
    }
}

