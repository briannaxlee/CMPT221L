USE site_db;

DROP TABLE IF EXISTS products;

CREATE TABLE IF NOT EXISTS products
	(productID INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    productDescription VARCHAR(50),
    price DECIMAL(5,2),
    supplierName VARCHAR(50) NOT NULL,
    stockQuantity INT NOT NULL);
    
EXPLAIN products;

INSERT INTO products (productName, productDescription, price, supplierName, stockQuantity) VALUES ('Nintendo Switch', 'Game Console', '300.00', 'Nintendo', '1200'),
																									('Super Smash Bros.', 'Game', '60.00', 'Nintendo', '100'),
																									('Playstation 5', 'Game Console', '500.00', 'Sony', '1000'),
																									('Spiderman', 'Game', '60.00', 'Sony', '75'),
																									('Xbox Series X', 'Game Console', '540.00', 'Microsoft', '1500'),
																									('Halo Infinite', 'Game', '60.00', 'Microsoft', '90');		
                       
ALTER TABLE products ADD active ENUM ("Y", "N") DEFAULT "Y";
                       
SELECT * FROM products;
