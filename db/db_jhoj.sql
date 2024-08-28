-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mangslivre
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mangslivre
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mangslivre` DEFAULT CHARACTER SET utf8 ;
USE `mangslivre` ;

-- -----------------------------------------------------
-- Table `mangslivre`.`catgusers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`catgusers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `url_user` VARCHAR(255) NULL,
  `catguser_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_catguser1_idx` (`catguser_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_catguser1`
    FOREIGN KEY (`catguser_id`)
    REFERENCES `mangslivre`.`catgusers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`coments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`coments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rating` INT NULL,
  `review` TEXT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coments_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_coments_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mangslivre`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` DECIMAL(10,2) NULL,
  `qtd` INT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_order_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mangslivre`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`categorys`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`categorys` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name_catg` VARCHAR(245) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`authors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name_prod` VARCHAR(245) NULL,
  `value` DECIMAL(10,2) NULL,
  `amount` INT NULL,
  `url_prod` VARCHAR(245) NULL,
  `sinopse` TEXT NULL,
  `category_id` INT NOT NULL,
  `authors_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_category1_idx` (`category_id` ASC) VISIBLE,
  INDEX `fk_products_authors1_idx` (`authors_id` ASC) VISIBLE,
  CONSTRAINT `fk_products_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `mangslivre`.`categorys` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_authors1`
    FOREIGN KEY (`authors_id`)
    REFERENCES `mangslivre`.`authors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`wishs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`wishs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `stats` VARCHAR(100) NULL,
  PRIMARY KEY (`id`, `products_id`, `user_id`),
  INDEX `fk_user_has_products_products1_idx` (`products_id` ASC) VISIBLE,
  INDEX `fk_user_has_products_user1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_has_products_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mangslivre`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `mangslivre`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mangslivre`.`payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mangslivre`.`payments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `orders_id` INT NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`id`, `orders_id`, `products_id`),
  INDEX `fk_orders_has_products_products1_idx` (`products_id` ASC) VISIBLE,
  INDEX `fk_orders_has_products_orders1_idx` (`orders_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_has_products_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `mangslivre`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `mangslivre`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
