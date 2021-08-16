CREATE DATABASE IF NOT EXISTS site_db;
USE site_db;

DROP TABLE IF EXISTS myusers;

CREATE TABLE IF NOT EXISTS myusers
    (id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username CHAR(20) NOT NULL,
    dob DATE NOT NULL,
    dateofhire DATE NOT NULL,
    useraddress VARCHAR(50) NOT NULL,
    password VARCHAR(256) NOT NULL,
    pwchange DATE NOT NULL,
    email VARCHAR(256) NOT NULL,
    name VARCHAR(256) NOT NULL
    );

INSERT INTO myusers(id, username, dob, dateofhire, useraddress, password, pwchange, email, name)
    VALUES(1, 'andrewmallach', '1999-10-11', '2020-08-24', '3399 North Road Poughkeepsie NY 12601', 'password', '2020-10-27', 'andrew.mallach1@marist.edu', 'Andrew Mallach'), 
          (2, 'ajkuras', '2000-09-29', '2020-08-24', '3399 North Road Poughkeepsie NY 12601', 'password!!!', '2020-10-27', 'aaron.kruas1@marist.edu', 'AJ Kuras'),
          (3, 'briannalee', '2000-11-16', '2020-08-24', '3399 North Road Poughkeespie NY 12601', 'password???', '2020-10-27', 'brianna.lee1@marist.edu', 'Brianna Lee');

ALTER TABLE myusers ADD active ENUM ("Y", "N") DEFAULT "Y";
                                                
SELECT * FROM myusers;