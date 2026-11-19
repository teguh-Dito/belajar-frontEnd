## DATABASE 
CREATE DATABASE login_db;

USE login_db;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY unique_email (email)
);

Reference: 
https://www.youtube.com/watch?v=5L9UhOnuos0
https://just-validate.dev/docs/intro#quick-start
https://watercss.kognise.dev/