create database eWholeFoods;

create table user (
	userID int NOT NULL AUTO_INCREMENT,
	username varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	first_name varchar(100) NOT NULL,
	last_name varchar(100) NOT NULL,
	admin bit NOT NULL
);

create table products (
	productID int NOT NULL AUTO_INCREMENT,
	item_name varchar(100) NOT NULL,
	current_stock_quantity int NOT NULL,
	price float(24) NOT NULL,
	nutrition_facts varchar(1000) NOT NULL,
	product_type varchar(100) NOT NULL
);

