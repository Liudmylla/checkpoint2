<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */
namespace App\Model;
use DateTime;


use App\Model\Connection;
/**
 * Class CupcakeManager
 * @package Model
 */
class CupcakeManager extends AbstractManager
{

    /**
     *
     */
    const TABLE = 'cupcake';


    /**
     * CupcakeManager constructor.
     * @param \PDO $pdo
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
  
    public function insert(array $cupcake): int
    {
        $currentDate = new DateTime('now');
        $formatDate = $currentDate->format('Y-m-d');
        
        $statement = $this->pdo->prepare("INSERT INTO " . $this->table .
        " (`name`,`color1`,`color2` ,`color3` ,`accessory_id` ,`created_at`  ) 
        VALUES (:name,:color1,:color2,:color3,:accessory_id,:created_at)");

        $statement->bindValue('name', $cupcake['name'], \PDO::PARAM_STR);
        $statement->bindValue('color1', $cupcake['color1'], \PDO::PARAM_STR);
        $statement->bindValue('color2', $cupcake['color2'], \PDO::PARAM_STR);
        $statement->bindValue('color3', $cupcake['color3'], \PDO::PARAM_STR);
        $statement->bindValue('accessory_id', $cupcake['accessory'], \PDO::PARAM_INT);
        $statement->bindValue('created_at', $formatDate, \PDO::PARAM_STR);
      
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    public function selectOneCupcakeById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM cupcake AS c JOIN accessory AS a ON c.accessory_id=a.id WHERE c.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}


