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