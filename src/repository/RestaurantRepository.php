<<<<<<< HEAD
<?php

namespace Src\Repository;

use Src\Entity\Restaurant;
use PDO;

class RestaurantRepository
{
    /**
     * @return Restaurant[]
     */
    public function findAll(): array
    {
        $connection = Database::connect();
        $list = [];
        $query = $connection->prepare("SELECT * FROM restaurant");
        $query->execute();

        while ($line = $query->fetch()) {
            $restaurant = new Restaurant();
            $restaurant->id = $line['restaurant_id'];
            $restaurant->name = $line['restaurant_name'];
            $restaurant->adress = $line['restaurant_adress'];
            $restaurant->city = $line['restaurant_city'];
            $restaurant->phone = $line['restaurant_phone'];
            $restaurant->email = $line['restaurant_email'];
            $list[] = $restaurant;
        }

        return $list;
    }

    public function findById(int $id): ?Restaurant
    {
        $connection = Database::connect();
        $query = $connection->prepare("SELECT * FROM restaurant WHERE restaurant_id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        if ($line = $query->fetch()) {
            $restaurant = new Restaurant();
            $restaurant->id = $line['restaurant_id'];
            $restaurant->name = $line['restaurant_name'];
            $restaurant->adress = $line['restaurant_adress'];
            $restaurant->city = $line['restaurant_city'];
            $restaurant->phone = $line['restaurant_phone'];
            $restaurant->email = $line['restaurant_email'];
            return $restaurant;
        }

        return null;
    }

    public function persist(Restaurant $restaurant)
    {
        $connection = Database::connect();

        $query = $connection->prepare(
            "INSERT INTO restaurant (restaurant_name, restaurant_adress, restaurant_city, restaurant_phone, restaurant_email)
             VALUES (:name, :adress, :city, :phone, :email)"
        );

        $query->bindValue(":name", $restaurant->name);
        $query->bindValue(":adress", $restaurant->adress);
        $query->bindValue(":city", $restaurant->city);
        $query->bindValue(":phone", $restaurant->phone);
        $query->bindValue(":email", $restaurant->email);
        $query->execute();

        $restaurant->id = $connection->lastInsertId();
    }

    public function delete(int $id): bool
    {
        $connection = Database::connect();
        $query = $connection->prepare("DELETE FROM restaurant WHERE restaurant_id = :id");
        $query->bindValue(":id", $id);
        $query->execute();

        return $query->rowCount() > 0;
    }
=======
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
>>>>>>> 2623f4083a72d1e6516e0b0a6e2c65d325f33646
}