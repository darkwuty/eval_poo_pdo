<?php
namespace Src\Repository;

use Src\Entity\Restaurant;
use PDO;

class RestaurantRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('sqlite:../database.sql');
    }

    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM restaurant");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Restaurant::class);
    }
}