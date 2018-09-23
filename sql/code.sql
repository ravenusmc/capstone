--This file will hold all of the MySQL commands for the capstone project. 

--Basic commands (If Needed)
drop table users;

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

CREATE TABLE charityAndItemsTable (
    charityType_ID INT NOT NULL,
    itemCategory_ID INT NOT NULL,
    CONSTRAINT crossFKCharityType
        FOREIGN KEY (charityType_ID) REFERENCES CharityType(charityType_ID),
    CONSTRAINT crossFKitemCategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories(itemCategory_ID)
);
















































