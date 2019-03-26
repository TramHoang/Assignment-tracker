CREATE DATABASE tracker;
use tracker;
CREATE TABLE works(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    subject VARCHAR(50) NOT NULL,
    duedate VARCHAR(50),
    priority VARCHAR(30),
    note VARCHAR(100),
    date TIMESTAMP
);