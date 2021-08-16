USE site_db;

DROP TABLE IF EXISTS Glizzard_Suppliers;

CREATE TABLE IF NOT EXISTS Glizzard_Suppliers
	(supplierID INT AUTO_INCREMENT PRIMARY KEY,
    supplierName VARCHAR(50) NOT NULL,
    supplierEmail VARCHAR(50) NOT NULL,
    supplierPhoneNumber VARCHAR(15) NOT NULL);
    
EXPLAIN Glizzard_Suppliers;
    
INSERT INTO Glizzard_Suppliers (supplierName, supplierEmail, supplierPhoneNumber) VALUES ('Nintendo','nintendosupport@nintendo.com', '8456294658'),
                                                                                    ('Sony', 'sonysupport@sony.com', '8457695379'),
                                                                                    ('Microsoft', 'microsoftsupport@microsoft.com', '8453695294');

ALTER TABLE Glizzard_Suppliers ADD active ENUM ("Y", "N") DEFAULT "Y";
                                                
SELECT * FROM Glizzard_Suppliers;