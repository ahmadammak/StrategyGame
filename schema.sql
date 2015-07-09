CREATE DATABASE sg;

CREATE TABLE `sg`.`Users` (
  `usr_id` BIGINT NOT NULL AUTO_INCREMENT,
  `usr_name` VARCHAR(45) NOT NULL,
  `usr_pass` VARCHAR(45) NOT NULL,
  `is_online` BIT NOT NULL DEFAULT 0,
  PRIMARY KEY (`usr_id`),
  UNIQUE INDEX `usr_name_UNIQUE` (`usr_name` ASC));

CREATE TABLE `sg`.`Cities` (
  `cty_id` BIGINT NOT NULL AUTO_INCREMENT,
  `usr_id` BIGINT NOT NULL,
  `cty_money` DECIMAL NOT NULL,
  `cty_houses` INT NOT NULL,
  `cty_jobs` INT NOT NULL,
  `new_person_tick` SMALLINT NOT NULL,
  `noh` INT NOT NULL,
  `nop` INT NOT NULL,
  PRIMARY KEY (`cty_id`, `usr_id`),
  INDEX `fk_Cities_1_idx` (`usr_id` ASC),
  CONSTRAINT `fk_Cities_1`
  FOREIGN KEY (`usr_id`)
  REFERENCES `sg`.`Users` (`usr_id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT);

CREATE TABLE `sg`.`People` (
  `prs_id` BIGINT NOT NULL AUTO_INCREMENT,
  `cty_id` BIGINT NOT NULL,
  `prs_health` SMALLINT NOT NULL,
  `prs_moral` SMALLINT NOT NULL,
  `prs_health_tick` SMALLINT NOT NULL,
  `prs_salary_tick` SMALLINT NOT NULL,
  `prs_money` INT NOT NULL,
  PRIMARY KEY (`prs_id`, `cty_id`),
  INDEX `fk_People_1_idx` (`cty_id` ASC),
  CONSTRAINT `fk_People_1`
  FOREIGN KEY (`cty_id`)
  REFERENCES `sg`.`Cities` (`cty_id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT);

CREATE TABLE `sg`.`Workers` (
  `prs_id` BIGINT NOT NULL,
  `exp_tick` SMALLINT NOT NULL,
  `exp_points` INT NOT NULL,
  PRIMARY KEY (`prs_id`),
  CONSTRAINT `fk_Workers_1`
  FOREIGN KEY (`prs_id`)
  REFERENCES `sg`.`People` (`prs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `sg`.`Soldiers` (
  `prs_id` BIGINT NOT NULL,
  `fights_num` INT NOT NULL,
  PRIMARY KEY (`prs_id`),
  CONSTRAINT `fk_Soldiers_1`
  FOREIGN KEY (`prs_id`)
  REFERENCES `sg`.`People` (`prs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `sg`.`Ills` (
  `cty_id` BIGINT NOT NULL,
  `prs_id` BIGINT NOT NULL,
  PRIMARY KEY (`cty_id`, `prs_id`),
  INDEX `fk_Ills_1_idx` (`prs_id` ASC),
  CONSTRAINT `fk_Ills_1`
  FOREIGN KEY (`prs_id`)
  REFERENCES `sg`.`People` (`prs_id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_Ills_2`
  FOREIGN KEY (`cty_id`)
  REFERENCES `sg`.`Cities` (`cty_id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT);
