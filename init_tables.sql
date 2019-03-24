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
	price float(25) NOT NULL,
	nutrition_facts varchar(1000) NOT NULL,
	product_type varchar(100) NOT NULL
);

create table shopping_cart (
	shopping_cartID int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL
);

create table cartItem (
	cartID int NOT NULL AUTO_INCREMENT,
	productID int NOT NULL,
	quantity int NOT NULL,
	shopping_cartID int NOT NULL
);

create table order (
	orderID int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	shopping_cartID int NOT NULL,
	addressID int NOT NULL,
	total float(50) NOT NULL,
	order_date datetime NOT NULL
);

create table address (
	addressID int NOT NULL AUTO_INCREMENT,
	userID int NOT NULL,
	street varchar(100) NOT NULL,
	city varchar(100) NOT NULL,
	state varchar(2) NOT NULL,
	zip int NOT NULL
)