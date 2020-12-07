-- MySQL Script generated by MySQL Workbench
-- Sun Dec  6 00:49:28 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema logkennel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema logkennel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `logkennel` DEFAULT CHARACTER SET utf8 ;
USE `logkennel` ;

-- -----------------------------------------------------
-- Table `logkennel`.`block`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`block` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`block_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`menu` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_link` VARCHAR(255) NOT NULL,
  `menu_image` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `link_UNIQUE` (`menu_link` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`news` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_year` INT(4) UNSIGNED NOT NULL,
  `news_month` INT(2) UNSIGNED NOT NULL,
  `news_day` INT(2) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`dog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`dog` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dog_birth` DATE NULL,
  `gender_type` TINYINT(1) UNSIGNED NOT NULL,
  `for_sale` TINYINT(1) NULL,
  `dog_info` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`lang`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`lang` (
  `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lang_code` VARCHAR(3) NOT NULL,
  `lang_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`lang_name` ASC),
  UNIQUE INDEX `link_UNIQUE` (`lang_code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`menu_title`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`menu_title` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` INT(11) UNSIGNED NOT NULL,
  `menu_title` VARCHAR(255) NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_text_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_menu_text_menu`
    FOREIGN KEY (`menu_id`)
    REFERENCES `logkennel`.`menu` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_text_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`block_title`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`block_title` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_id` INT(11) UNSIGNED NOT NULL,
  `block_title` VARCHAR(255) NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `block_id_UNIQUE` (`block_id` ASC),
  INDEX `fk_block_title_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_block_name_block1`
    FOREIGN KEY (`block_id`)
    REFERENCES `logkennel`.`block` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_block_title_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`block_text`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`block_text` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_id` INT(11) UNSIGNED NOT NULL,
  `block_text` TEXT NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_block_text_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_block_text_block1`
    FOREIGN KEY (`block_id`)
    REFERENCES `logkennel`.`block` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_block_text_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`news_title`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`news_title` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` INT(11) UNSIGNED NOT NULL,
  `news_title` TEXT NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_title_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_news_title_news1`
    FOREIGN KEY (`news_id`)
    REFERENCES `logkennel`.`news` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_news_title_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`news_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`news_link` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` INT(11) UNSIGNED NOT NULL,
  `news_link` TEXT NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_link_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_news_link_news1`
    FOREIGN KEY (`news_id`)
    REFERENCES `logkennel`.`news` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_news_link_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`news_text`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`news_text` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` INT(11) UNSIGNED NOT NULL,
  `news_text` TEXT NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_text_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_news_text_news1`
    FOREIGN KEY (`news_id`)
    REFERENCES `logkennel`.`news` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_news_text_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`dog_gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`dog_gender` (
  `id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender_name` VARCHAR(255) NOT NULL,
  `gender_type` TINYINT(1) UNSIGNED NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`gender_name` ASC),
  INDEX `fk_gender_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_gender_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`dog_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`dog_image` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dog_id` INT(11) UNSIGNED NOT NULL,
  `dog_image_link` VARCHAR(255) NOT NULL,
  `dog_image_alt_text` VARCHAR(255) NULL,
  `main` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dog_image_dog1_idx` (`dog_id` ASC),
  CONSTRAINT `fk_dog_image_dog1`
    FOREIGN KEY (`dog_id`)
    REFERENCES `logkennel`.`dog` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`menu_subtitle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`menu_subtitle` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` INT(11) UNSIGNED NOT NULL,
  `menu_subtitle` VARCHAR(255) NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_text_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_menu_text_menu0`
    FOREIGN KEY (`menu_id`)
    REFERENCES `logkennel`.`menu` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_text_lang10`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`news_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`news_image` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` INT(11) UNSIGNED NOT NULL,
  `news_image_link` VARCHAR(255) NOT NULL,
  `news_image_alt_text` VARCHAR(255) NULL,
  `main` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_news_image_news1_idx` (`news_id` ASC),
  CONSTRAINT `fk_news_image_news1`
    FOREIGN KEY (`news_id`)
    REFERENCES `logkennel`.`news` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`admin_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`admin_menu` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_menu_link` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `link_UNIQUE` (`admin_menu_link` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`admin_menu_title`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`admin_menu_title` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_menu_id` INT(11) UNSIGNED NOT NULL,
  `admin_menu_title` VARCHAR(255) NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_text_lang1_idx` (`lang_id` ASC),
  INDEX `fk_menu_text_menu1_idx` (`admin_menu_id` ASC),
  CONSTRAINT `fk_menu_text_menu1`
    FOREIGN KEY (`admin_menu_id`)
    REFERENCES `logkennel`.`admin_menu` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_text_lang11`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`dog_name`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`dog_name` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dog_id` INT(11) UNSIGNED NOT NULL,
  `dog_name` VARCHAR(255) NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `block_id_UNIQUE` (`dog_id` ASC),
  INDEX `fk_block_title_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_block_title_lang10`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dog_name_dog1`
    FOREIGN KEY (`dog_id`)
    REFERENCES `logkennel`.`dog` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`settings` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `settings_name` VARCHAR(255) NOT NULL,
  `settings_text` TEXT NOT NULL,
  `lang_id` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_settings_lang1_idx` (`lang_id` ASC),
  CONSTRAINT `fk_settings_lang1`
    FOREIGN KEY (`lang_id`)
    REFERENCES `logkennel`.`lang` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `logkennel`.`block_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `logkennel`.`block_image` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_id` INT(11) UNSIGNED NOT NULL,
  `block_image_link` VARCHAR(255) NOT NULL,
  `block_image_alt_text` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_block_image_block1_idx` (`block_id` ASC),
  CONSTRAINT `fk_block_image_block1`
    FOREIGN KEY (`block_id`)
    REFERENCES `logkennel`.`block` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
