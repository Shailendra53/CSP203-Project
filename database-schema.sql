DROP database IF EXISTS ezdoc; 
CREATE database ezdoc;
USE ezdoc;


CREATE TABLE category(
	category_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	category_name VARCHAR(45) NOT NULL,
	PRIMARY KEY (category_id)
);

CREATE TABLE medicine(
	medicine_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	medicine_name VARCHAR(45) NOT NULL,
	category_id SMALLINT UNSIGNED,
	price FLOAT UNSIGNED,
	PRIMARY KEY  (medicine_id),
	FOREIGN KEY (category_id) REFERENCES category(category_id) ON DELETE cascade ON UPDATE CASCADE
);

CREATE TABLE city(
	city_id  SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, 
	city_name varchar(20) NOT NULL,
	PRIMARY KEY (city_id)
);

CREATE TABLE shop(
	shop_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	address varchar(30) NOT NULL,
	city_id SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY(shop_id),
	FOREIGN KEY (city_id) REFERENCES city(city_id) ON DELETE cascade ON UPDATE CASCADE
);

CREATE TABLE shop_medicine(
	shop_id SMALLINT UNSIGNED,
	medicine_id SMALLINT UNSIGNED,
	quantity SMALLINT UNSIGNED DEFAULT 0,
	FOREIGN KEY (shop_id) REFERENCES shop(shop_id)  ON DELETE cascade ON UPDATE CASCADE,
	FOREIGN KEY (medicine_id) REFERENCES medicine(medicine_id)  ON DELETE cascade ON UPDATE CASCADE
);

CREATE TABLE cart(
	person_id SMALLINT UNSIGNED,
	medicine_id SMALLINT UNSIGNED,
	quantity int
);


	


