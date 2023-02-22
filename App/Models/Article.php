<?php
namespace App\Models;

use App\View\View;
use App\Resources\Db;

class Article extends Model
{
    protected const TABLE = 'news';
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
   
    
    public function send($name, $file)
    {
        $name = $_POST['name'];
        $file = $_POST['file'];
        
        if (empty($name) && empty($file)) {
            return;
        }
        
        $this->name = strip_tags($name);
        $res = $this->fileUpload('file');
        
        if (false != $res) {
            $this->path = (string)$res;
        } else {
            View::errorcode(6);
        }       
        
        
        $sql = 'INSERT INTO ' . static::TABLE . '
                (image, path)
                VALUES
                (:image, :path)
                ';
        $data = [
            ':image' => $this->image,
            ':path' => $this->path
        ];
        
        $db = Db::give();
        $db->query($sql, $data);
        
    }  
    
    
    
}

