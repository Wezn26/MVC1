<?php
namespace App\Models;

class Article extends Model
{
    public $title;
    public $image;
    public $path;
    public $content;
    public $author;
    public $date;
    
    /*
     * Функция возвращает $num последних записей из таблицы
     * @param $num $integer
     * @return array
     * */
    public static function findLastArticle(int $num) : array 
    {
        return array_reverse(array_slice(static::findAll(), -$num));
    }
    
    public static function getAllImages() : array
    {
        return static::findAll();
    }
    
    public function send($nameImg, $file) 
    {
        ;
    }
    
}

