CREATE TABLE `categories` (
  `id`    INT(11)      NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `title` VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `orders` (
  `id`          INT(11)      NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `price`       FLOAT        NOT NULL,
  `transaction` VARCHAR(255) NOT NULL,
  `status`      VARCHAR(255) NOT NULL,
  `currency`    VARCHAR(255) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `reports` (
  `id`         INT(11)  NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `product_id` INT(11)  NOT NULL,
  `user_id`    INT(11)  NOT NULL,
  `order_id`   INT(11)  NOT NULL,
  `purchased`  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `products` (
  `id`          INT(11)      NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `title`       VARCHAR(255) NOT NULL,
  `category_id` INT(11)      NOT NULL,
  `price`       FLOAT        NOT NULL,
  `quantity`    INT(11)      NOT NULL,
  `description` TEXT         NOT NULL,
  `image`       VARCHAR(255) NOT NULL,
  `created`     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `ratings` (
  `id`         INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `product_id` INT(11) NOT NULL,
  `user_id`    INT(11) NOT NULL,
  `rating`     INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE `users` (
  `id`        INT(11)      NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  `username`  VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `lastname`  VARCHAR(255) NOT NULL,
  `password`  VARCHAR(255) NOT NULL,
  `role`      VARCHAR(255) NOT NULL,
  `email`     VARCHAR(255) NOT NULL,
  `image`     VARCHAR(255) NOT NULL,
  `created`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE product_review (
  id         INT(11) AUTO_INCREMENT,
  PRIMARY KEY (id),
  product_id INT(11) NOT NULL,
  review_id  INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

