-- DATABASE: m3ci4
CREATE DATABASE IF NOT EXISTS m3ci4 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE m3ci4;

-- users
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','student') NOT NULL DEFAULT 'student',
  full_name VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- students
DROP TABLE IF EXISTS students;
CREATE TABLE students (
  student_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  entry_year YEAR,
  nim VARCHAR(20) UNIQUE,
  major VARCHAR(100),
  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- courses
DROP TABLE IF EXISTS courses;
CREATE TABLE courses (
  course_id INT AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(150) NOT NULL,
  credits INT NOT NULL DEFAULT 3,
  code VARCHAR(20) UNIQUE,
  description TEXT
);

-- takes (enrollments)
DROP TABLE IF EXISTS takes;
CREATE TABLE takes (
  take_id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  course_id INT NOT NULL,
  enroll_date DATE DEFAULT CURRENT_DATE,
  semester VARCHAR(10),
  UNIQUE KEY student_course (student_id, course_id, semester),
  FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES courses(course_id) ON DELETE CASCADE
);

-- Seed: admin user + one student + some courses
INSERT INTO users (username, password, role, full_name) VALUES
('admin',  '$2y$10$wJm9Q5qXUqzH86i1XQzLze7KZC6qZL2bK7y7NQ3kzIu1aQbbgI7a6', 'admin', 'Administrator'),
('student1', '$2y$10$0w4gYuv1ylY0vHSaLkG4t.(BzYhQ6Xq0CyxOi8f9b9U9Z1mZKjBv2', 'student', 'Nama Mahasiswa');

-- Passwords above are: admin -> "admin123", student1 -> "student123"
-- (hashed with password_hash)

INSERT INTO students (user_id, entry_year, nim, major) VALUES
(2, 2023, '2023001', 'Teknik Informatika');

INSERT INTO courses (course_name, credits, code, description) VALUES
('Pemrograman Web', 3, 'PW101', 'Dasar pemrograman web dengan PHP dan CI4'),
('Basis Data', 3, 'BD102', 'Perancangan database relasional'),
('Algoritma & Struktur Data', 4, 'ASD103', 'Dasar algoritma & struktur data');

-- optionally enroll student1 to one course
INSERT INTO takes (student_id, course_id, semester) VALUES
(1, 1, '2023-1');
