CREATE TABLE IF NOT EXISTS appointments(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    date DATE NOT NULL,
    hour TIME NOT NULL,
    services VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES barberapp.users (id)
);