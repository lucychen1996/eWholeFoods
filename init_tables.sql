
create database eWholeFoods;

use eWholeFoods;

create table user (
	userID int NOT NULL AUTO_INCREMENT Primary Key,
	_username varchar(100) NOT NULL,
	_password varchar(100) NOT NULL,
	email varchar(100) NOT NULL,
	first_name varchar(100) NOT NULL,
	last_name varchar(100) NOT NULL,
	is_admin bit NOT NULL
);

create table products (
	productID int NOT NULL AUTO_INCREMENT Primary Key,
	item_name varchar(100) NOT NULL,
	current_stock_quantity int NOT NULL,
	price float(25) NOT NULL,
	nutrition_facts varchar(1000) NOT NULL,
	item varchar(100) NOT NULL,
	category varchar(100) NOT NULL,
	image varchar(100) NOT NULL
);

create table shopping_cart (
	shopping_cartID int NOT NULL AUTO_INCREMENT Primary Key,
	userID int NOT NULL,
	FOREIGN KEY (userID) REFERENCES user(userID) ON UPDATE CASCADE ON DELETE CASCADE 
);

create table cartItem (
	cartID int NOT NULL AUTO_INCREMENT Primary Key,
	productID int NOT NULL,
	quantity int NOT NULL,
	shopping_cartID int NOT NULL,
	FOREIGN KEY (productID) REFERENCES products(productID)  ON UPDATE CASCADE ON DELETE CASCADE, 
	FOREIGN KEY (shopping_cartID) REFERENCES shopping_cart(shopping_cartID)  ON UPDATE CASCADE ON DELETE CASCADE
);

create table addresses (
	addressID int NOT NULL AUTO_INCREMENT Primary Key,
	userID int NOT NULL,
	street varchar(100) NOT NULL,
	city varchar(100) NOT NULL,
	state varchar(2) NOT NULL,
	zip int NOT NULL,
	FOREIGN KEY (userID) REFERENCES user(userID)  ON UPDATE CASCADE ON DELETE CASCADE
);

create table transactions (
	transationID int NOT NULL AUTO_INCREMENT Primary Key,
	userID int NOT NULL,
	shopping_cartID int NOT NULL,
	addressID int NOT NULL,
	total float(50) NOT NULL,
	order_date datetime NOT NULL,
	FOREIGN KEY (userID) REFERENCES user(userID) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (shopping_cartID) REFERENCES shopping_cart(shopping_cartID)  ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (addressID) REFERENCES addresses(addressID)  ON UPDATE CASCADE ON DELETE CASCADE 
);
create table orderHistory (
	orderID int NOT NULL AUTO_INCREMENT Primary key,
	
)
