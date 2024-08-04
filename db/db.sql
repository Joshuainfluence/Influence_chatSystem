 CREATE TABLE users(
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    unique_id int(255) NOT NULL,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    profileImage varchar(1000) NOT NULL,
    account varchar(255) NOT NULL DEFAULT "registered",
    date_registered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    last_activity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
 );