<?php
namespace App\Models;

use App\View\View;
use App\Resources\Db;

class Article extends Model
{
    protected const TABLE = 'news';
    public $title;
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
   
    
    public function send($file)
    {
        
        $file = $_POST['file'];
        
        if (empty($file)) {
            return;
        }        
        
        $res = $this->fileUpload('file');
        
        if (false != $res) {
            $this->path = (string)$res;
        } else {
            View::errorcode(6);
        }         
        
        $sql = 'INSERT INTO ' . static::TABLE . '
                (path)
                VALUES
                (:path)
                ';
        $data = [ ':path' => $this->path ];
        
        $db = Db::give();
        $db->query($sql, $data);
        
    }  
    
    
    
}

