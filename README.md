# 🧑‍💼 Employee Management System (EMS)

**Project Name:** Employee Management System  
**Developer:** Faizan Khambre  
**Tech Stack:** PHP 8.2, MySQL, Bootstrap 5  

A simple and responsive Employee Management System built using **Core PHP**, **MySQL**, and **Bootstrap 5**.

## 🚀 Features

- 🧾 View / Add / Edit / Delete Employees
- 🔍 Filter Employees by Name/Email/Position
- 🔍 Real-Time Search
- ✅ Alerts using Bootstrap
- 🎨 Sticky Footer and Responsive UI
- 🖼️ Bootstrap Icons for Actions

## 🛠️ Tech Stack

- Core PHP (No framework)
- MySQL Database
- Bootstrap 5
- XAMPP (Local Testing)

## 🗃️ Folder Structure

employee-management/
├── assets/
│ └── css/ (Bootstrap, custom.css)
├── db.php
├── index.php (Employee List)
├── add.php
├── edit.php
├── delete.php
├── includes/
│ ├── header.php
│ └── footer.php
└── README.md

### 🧱 Database Schema

**Table: `employees`**

| Field       | Type         | Constraints        |
|-------------|--------------|--------------------|
| `id`        | INT (AUTO_INCREMENT) | Primary Key   |
| `name`      | VARCHAR(255) | NOT NULL           |
| `email`     | VARCHAR(255) | UNIQUE, NOT NULL   |
| `phone`     | VARCHAR(20)  | NOT NULL           |
| `position`  | VARCHAR(100) | NOT NULL           |
| `created_at`| TIMESTAMP    | Default: NOW()     |