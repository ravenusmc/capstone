--This file will keep SQL test data 

INSERT INTO charities 
  (name, street, town, state, zip, password, charityType_ID, latitude, longitude)
VALUES 
  ('Test Place', '3333 Buford Dr', 'Buford', 'GA', 30519, 'test', 1, 2, 3);

INSERT INTO CharityType 
  (type_name)
VALUES 
  ('Education');

INSERT INTO itemCategories
  (category_name)
VALUES 
  ('Yard/Garden Item');

--Item Categories that were inserted into the itemcategories table 
Household 
Kids Toys
kids clothes
books
small appliance
women's clothing 
men's clothing
women shoes
men's shoes 
Pet item 
yard/garden item'


INSERT INTO CharityType
  (type_name)
VALUES 
  ('Research / Public Policy');

1. Education --Household
2. Animals      
3. arts/culture  
4. community development --Household
5. Environment 
6. Health
7. Human and Civil Rights
8. Human Services 
9.  International --Household
10. Religion  --Household
11. Research / Public Policy


--Silverware 
INSERT INTO charityAndItemsTable
  (charityType_ID, itemCategory_ID)
VALUES (10, 1)