CREATE TABLE `u697824263_eventIO`.`Campaign`
(
    campaign_id SERIAL,
    campaign_begin DATE NOT NULL,
    campaign_end DATE NOT NULL,
    PRIMARY KEY (campaign_id)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`User`
(
    user_id SERIAL,
    user_name VARCHAR(50) NOT NULL,
    user_firstname VARCHAR(50)  NOT NULL,
    user_mail VARCHAR(50)  NOT NULL,
    user_password VARCHAR(50)  NOT NULL,
    PRIMARY KEY (user_id)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`Donor`
(
    user_id SERIAL,
    donor_points int? = NULL,
    PRIMARY KEY (user_id)
    FOREIGN KEY (user_id) REFERENCES User(user_id)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`Jury`
(
    user_id SERIAL,
    campaign_id SERIAL,
    PRIMARY KEY (user_id, campaign_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN Key (campaign_id) REFERENCES Campaign(campaign_id)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`Event`
(
    event_id SERIAL,
    campaign_id SERIAL,
    event_description VARCHAR(500)  NOT NULL,
    event_points INT NOT NULL = 0,
    event_retained BOOLEAN NOT NULL = FALSE,
    event_description VARCHAR(500)  NOT NULL,
    tier_number INT NOT NULL = 0,
    PRIMARY KEY (event_id, campaign_id),
    FOREIGN Key (campaign_id) REFERENCES Campaign(campaign_id)
    FOREIGN Key (tier_number) REFERENCES Tier(tier_number)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`Tier`
(
    tier_number INT NOT NULL,
    event_id SERIAL,
    tier_description VARCHAR(250)  NOT NULL,
    PRIMARY KEY (tier_number, event_id),
    FOREIGN KEY (event_id) REFERENCES Event(event_id)
) ENGINE = INNODB;

CREATE TABLE `u697824263_eventIO`.`Organizer`
(
    user_id SERIAL,
    event_id int? = NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (event_id) REFERENCES Event(event_id)
) ENGINE = INNODB;