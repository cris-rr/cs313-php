-- Insert data to users table
INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Cris', 'Ruiz', '2318', '982-999-154', 'cris@gmail.com', 'pass12345');

INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Adrian', 'Bernal', '1820', '444-555-234', 'abernal@gmail.com', 'pass98765');

INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Mark', 'Ramos', '1212', '444-555-154', 'mramos@gmail.com', 'pass23556');

INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Sussan', 'Smith', '3344', '555-999-221', 'ssmith@gmail.com', 'pass99432');




-- Insert data to buddies table
INSERT INTO buddyloan.buddies (userid, buddyid, date, balance)
VALUES (1,2,'2021-01-28',0);

INSERT INTO buddyloan.buddies (userid, buddyid, date, balance)
VALUES (1,3,'2021-02-06',0);

INSERT INTO buddyloan.buddies (userid, buddyid, date, balance)
VALUES (1,4,'2021-02-08',0);



-- Insert data to transactions table
INSERT INTO buddyloan.transactions (description, date, amount, image_path, userid, buddyid)
VALUES ('Pay a domain for adrian.com domain at Gooddady.com', '20201-01-28', 12, 'goddady_invoice.pdf',1,2);

INSERT INTO buddyloan.transactions (description, date, amount, image_path, userid, buddyid)
VALUES ('Buy article in amazon with gift card', '20201-02-02', 25, 'amazon_invoice.pdf',1,3);

INSERT INTO buddyloan.transactions (description, date, amount, image_path, userid, buddyid)
VALUES ('Pay netflix subscription with credit card', '20201-02-06', 20, 'nexflix_invoice.pdf',1,4);


-- Update balance in buddies table
UPDATE buddyloan.buddies SET balance = 12 WHERE userid = 1 and buddyid = 2;

UPDATE buddyloan.buddies SET balance = 25 WHERE userid = 1 and buddyid = 3;

UPDATE buddyloan.buddies SET balance = 20 WHERE userid = 1 and buddyid = 4;