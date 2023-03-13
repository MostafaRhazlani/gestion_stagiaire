CREATE TABLE sections(
  sectionId int NOT NULL,
  sectionName VARCHAR(255),
  primary key (sectionId),
  studentId int NOT NULL,
  foreign key (sectionId) references sections(sectionId)
);

CREATE TABLE students(
  studentId int NOT NULL,
  studentName VARCHAR(255),
  familyName VARCHAR(255),
  age int,
  primary key (studentId),
);

INSERT INTO sections (sectionId,sectionName) VALUES 
(1,'5éme'),
(2,'1BAC'),
(3,'2BAC');

INSERT INTO students (studentId,studentName,familyName,age,sectionId) VALUES 
(1,'Mostafa','Rhazlani',20,1),
(2,'Othmane ','Ghazlani',25,2),
(3,'Azdin','Kouram',16,3),
(4,'Yassin','Hammoudan',26,1),
(5,'Mohammed','Hammochi',28,2);

CREATE TABLE product (
  product_id int auto_increment NOT NULL primary key,
  product_name VARCHAR(255),
  product_quantity int,
  product_sales int,
  primary key (category_id),
  foreign key (category_id) references category.category_id ON DELETE CASCADE
);

INSERT INTO product (product_id, product_name, product_quantity, product_sales, category_id) VALUES
(1, 'samsung',   50,  10, 3),
(2, 'iPhone 13', 100, 30, 1),
(3, 'Redmi',     30,  5,  1),
(4, 'hp',        35,  8,  2),
(5, 'Lenovo',    120, 60  2);

CREATE TABLE category (
  category_id int auto increment NOT NULL primary key,
  category_name VARCHAR(255),
);

INSERT INTO product (category_id, category_name) VALUES
(1, 'Phone'),
(2, 'Lap Top'),
(3, 'Tablet');

CREATE TABLE photos (
  photo_id int NOT NULL auto_increment primary key,
  photo_name VARCHAR(255),
  product_id int NOT NULL,
  foreign key (product_id) references product(product_id) ON DELETE CASCADE
);

INSERT INTO photos(photo_id, photo_name, product_id) VALUES
(1, 'Mostafa-Rhazlani.png', 1),
(2, 'JOYBOY_.png', 2),
(3, 'grid_0.webp', 3),
(4, 'Mostafa-Rhazlani.png', 1),
(5, 'JOYBOY_.png', 2);

CREATE TABLE users (
  user_id int NOT NULL auto_increment primary key,
  user_name VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255)
);

INSERT INTO users(user_id, user_name) VALUES
(1, 'mostafa', 'mostafa@gmail.com', '123'),
(1, 'othmane', 'othmane@gmail.com', '321');

CREATE TABLE orders (
	order_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id int NOT NULL,
    product_id int NOT NULL,
    paid boolean DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE
);

INSERT INTO orders(order_id, user_id, product_id, paid) VALUES
(1,1,5,1),
(2,2,2,1),
(3,1,4,1),
(4,2,3,1),
(5,1,1,1);