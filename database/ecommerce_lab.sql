-- SQL script to create ecommerce_lab database and products table
CREATE DATABASE ecommerce_lab;

USE ecommerce_lab;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    category VARCHAR(255)
);

-- Inserting sample products
INSERT INTO products (name, description, price, category) VALUES
('Product 1', 'Description for Product 1', 19.99, 'Category A'),
('Product 2', 'Description for Product 2', 29.99, 'Category B'),
('Product 3', 'Description for Product 3', 39.99, 'Category C'),
('Product 4', 'Description for Product 4', 49.99, 'Category D'),
('Product 5', 'Description for Product 5', 59.99, 'Category E');