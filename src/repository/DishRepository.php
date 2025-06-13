<<<<<<< HEAD
<?php

namespace Src\Repository;

use Src\Entity\Dish;
use PDO;

class DishRepository
{
    /**
     * @return Dish[]
     */
    public function findAll(): array
    {
        $connection = Database::connect();
        $list = [];
        $query = $connection->prepare("SELECT d.*, r.restaurant_name FROM dish d LEFT JOIN restaurant r ON d.restaurant_id = r.restaurant_id");
        $query->execute();

        while ($line = $query->fetch()) {
            $dish = new Dish();
            $dish->id = $line['dish_id'];
            $dish->name = $line['dish_name'];
            $dish->specifications = $line['dish_specifications'];
            $dish->price = $line['dish_price'];
            $dish->restaurant_id = $line['restaurant_id'];
            $list[] = $dish;
        }

        return $list;
    }

    public function findById(int $id): ?Dish
    {
        $connection = Database::connect();
        $query = $connection->prepare("SELECT * FROM dish WHERE dish_id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        if ($line = $query->fetch()) {
            $dish = new Dish();
            $dish->id = $line['dish_id'];
            $dish->name = $line['dish_name'];
            $dish->specifications = $line['dish_specifications'];
            $dish->price = $line['dish_price'];
            $dish->restaurant_id = $line['restaurant_id'];
            return $dish;
        }

        return null;
    }

    public function persist(Dish $dish)
    {
        $connection = Database::connect();
        $query = $connection->prepare("INSERT INTO dish (dish_name, dish_specifications, dish_price, restaurant_id) VALUES (:name, :specs, :price, :restoId)");
        $query->bindValue(":name", $dish->name);
        $query->bindValue(":specs", $dish->specifications);
        $query->bindValue(":price", $dish->price);
        $query->bindValue(":restoId", $dish->restaurant_id);
        $query->execute();

        $dish->id = $connection->lastInsertId();
    }

    public function delete(int $id): bool
    {
        $connection = Database::connect();
        $query = $connection->prepare("DELETE FROM dish WHERE dish_id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        return $query->rowCount() > 0;
    }
=======
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
>>>>>>> 2623f4083a72d1e6516e0b0a6e2c65d325f33646
}