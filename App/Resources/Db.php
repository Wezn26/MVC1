<?php
namespace App\Resources;

use App\Traits\Singleton;
use PDO;

class Db
{
    use Singleton;
    private $dbh;

    public function __construct()
    {
        require __DIR__ . '/config.php';
        $this->dbh = new PDO(DSN);
    }
    
    public function query(string $sql, array $data = []) 
    {
        $stmt = $this->dbh->prepare($sql);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    
    public function getDataInArray(string $sql, array $data = []) 
    {
        $result = $this->query($sql, $data);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getQuery($sql, $data = []) 
    {
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute($data);
    }
    
    public function getLastId() 
    {
        return $this->dbh->lastInsertId();
    }
}

