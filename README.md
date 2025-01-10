
-- Create a new database
CREATE DATABASE transit_system;
USE transit_system;

-- Create table for bus companies
CREATE TABLE bus_companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info VARCHAR(100)
);

-- Create table for metro companies
CREATE TABLE metro_companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info VARCHAR(100)
);

-- Create table for routes
CREATE TABLE routes (
    route_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('bus', 'metro') NOT NULL,
    company_id INT NOT NULL,
    origin VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    fare DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (company_id) REFERENCES bus_companies(company_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create table for stops
CREATE TABLE stops (
    stop_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    route_id INT NOT NULL,
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    FOREIGN KEY (route_id) REFERENCES routes(route_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create table for tickets
CREATE TABLE tickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    route_id INT NOT NULL,
    start_stop VARCHAR(100) NOT NULL,
    end_stop VARCHAR(100) NOT NULL,
    fare DECIMAL(10,2) NOT NULL,
    status ENUM('booked', 'completed', 'cancelled') DEFAULT 'booked',
    payment_method ENUM('card', 'mobile_banking') NOT NULL,
    FOREIGN KEY (route_id) REFERENCES routes(route_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create table for users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

-- Insert sample data for bus companies
INSERT INTO bus_companies (name, contact_info) VALUES
('Dhaka City Bus', 'contact@dhakacitybus.com');

-- Insert sample data for metro companies
INSERT INTO metro_companies (name, contact_info) VALUES
('Dhaka Metro Rail', 'contact@dhakacitymetro.com');

-- Insert sample data for routes
INSERT INTO routes (name, type, company_id, origin, destination, fare) VALUES
('Shahbagh to Motijheel', 'bus', 1, 'Shahbagh', 'Motijheel', 20.00),
('Mirpur to Uttara', 'metro', 2, 'Mirpur', 'Uttara', 30.00);

-- Insert sample data for stops
INSERT INTO stops (name, route_id, latitude, longitude) VALUES
('Shahbagh', 1, 23.7386, 90.3954),
('Motijheel', 1, 23.7292, 90.4129),
('Mirpur', 2, 23.8103, 90.4125),
('Uttara', 2, 23.8748, 90.4000);

-- Insert sample data for users
INSERT INTO users (name, email, password, role) VALUES
('Inzamam', 'inzamam@gmail.com', 'password123', 'user'),
('Admin', 'admin@gmail.com', 'adminpass', 'admin');

-- Insert sample tickets
INSERT INTO tickets (user_id, route_id, start_stop, end_stop, fare, payment_method) VALUES
(1, 1, 'Shahbagh', 'Motijheel', 20.00, 'card'),
(1, 2, 'Mirpur', 'Uttara', 30.00, 'mobile_banking');

xampp -> file explorer -> htdocs -> creat a folder name DBMS_prj -> paste all the given file on that folder 

run http://localhost/DBMS_prj/index.html on your browser
