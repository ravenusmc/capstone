--This file will hold all of the MySQL commands for the capstone project. 

--Basic commands (If Needed)
drop table users;

CREATE TABLE users (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    street VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    state char(2) NOT NULL,
    zip INT NOT NULL,
    email VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE charities (
    charity_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL, 
    street VARCHAR(30) NOT NULL,
    town VARCHAR(30) NOT NULL,
    state char(2) NOT NULL,
    zip INT NOT NULL,
    password VARCHAR(255) NOT NULL,
    charityType_ID INT NOT NULL, 
    CONSTRAINT charitiesFKcharitytype
        FOREIGN KEY (charityType_ID) REFERENCES charityType(charityType_ID)
);

CREATE TABLE CharityType (
    charityType_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Donations (
    donation_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    items VARCHAR(255) NOT NULL,
    itemCategory_ID INT NOT NULL,
    CONSTRAINT donationsFKitemcategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories(itemCategory_ID)
);

CREATE TABLE itemCategories (
    itemCategory_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
);
















































