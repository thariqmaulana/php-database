CREATE TABLE customers(
  id VARCHAR(100) NOT NULL,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
) ENGINE = innodb;

CREATE TABLE admin(
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY(username)
) ENGINE = innodb;

CREATE TABLE comments(
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  comment TEXT,
  PRIMARY KEY(id)
) ENGINE = innodb;