-- Drop database if it already exists --
DROP DATABASE IF EXISTS pub;

-- Create database if it doesn't already exist --
CREATE DATABASE IF NOT EXISTS pub;

-- Use this database --
USE pub;

-- Create Customer table --
CREATE TABLE Customer (
  CustomerID INT(3) NOT NULL AUTO_INCREMENT,
  Forename VARCHAR(50) NOT NULL,
  Surname VARCHAR(50) NOT NULL,
  Username VARCHAR(20) NOT NULL,
  Password VARCHAR(255) NOT NULL,
  Age DATE NOT NULL,
  CONSTRAINT PK_Customer PRIMARY KEY(CustomerID)
);

-- Create Staff table --
CREATE TABLE Staff (
  StaffID INT(3) NOT NULL AUTO_INCREMENT,
  Forename VARCHAR(50) NOT NULL,
  Surname VARCHAR(50) NOT NULL,
  Username CHAR(6) NOT NULL,
  Password VARCHAR(255) NOT NULL,
  Age DATE NOT NULL,
  CONSTRAINT PK_Staff PRIMARY KEY(StaffID)
);

-- Create Events table --
CREATE TABLE Event (
  EventID INT(3) NOT NULL AUTO_INCREMENT,
  StaffID INT(3) NOT NULL,
  Name VARCHAR(20) NOT NULL,
  Details DATETIME,
  Price DOUBLE(5,2),
  Description VARCHAR(1000),
  CONSTRAINT PK_Event PRIMARY KEY(EventID),
  CONSTRAINT FK_EventStaff FOREIGN KEY(StaffID) REFERENCES Staff(StaffID)
);

-- Create table to link Customers to Events --
CREATE TABLE EventAttendance (
  EventID INT(3) NOT NULL,
  CustomerID INT(3) NOT NULL,
  Quantity INT(1) NOT NULL,
  CONSTRAINT PK_EventAttendance PRIMARY KEY(EventID, CustomerID),
  CONSTRAINT FK_EventAttendanceEvent FOREIGN KEY(EventID) REFERENCES Event(EventID),
  CONSTRAINT FK_EventAttendanceCustomer FOREIGN KEY(CustomerID) REFERENCES Customer(CustomerID)
);
