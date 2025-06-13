<?php
namespace Src;

use Src\Controller\RestaurantController;
use Src\Controller\DishController;

class Routes {
    public static function handle($route) {
        switch ($route) {
            case '/restaurants':
                (new RestaurantController())->index();
                break;
            case '/dishes':
                (new DishController())->index();
                break;
            default:
                echo "Page non trouvée.";
                break;
        }
    }
}