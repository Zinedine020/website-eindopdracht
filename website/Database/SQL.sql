DROP DATABASE MU;
CREATE DATABASE MU;
USE MU;

CREATE TABLE User
(
	user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_type ENUM("consument", "admin")
);
INSERT INTO User
VALUE
(NULL, "Mustapha", "$2y$10$dAL64dUXD2YRBue/dkUpz.9wriTQPaWVJkrstkSBdzUEhSfH.NT0S", "Mustapha@gmail.com", "admin");
select * from User;
ALTER TABLE User ADD user_img varchar(255);

CREATE TABLE Orders
(
	order_id INT PRIMARY KEY AUTO_INCREMENT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    user_adres VARCHAR(255) NOT NULL,
    user_postcode VARCHAR(255) NOT NULL,
    user_city VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (product_id) REFERENCES Producten(product_id)
);

CREATE TABLE ShoppingCart
(
	cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (product_id) REFERENCES Producten(product_id)
);
select * from ShoppingCart;

CREATE TABLE Categories
(
	categories_id INT PRIMARY KEY AUTO_INCREMENT,
    categories_name VARCHAR(255) NOT NULL
);
INSERT INTO Categories
VALUE 
(NULL, "Audi");
INSERT INTO Categories
value
(NULL, "Golf");
select * from categories;

CREATE TABLE Producten
(
	product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    price_product DECIMAL(10.2) NOT NULL,
    product_description TEXT,
    product_img VARCHAR(255) NOT NULL,
    rent_buy enum("rent", "buy"),
    categories INT,
    FOREIGN KEY (categories) REFERENCES Categories(categories_id)
);

INSERT INTO Producten
VALUE 
(NULL, "Audi TT", 66816, 
"A used TT Mk1 is now somewhat of a modern classic – 
a sports car built by Audi to capture the essence of 
fun German cars from the '50s and '60s (taking its naming 
convention after the Prinz TT from German manufacturer NSU) and is 
now itself a significant piece of automotive history.",
"audi.png", "buy", 1);

INSERT INTO Producten
VALUE
(NULL, "Golf 8 GTI", 350, 
"Het rebelse broertje van de Golf 
is terug van weggeweest en klaar om 
met jou de weg op te gaan. Met 245 pk meer vermogen dan ooit en 
uitgerust met alles waar je GTI-hart sneller van gaat kloppen. Neem plaats in de 
typische geruite sportstoelen en hou je vooral niet in.",
"golf_8_gti.png", "rent", 2);
