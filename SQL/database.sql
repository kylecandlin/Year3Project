-- drop database if it already exists --
DROP DATABASE IF EXISTS pub;

-- create database if it doesn't already exist --
CREATE DATABASE IF NOT EXISTS pub;

-- use this database --
USE pub;

CREATE TABLE Staff (
  StaffID INT(3) NOT NULL AUTO_INCREMENT,
  Forename VARCHAR(20) NOT NULL,
  Surname VARCHAR(20) NOT NULL,
  Age DATE NOT NULL,
  CONSTRAINT PK_Staff PRIMARY KEY(StaffID)
);
