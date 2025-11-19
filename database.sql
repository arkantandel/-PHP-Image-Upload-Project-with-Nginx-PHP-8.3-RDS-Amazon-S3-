CREATE DATABASE upload_db;

USE upload_db;

CREATE TABLE images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255),
  s3_url VARCHAR(1000),
  mime_type VARCHAR(200),
  file_size BIGINT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
