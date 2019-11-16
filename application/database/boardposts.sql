CREATE DATABASE IF NOT EXISTS boardpost_db DEFAULT charset = utf8;
USE boardpost_db;

CREATE TABLE IF NOT EXISTS `categories`(
`cat_id` int(8) NOT NULL AUTO_INCREMENT,
`cat_name` varchar(255) NOT NULL,
`cat_description` varchar(255) NOT NULL,
PRIMARY KEY(cat_id),
UNIQUE INDEX cat_name_unique(cat_name)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `posts`(
`post_id` int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`post_content` TEXT NOT NULL,
`post_date` DATETIME NOT NULL,
`post_topic` int(8) NOT NULL,
`post_by` int(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users`(
`user_id` int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`user_name` varchar(30) NOT NULL,
`user_email` varchar(255) NOT NULL,
`user_pass` varchar(255) NOT NULL,
`user_date` DATETIME NOT NULL,
`user_role` int(1) NOT NULL,
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `topics`(
`topic_id` int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`topic_subject` varchar(255) NOT NULL,
`topic_date` DATETIME NOT NULL,
`topic_cat` int(8) NOT NULL,
`topic_by` int(8) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;




ALTER TABLE posts DROP COLUMN `post_topic`;


ALTER TABLE topics ADD FOREIGN KEY(topic_cat) REFERENCES categories(cat_id);
ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id);




ALTER TABLE topics ADD FOREIGN KEY(topic_cat) REFERENCES categories(cat_id) ON DELETE RESTRICT ON UPDATE CASCADE; 

ALTER TABLE topics ADD FOREIGN KEY(topic_by) REFERENCES users(user_id) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE posts ADD COLUMN post_by int(100) NOT NULL, ADD FOREIGN KEY(post_by) REFERENCES users(user_id) ON DELETE RESTRICT ON UPDATE CASCADE;