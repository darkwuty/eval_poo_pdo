<?php
foreach ($dishes as $dish) {
    echo "<h3>{$dish->name}</h3><p>{$dish->specifications}</p><strong>Prix: {$dish->price}€</strong>";
}