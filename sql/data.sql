--This file will keep SQL test data 

INSERT INTO charities 
  (name, street, town, state, zip, password, charityType_ID, latitude, longitude)
VALUES 
  ('Test Place', '3333 Buford Dr', 'Buford', 'GA', 30519, 'test', 1, 2, 3);

INSERT INTO CharityType 
  (type_name)
VALUES 
  ('Education');