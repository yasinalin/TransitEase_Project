# TransitEase_Project

CREATE DATABASE transit_system;
USE transit_system;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transit_type VARCHAR(10) NOT NULL,
    start_stop VARCHAR(50) NOT NULL,
    end_stop VARCHAR(50) NOT NULL,
    booking_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Bus Companies
CREATE TABLE bus_companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info VARCHAR(100)
);

-- Metro Companies
CREATE TABLE metro_companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info VARCHAR(100)
);

-- Routes and Stops
CREATE TABLE routes (
    route_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    type ENUM('bus', 'metro'),
    company_id INT,
    FOREIGN KEY (company_id) REFERENCES bus_companies(company_id)
);

CREATE TABLE stops (
    stop_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    route_id INT,
    FOREIGN KEY (route_id) REFERENCES routes(route_id)
);

-- Schedule
CREATE TABLE schedules (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    route_id INT,
    stop_id INT,
    arrival_time TIME,
    departure_time TIME,
    FOREIGN KEY (route_id) REFERENCES routes(route_id),
    FOREIGN KEY (stop_id) REFERENCES stops(stop_id)
);

-- Users
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100)
);

-- Tickets
CREATE TABLE tickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    route_id INT,
    start_stop INT,
    end_stop INT,
    purchase_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_method ENUM('cash', 'mobile_wallet'),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (route_id) REFERENCES routes(route_id),
    FOREIGN KEY (start_stop) REFERENCES stops(stop_id),
    FOREIGN KEY (end_stop) REFERENCES stops(stop_id)
);



xampp -> file explorer -> htdocs -> creat a folder name DBMS_prj -> paste all the given file on that folder 

run http://localhost/DBMS_prj/index.html on your browser
