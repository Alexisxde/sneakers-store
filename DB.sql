CREATE TABLE IF NOT EXISTS usuarios (
  id_user INT PRIMARY KEY NOT NULL,
  username VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(50) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  token VARCHAR(255),
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_active TINYINT(1) DEFAULT 1,
  rol ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS zapatillas (
  id_sneaker INT PRIMARY KEY NOT NULL,
  img VARCHAR(255) NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  discount DECIMAL(4, 2) NOT NULL,
  brand VARCHAR(255) NOT NULL,
  model VARCHAR(255) NOT NULL,
  stars DECIMAL(3, 1) NOT NULL,
  description TEXT
);

CREATE TABLE IF NOT EXISTS talles (
  id_size INT AUTO_INCREMENT PRIMARY KEY,
  id_sneaker INT,
  size INT NOT NULL,
  FOREIGN KEY (id_sneaker) REFERENCES zapatillas(id_sneaker) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS colores (
  id_color INT AUTO_INCREMENT PRIMARY KEY,
  id_sneaker INT,
  color VARCHAR(50),
  FOREIGN KEY (id_sneaker) REFERENCES zapatillas(id_sneaker) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS stock (
  id_stock INT AUTO_INCREMENT PRIMARY KEY,
  id_color INT,
  id_size INT,
  quantity INT NOT NULL,
  FOREIGN KEY (id_color) REFERENCES colores(id_color) ON DELETE CASCADE,
  FOREIGN KEY (id_talla) REFERENCES talles(id_size) ON DELETE CASCADE
);