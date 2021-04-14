<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */
namespace App\Model;

use App\Model\Connection;

/**
 * Class AccessoryManager
 * @package Model
 */
class AccessoryManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'accessory';


    /**
     * AccessoryManager constructor.
     * @param \PDO $pdo
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function insert(array $accessory): int
    {
        //to modify
        $statement = $this->pdo->prepare("INSERT INTO " . $this->table .
        " (`name`,`url` ) 
        VALUES (:name,:url)");
        $statement->bindValue('name', $accessory['name'], \PDO::PARAM_STR);
        $statement->bindValue('url', $accessory['url'], \PDO::PARAM_STR);
    
     
      
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
  
}


