-- Création de la table représentant les campagnes d’idéation d’événements --
-- Cette table contient une campagne avec une date de début et une date de fin --
CREATE TABLE `u697824263_eventIO`.`Campaign`
(
    campaign_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    campaign_begin DATE NOT NULL,
    campaign_end DATE NOT NULL
) ENGINE = INNODB;

-- Création de la table représentant les utilisateurs --
-- Cette table contient un utilisateur avec un nom, un prénom, une adresse mail, et un mot de passe --
CREATE TABLE `u697824263_eventIO`.`User`
(
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_firstname VARCHAR(50)  NOT NULL,
    user_mail VARCHAR(50)  NOT NULL,
    user_password VARCHAR(50)  NOT NULL
) ENGINE = INNODB;


-- Création de la table représentant les donateurs --
-- Cette table contient un utilisateur et une campagne avec une réserve de points --
-- Contrainte : si l'utilisateur n'existe pas on ne peut créer le donateur --
-- Contrainte : Si l'utilisateur est supprimé alors le donateur aussi --
-- Contrainte : si la campagne n'existe pas on ne peut créer le donateur --
-- Contrainte : Si la campagne est supprimé alors le donateur aussi --
CREATE TABLE `u697824263_eventIO`.`Donor`
(
    user_id INT NOT NULL,
    campaign_id INT NOT NULL,
    donor_points INT DEFAULT NULL,
    PRIMARY KEY (`user_id`, `campaign_id`),
    CONSTRAINT `FK_DONOR_USER` FOREIGN KEY (`user_id`) REFERENCES `User`(`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT
    CONSTRAINT `FK_DONOR_CAMPAIGN` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign`(`campaign_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = INNODB;

-- Création de la table représentant les jury --
-- Cette table contient un utilisateur et une campagne --
-- Contrainte : si l'utilisateur n'existe pas on ne peut créer le jury --
-- Contrainte : Si l'utilisateur est supprimé alors le jury aussi --
-- Contrainte : si la campagne n'existe pas on ne peut créer le jury --
-- Contrainte : Si la campagne est supprimé alors le jury aussi --
CREATE TABLE `u697824263_eventIO`.`Jury`
(
    user_id INT NOT NULL,
    campaign_id INT NOT NULL,
    PRIMARY KEY (`user_id`, `campaign_id`),
    CONSTRAINT `FK_JURY_USER` FOREIGN KEY (`user_id`) REFERENCES `User`(`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT `FK_JURY_CAMPAIGN` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign`(`campaign_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = INNODB;

-- Création de la table représentant les idées d’événements --
-- Cette table contient un event et une campagne avec une description, une réserve de points, si l'event a été retenu, et le tier --
-- Contrainte : si la campagne n'existe pas on ne peut créer l'event --
-- Contrainte : Si la campagne est supprimé alors l'event aussi --
CREATE TABLE `u697824263_eventIO`.`Event`
(
    event_id INT NOT NULL,
    campaign_id INT NOT NULL,
    event_description VARCHAR(500)  NOT NULL,
    event_points INT NOT NULL DEFAULT 0,
    event_retained BOOLEAN NOT NULL DEFAULT FALSE,
    tier_number INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`event_id`, `campaign_id`),
    CONSTRAINT `FK_EVENT_CAMPAGIN` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign`(`campaign_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = INNODB;

-- Déclencheur permettant au composite de clefs primaires de la table Event de s'auto-incrémenter --
DELIMITER $$
CREATE TRIGGER `EVENT_CAMPAIGN_COMPOSITE_AUTO_INCREMENT` BEFORE INSERT ON `Event`
FOR EACH ROW
BEGIN
    DECLARE max_id INT(11);
    SELECT event_id INTO max_id FROM `Event` WHERE campaign_id = NEW.campaign_id;
    SET NEW.event_id = IF(ISNULL(max_id), 1, max_id + 1);
END$$

-- Création de la table représentant les contenus déblocables supplémentaires --
-- Cette table contient un tier et un event avec une description et le nombre de points pour le débloqué --
-- Contrainte : Si l'event n'existe pas on ne peut créer le tier --
-- Contrainte : Si l'event est supprimé alors le tier aussi --
CREATE TABLE `u697824263_eventIO`.`Tier`
(
    tier_number INT NOT NULL,
    event_id INT NOT NULL,
    tier_description VARCHAR(250)  NOT NULL,
    tier_unlock INT NOT NULL,
    PRIMARY KEY (`tier_number`, `event_id`),
    CONSTRAINT `FK_TIER_EVENT` FOREIGN KEY (`event_id`) REFERENCES `Event`(`event_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = INNODB;

-- Contrainte : Si le tier n'existe pas on ne peut référencé le tier de l'event à celui-ci -> Si ne fonctionne pas ajouter trigger ON INSERT --
-- Contrainte : Le tier ne peut être supprimé si celui-ci est fait référence à un event --
ALTER TABLE `u697824263_eventIO`.`Event` ADD CONSTRAINT `FK_EVENT_TIER` FOREIGN KEY (`tier_number`) REFERENCES `Tier`(`tier_number`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Déclencheur permettant au composite de clefs primaires de la table Tier de s'auto-incrémenter --
DELIMITER $$
CREATE TRIGGER `TIER_EVENT_COMPOSITE_AUTO_INCREMENT` BEFORE INSERT ON `Tier`
FOR EACH ROW
BEGIN
    DECLARE max_id INT(11);
    SELECT tier_number INTO max_id FROM `Tier` WHERE event_id = NEW.event_id;
    SET NEW.tier_number = IF(ISNULL(max_id), 1, max_id + 1);
END$$

-- Création de la table représentant les organisateurs --
-- Cette table contient un utilisateur et une campagne avec un event --
-- Contrainte : si l'utilisateur n'existe pas on ne peut créer l'organisateur --
-- Contrainte : Si l'utilisateur est supprimé alors l'organisateur aussi --
-- Contrainte : si la campagne n'existe pas on ne peut créer l'organisateur --
-- Contrainte : Si la campagne est supprimé alors le l'organisateur aussi --
-- Contrainte : Si l'event n'existe pas on ne peut on ne peut référencé l'event de l'organisateur à celui-ci --
-- Contrainte : Si l'event est supprimé alors l'event de l'organisateur est mis à NULL --
CREATE TABLE `u697824263_eventIO`.`Organizer`
(
    user_id INT NOT NULL,
    campaign_id INT NOT NULL,
    event_id INT DEFAULT NULL,
    PRIMARY KEY (`user_id`, `campaign_id`),
    CONSTRAINT `FK_ORGANIZER_USER` FOREIGN KEY (`user_id`) REFERENCES `User`(`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT `FK_OGRANIZER_CAMPAIGN` FOREIGN KEY (`campaign_id`) REFERENCES `Campaign`(`campaign_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT `FK_OGRANIZER_EVENT` FOREIGN KEY (`event_id`) REFERENCES `Event`(`event_id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = INNODB;