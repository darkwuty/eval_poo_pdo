<?php
foreach ($restaurants as $restaurant) {
    echo "<h2>{$restaurant->name}</h2><p>{$restaurant->adress}, {$restaurant->city}</p>";
}