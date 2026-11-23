-- Membuat database
CREATE DATABASE IF NOT EXISTS db_lockscreen;
USE db_lockscreen;

-- Membuat tabel tbl_user (untuk login)
CREATE TABLE tbl_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Membuat tabel tbl_pengaturan (untuk setting aplikasi & timer lockscreen)
CREATE TABLE tbl_pengaturan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_aplikasi VARCHAR(50) NOT NULL,
    tagline VARCHAR(100) NOT NULL,
    sesi INT NOT NULL
);

-- (Opsional) Data awal / dummy agar bisa langsung login & test
-- Password di bawah adalah SHA1 dari: 1234
INSERT INTO tbl_user (username, password) 
VALUES ('admin', SHA1('1234'));

INSERT INTO tbl_pengaturan (id, nama_aplikasi, tagline, sesi) 
VALUES (1, 'Lock Screen App', 'Keamanan ekstra untuk aplikasi Anda', 5);