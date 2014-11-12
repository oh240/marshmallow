CREATE TABLE IF NOT EXISTS `imgs` (
  `id`              INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`            VARCHAR(500)     NOT NULL,
  `size`            INT(11)          NOT NULL DEFAULT '0',
  `original_width`  INT(11)                   DEFAULT NULL,
  `original_height` INT(11)                   DEFAULT NULL,
  `created`         DATETIME         NOT NULL,
  `modified`        DATETIME         NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1
  DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `posts` (
  `id`           INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id`  INT(11)          NOT NULL DEFAULT '0',
  `title`        VARCHAR(255)              DEFAULT NULL,
  `body`         TEXT,
  `published`    TINYINT(1)       NOT NULL DEFAULT '0',
  `release_date` DATETIME                  DEFAULT NULL,
  `created`      DATETIME         NOT NULL,
  `modified`     DATETIME         NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1
  DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `settings` (
  `id`             INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name`      VARCHAR(255)     NOT NULL,
  `theme_name`     VARCHAR(255) DEFAULT NULL,
  `email`          VARCHAR(500) DEFAULT NULL,
  `disqus_user_id` VARCHAR(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1
  DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `id`       INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email`    VARCHAR(255) DEFAULT NULL,
  `nickname` VARCHAR(255) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `created`  DATETIME         NOT NULL,
  `modified` DATETIME         NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE =InnoDB
  AUTO_INCREMENT =1
  DEFAULT CHARSET =utf8;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB
  AUTO_INCREMENT=1
  DEFAULT CHARSET=utf8;