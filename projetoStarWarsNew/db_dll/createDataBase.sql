CREATE DATABASE IF NOT EXISTS star_wars;
USE star_wars;

CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    episode_id INT NOT NULL,
    release_date DATE NOT NULL,
    director VARCHAR(255),
    producer VARCHAR(255),
    opening_crawl TEXT
);

CREATE TABLE IF NOT EXISTS logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    details TEXT
);

CREATE TABLE IF NOT EXISTS `relation` (
    `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
    `id_movie` BIGINT(20) NOT NULL DEFAULT '0',
    `id_log` BIGINT(20) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
);
