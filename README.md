# SQL-запрос на создание таблицы messages в базе данных:
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(36) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
