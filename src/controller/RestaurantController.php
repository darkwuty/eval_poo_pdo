<?php
namespace Src\Controller;

use Src\Repository\RestaurantRepository;

class RestaurantController {
    public function index() {
        $restaurants = (new RestaurantRepository())->findAll();
        include __DIR__ . '/../View/restaurants.php';
    }
}