CREATE TABLE `u697824263_eventIO`.`User`
(
    userId SERIAL PRIMARY KEY,
    userName VARCHAR(32) NOT NULL,
    userFirstName VARCHAR(32)  NOT NULL,
    userMail VARCHAR(64)  NOT NULL,
    userPassword VARCHAR(64)  NOT NULL,
) ENGINE = INNODB;