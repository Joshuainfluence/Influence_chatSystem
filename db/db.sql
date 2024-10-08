 CREATE TABLE users(
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    unique_id int(255) NOT NULL,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    profileImage varchar(1000) NOT NULL,
    account varchar(255) NOT NULL DEFAULT "registered",
    date_registered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_activity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
 );

 ALTER TABLE users 
 ADD COLUMN vcode varchar(255) NOT NULL DEFAULT "enabled"
 

 ALTER TABLE users 
ADD COLUMN verification_code VARCHAR(6),
ADD COLUMN verification_code_expiration TIMESTAMP NULL DEFAULT NULL,
ADD COLUMN verification_attempts INT DEFAULT 0;





 CREATE TABLE messages(
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    incoming_msg_id int(11) NOT NULL,
    outgoing_msg_id int(11) NOT NULL,
    msg varchar(100000) NOT NULL, 
    time_sent TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    
);