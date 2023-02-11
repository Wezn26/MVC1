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
}

