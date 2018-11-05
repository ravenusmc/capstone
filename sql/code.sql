-- This file will hold all of the MySQL commands for the capstone project. 

-- Basic commands (If Needed)
-- drop table users;

DROP DATABASE IF EXISTS capstone;
CREATE DATABASE capstone;
USE capstone;

-- ADDED 
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

-- ADDED
CREATE TABLE CharityType (
    charityType_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type_name VARCHAR(45) NOT NULL 
);

-- ADDED
CREATE TABLE charities (
  charity_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  street VARCHAR(255) NOT NULL,
  town VARCHAR(100) NOT NULL,
  state CHAR(2) NOT NULL,
  zip INT(11) NOT NULL,
  password VARCHAR(255) NOT NULL,
  charityType_ID INT(11) NOT NULL
                    REFERENCES charityType (charityType_ID),
  latitude DECIMAL(7,5) NOT NULL,
  longitude DECIMAL(7,5) NOT NULL,
  url VARCHAR(255) NOT NULL
); 

-- ADDED 
CREATE TABLE itemCategories (
    itemCategory_ID INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(45) NOT NULL
);

-- added
CREATE TABLE items (
    item_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(255) NOT NULL,
    itemCategory_ID INT NOT NULL,
    user_id INT NOT NULL,
    CONSTRAINT itemsFKitemcategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories (itemCategory_ID),
    CONSTRAINT itemsFKuser_ID
        FOREIGN KEY (user_id) REFERENCES users (user_id)
);



-- Added
CREATE TABLE charityAndItemsTable (
    charityType_ID INT NOT NULL,
    itemCategory_ID INT NOT NULL,
    CONSTRAINT crossFKCharityType
        FOREIGN KEY (charityType_ID) REFERENCES CharityType (charityType_ID),
    CONSTRAINT crossFKitemCategories
        FOREIGN KEY (itemCategory_ID) REFERENCES itemCategories (itemCategory_ID)
);

-- Added 
CREATE TABLE charity_favorites (
    favorite_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    charity_id INT NOT NULL,
    favorite CHAR(1) NOT NULL,
    user_id INT NOT NULL, 
    CONSTRAINT charity_favoritiesFKcharities
        FOREIGN KEY (charity_id) REFERENCES charities(charity_id),
    CONSTRAINT charity_favoritiesFKuser_ID
        FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE donations (
    donation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    items_list VARCHAR(255) NOT NULL,
    charity_id INT NOT NULL,
    created DATETIME NOT NULL,
    CONSTRAINT donationsFKuser_ID
        FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT donationsFKcharities
        FOREIGN KEY (charity_id) REFERENCES charities(charity_id)
);

INSERT INTO itemCategories (itemCategory_ID, category_name) VALUES
(1, "Household Items"),
(2, "Kids' Toys"),
(3, "Kids' Clothing"),
(4, "Books"),
(5, "Small Appliances"),
(6, "Women's Clothing"),
(7, "Men's Clothing"),
(8, "Women's Shoes"),
(9, "Men's Shoes"),
(10, "Pet Items"),
(11, "Yard/Garden Items");

INSERT INTO charities (name, street, town, state, zip, password, charityType_ID, latitude, longitude, url) VALUES
('Cross Pointe Sugarloaf', '1800 Satellite Boulevard', 'Duluth', 'GA', 30097, 'test', 10, '33.99509', '-84.08346', 'http://www.crosspointechurch.com/'),
('Habitat Restore Lawrenceville', '2100 Riverside Parkway Suite 123-A', 'Lawrenceville', 'GA', 30043, 'test', 4, '40.79128', '-96.63399', 'http://suburbanatlantarestores.org/'),
('Animal Welfare and Enforcement', '884 Winder Highway', 'Lawrenceville', 'GA', 30046, 'test', 2, '33.96894', '-83.95598', 'https://www.gwinnettcounty.com/web/gwinnett/departments/communityservices/animalwelfareenforcement'),
('Project Safe', 'PO Box 7532', 'Athens', 'GA', 30604, 'test', 8, '33.94611', '-83.40907', 'http://www.project-safe.org/'),
('StreetWise', '1770 Cedars Road', 'Lawrenceville', 'GA', 30045, 'test', 8, '33.98082', '-83.94922', 'https://www.streetwisegeorgia.org/'),
('Athens Area Homeless Shelter', '620 Barber Street', 'Athens', 'GA', 30601, 'test', 8, '33.96858', '-83.38631', 'https://www.helpathenshomeless.org/'),
('The Quinn House', '120 South Perry Street', 'Lawrenceville', 'GA', 30046, 'test', 8, '33.95571', '-83.98985', 'http://www.thequinnhouse.com/'),
('Lawrenceville Co-Op Ministries', '52 Gwinnett Drive, Suite C', 'Lawrenceville', 'GA', 30046, 'test', 8, '33.94942', '-83.97373', 'http://www.lawrencevilleco-op.org/'),
('Family Promise Gwinnett', '3495-B Sugarloaf Parkway', 'Lawrenceville', 'GA', 30044, 'test', 8, '33.92653', '-84.01779', 'http://familypromisegwinnett.org/'),
('Goodwill of Lawrenceville', '251 Scenic Hwy N', 'Lawrenceville', 'GA', 30046, 'test', 8, '33.95668', '-83.97955', 'https://goodwillng.org/locations/lawrenceville-store-donation-center-30045/'),
('Gwinnett Childrens Shelter', '3850 Tuggle Rd NE', 'Buford', 'GA', 30519, 'test', 8, '34.10059', '-83.91588', 'https://homeofhopegcs.org/');

INSERT INTO charityAndItemsTable (charityType_ID, itemCategory_ID) VALUES
(1, 2),
(4, 2),
(3, 2),
(1, 1),
(4, 1),
(9, 1),
(10, 1);

INSERT INTO CharityType (charityType_ID, type_name) VALUES
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

INSERT INTO items (item_ID, item_name, itemCategory_ID, user_id) VALUES
(1, 'Toy Truck', 2, 2),
(2, 'It', 4, 2),
(3, 'Toy Truck', 2, 3),
(5, 'kitchenware', 1, 3);

INSERT INTO users (user_id, firstname, lastname, email, street, town, state, zip, latitude, longitude, username, password) VALUES
(2, 'Gus', 'Cain', 'a1@yahoo.com', '2460 Chandler Grove Drive', 'Buford', 'GA', 30519, '34.08977', '-83.96808', 'Gus', '$2y$10$OmqRvT.zYoJykdDyih6Xs.D4YHGw8xRixcjorstjDr9qgVYkiW/O6'),
(3, 'Admin', 'Admin', 'a2@yahoo.com', '2460 Chandler Grove Drive', 'Buford', 'GA', 30519, '34.08977', '-83.96808', 'Admin', '$2y$10$5yKVeCrNBGlTQpOJijsHlu1jhKHapca3PAeDA6UpUJGkhueYOrQgW');
















































