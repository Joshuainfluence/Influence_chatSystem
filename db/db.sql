 ALTER TABLE users ADD COLUMN last_activity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 
 ALTER TABLE users ADD COLUMN date_registered TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP