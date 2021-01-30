-- Create database
-- CREATE DATABASE buddyloan;
-- Using a schema because we can only have 1 database on Heroku.
CREATE SCHEMA buddyloan;

-- Users Table
CREATE TABLE buddyloan.users (
  userid SERIAL NOT NULL PRIMARY KEY,
  firstname VARCHAR(100) NOT NULL,
  lastname VARCHAR(100) NOT NULL,
  pin SMALLINT NOT NULL,
  phone VARCHAR(15) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
);

-- Buddies Table
CREATE TABLE buddyloan.buddies (
  id SERIAL NOT NULL PRIMARY KEY,
  userid INT NOT NULL REFERENCES buddyloan.users(userid),
  buddyid INT NOT NULL REFERENCES buddyloan.users(userid),
  date DATE NOT NULL DEFAULT CURRENT_DATE,
  balance NUMERIC(10,2)
);

--Transactions Table
CREATE TABLE buddyloan.transactions (
  transactionid SERIAL NOT NULL PRIMARY KEY,
  description VARCHAR(255) NOT NULL,
  date DATE NOT NULL DEFAULT CURRENT_DATE,
  amount NUMERIC(10,2),
  image_path VARCHAR(255),
  userid INT NOT NULL REFERENCES buddyloan.users(userid),
  buddyid INT NOT NULL REFERENCES buddyloan.users(userid)
);

-- check tables and constraints
-- \d+ buddyloan.

-- Insert data to users table
INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Cris', 'Ruiz', '2318', '982-999-154', 'cris@gmail.com', 'pass12345');

INSERT INTO buddyloan.users (firstname, lastname, pin, phone, email, password)
VALUES ('Adrian', 'Bernal', '1820', '444-555-234', 'abernal@gmail.com', 'pass98765');

-- Insert data to buddies table
INSERT INTO buddyloan.buddies (userid, buddyid, date, balance)
VALUES (1,2,'2021-01-28',0);

-- Insert data to transactions table
INSERT INTO buddyloan.transactions (description, date, amount, image_path, userid, buddyid)
VALUES ('Pay a domain for adrian.com domain at Gooddady.com', '20201-01-28', 12, 'goddady_invoice.pdf',1,2);

-- Update balance in buddies table
UPDATE buddyloan.buddies SET balance = 12 WHERE userid = 1 and buddyid = 2;