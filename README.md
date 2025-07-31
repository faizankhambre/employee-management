# 🧑‍💼 Employee Management System (EMS)

**Project Name:** Employee Management System  
**Developer:** Faizan Khambre  
**Tech Stack:** PHP 8.2, MySQL, Bootstrap 5  

A simple and responsive Employee Management System built using **Core PHP**, **MySQL**, and **Bootstrap 5**.

## 🚀 How to run project locally

- ✅ After cloning the repo from Git.
- ✅ Put the app/project under htdocs folder where your XAMMP Server is installed.
- ✅ Turn ON your Apache & MySQL then configure db.php in config folder of the project.
- ✅ Run the SQL script employees.sql it will create the required database and table with sample records.
- ✅ Test the App at http://localhost/employee-management/index.php

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