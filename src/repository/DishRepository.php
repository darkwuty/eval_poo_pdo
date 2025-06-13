<?php
namespace Src\Repository;

use Src\Entity\Dish;
use PDO;

class DishRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('sqlite:../database.sql');
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM dish");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Dish::class);
    }
}