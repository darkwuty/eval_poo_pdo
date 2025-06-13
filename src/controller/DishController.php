<?php
namespace Src\Controller;

use Src\Repository\DishRepository;

class DishController {
    public function index() {
        $dishes = (new DishRepository())->findAll();
        include __DIR__ . '/../View/dishes.php';
    }
}