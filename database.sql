-- Active: 1748246073884@@127.0.0.1@3306@blog
DROP TABLE IF EXISTS restaurant;
DROP TABLE IF EXISTS dish;

CREATE TABLE restaurant (
    restaurant_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    restaurant_name VARCHAR(80) NOT NULL,
    restaurant_adress VARCHAR(80) NOT NULL,
    restaurant_city VARCHAR(20) NOT NULL,
    restaurant_phone INTEGER NOT NULL,
    restaurant_email VARCHAR(80) NOT NULL
);

CREATE TABLE dish (
    dish_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    dish_name VARCHAR(80) NOT NULL,
    dish_specifications VARCHAR(255),
    dish_price INTEGER NOT NULL,
    restaurant_id INTEGER NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES restaurant(restaurant_id)
);
