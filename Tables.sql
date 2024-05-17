CREATE TABLE IF NOT EXISTS users (
  id_user VARCHAR(255) PRIMARY KEY NOT NULL,
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

CREATE TABLE IF NOT EXISTS sneakers (
  id_sneaker VARCHAR(255) PRIMARY KEY NOT NULL,
  img VARCHAR(255) NOT NULL,
  price DECIMAL(10, 3) NOT NULL,
  discount DECIMAL(4, 2) NOT NULL,
  brand VARCHAR(255) NOT NULL,
  model VARCHAR(255) NOT NULL,
  stars DECIMAL(3, 1) NOT NULL,
  is_active TINYINT(1) DEFAULT 1,
  description TEXT
);

-- Add sneaker...
INSERT INTO sneakers (id_sneaker, img, price, discount, brand, model, stars, is_active, description)
VALUES ('id', 'img.ext', 139.999, 30.00, 'Marca', 'Modelo', 3.5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, iste inventore. Quo, repudiandae nam mollitia doloremque animi esse commodi itaque id dolorem et consectetur atque maiores ex. Minima, eos eum!');

CREATE TABLE IF NOT EXISTS sizes (
  id_size INT AUTO_INCREMENT PRIMARY KEY,
  id_sneaker INT,
  size VARCHAR(255) NOT NULL,
  FOREIGN KEY (id_sneaker) REFERENCES sneakers(id_sneaker) ON DELETE CASCADE
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