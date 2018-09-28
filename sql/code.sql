--This file will hold all of the MySQL commands for the capstone project. 

--Basic commands (If Needed)
--drop table users;

CREATE DATABASE Capstone;

--ADDED 
CREATE TABLE users (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    street VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    state char(2) NOT NULL,
    zip INT NOT NULL,
    latitude DECIMAL(7, 5) NOT NULL,
    longitude DECIMAL(7, 5) NOT NULL, 
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL
);

--ADDED
CREATE TABLE charities (
    charity_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL, 
    street VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    state char(2) NOT NULL,
    zip INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    charityType_ID INT NOT NULL,
    latitude DECIMAL(7, 5) NOT NULL,
    longitude DECIMAL(7,5) NOT NULL,
    CONSTRAINT charitiesFKcharitytype
        FOREIGN KEY (charityType_ID) REFERENCES charityType(charityType_ID)
);

--ADDED
CREATE TABLE CharityType (
    charityType_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type_name VARCHAR(45) NOT NULL 
);


--added
CREATE TABLE items (
    item_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(255) NOT NULL,
    itemCategory_ID INT NOT NULL,
    user_id INT NOT NULL,
    CONSTRAINT itemsFKitemcategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories(itemCategory_ID),
    CONSTRAINT itemsFKuser_ID
        FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--ADDED 
CREATE TABLE itemCategories (
    itemCategory_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(45) NOT NULL
);

--Added
CREATE TABLE charityAndItemsTable (
    charityType_ID INT NOT NULL,
    itemCategory_ID INT NOT NULL,
    CONSTRAINT crossFKCharityType
        FOREIGN KEY (charityType_ID) REFERENCES CharityType(charityType_ID),
    CONSTRAINT crossFKitemCategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories(itemCategory_ID)
);

--Added 
CREATE TABLE charity_favorites (
    favorite_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    charity_id INT NOT NULL,
    favorite CHAR(1) NOT NULL,
    CONSTRAINT charity_favoritiesFKcharities
        FOREIGN KEY (charity_id) REFERENCES charities(charity_id)
);

--Works
-- SELECT u.latitude as "user_lat", u.longitude as "user_long", c.charity_id, i.item_name, ct.type_name, c.name, c.street, c.town, c.state, c.zip, c.latitude, c.longitude FROM items i
-- JOIN users u on u.user_id = i.user_id
-- JOIN itemCategories ic on ic.itemCategory_ID = i.itemCategory_ID
-- JOIN charityAndItemsTable cit on ic.itemCategory_ID = cit.itemCategory_ID
-- JOIN charities c on c.charityType_ID = cit.charityType_ID
-- JOIN CharityType ct on ct.charityType_ID = c.charityType_ID
-- WHERE i.user_id = 3
-- ORDER BY item_name;

INSERT INTO `itemCategories` (`itemCategory_ID`, `category_name`) VALUES
(1, 'Household'),
(2, 'Kids Toys'),
(3, 'Kids Clothes'),
(4, 'Books'),
(5, 'Small Appliance'),
(6, 'Womens Clothing'),
(7, 'Mens Clothing'),
(8, 'Womens Shoes'),
(9, 'Mens Shoes'),
(10, 'Pet Item'),
(11, 'Yard/Garden Item');

INSERT INTO `charities` (`charity_id`, `name`, `street`, `town`, `state`, `zip`, `password`, `charityType_ID`, `latitude`, `longitude`) VALUES
(1, 'Game Stop', '3385 Woodward Crossing Blvd', 'Buford', 'GA', 30519, '12', 2, '34.06940', '-83.98427'),
(4, 'The Church', '2228 Kilgore Road', 'Buford', 'GA', 30519, '12', 10, '34.08097', '-83.97317'),
(5, 'My House', '2460 Chandler Grove Drive', 'Buford', 'GA', 30519, '12', 4, '34.08977', '-83.96808');

INSERT INTO `charityAndItemsTable` (`charityType_ID`, `itemCategory_ID`) VALUES
(1, 2),
(4, 2),
(3, 2),
(1, 1),
(4, 1),
(9, 1),
(10, 1);

INSERT INTO `CharityType` (`charityType_ID`, `type_name`) VALUES
(1, 'Education'),
(2, 'Animals'),
(3, 'Arts/Culture'),
(4, 'Community Development'),
(5, 'Environment'),
(6, 'Health'),
(7, 'Human and Civil Rights'),
(8, 'Human Services'),
(9, 'International'),
(10, 'Religion'),
(11, 'Research / Public Policy');

INSERT INTO `items` (`item_ID`, `item_name`, `itemCategory_ID`, `user_id`) VALUES
(1, 'Toy Truck', 2, 2),
(2, 'It', 4, 2),
(3, 'Toy Truck', 2, 3),
(5, 'kitchenware ', 1, 3);

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `street`, `town`, `state`, `zip`, `latitude`, `longitude`, `username`, `password`) VALUES
(2, 'Gus', 'Cain', 'a1@yahoo.com', '2460 Chandler Grove Drive', 'Buford', 'GA', 30519, '34.08977', '-83.96808', 'Gus', '$2y$10$OmqRvT.zYoJykdDyih6Xs.D4YHGw8xRixcjorstjDr9qgVYkiW/O6'),
(3, 'Admin', 'Admin', 'a2@yahoo.com', '2460 Chandler Grove Drive', 'Buford', 'GA', 30519, '34.08977', '-83.96808', 'Admin', '$2y$10$5yKVeCrNBGlTQpOJijsHlu1jhKHapca3PAeDA6UpUJGkhueYOrQgW');
















































