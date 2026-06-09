-- Create the database if it does not already exist.
CREATE DATABASE IF NOT EXISTS microlab
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE microlab;

DROP TABLE IF EXISTS reminders;

--  table.
CREATE TABLE reminders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  event_date DATE NOT NULL,
  title VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  reminder_days INT NOT NULL,
  sent TINYINT(1) NOT NULL DEFAULT 0
);