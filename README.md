<p align="center">
  <b>Student Information System</b><br>
  A role-based student management platform built with .NET for education institutions.
</p>

---

## 🎓 About Student Information System

The **Student Information System** is a web-based platform designed to simplify the management of student data in an academic setting. Developed by Grace Tan & Tan Zhi Quan, it enables administrators to manage students, courses, grades, and attendance efficiently. It also allows students to view their academic progress in a clear and structured manner.

---

## ✨ Features

- 🔐 Secure login for admins and students
- 👨‍🎓 Full student data management (CRUD)
- 📚 Course management module
- 🧾 Grade and attendance tracking per student
- 🔎 Intuitive UI for both admins and students
- 🧩 Modular system: student, course, and student-course modules

---

## 👥 Roles & Permissions

| Role       | Permissions                                              |
|------------|----------------------------------------------------------|
| **Admin**  | Create, read, update, and delete students and courses. Assign grades and attendance. |
| **Student**| View personal info, courses enrolled, grades, and attendance. |

---

### 🔐 Login Page
![Login Page](<img width="1572" height="1225" alt="image" src="https://github.com/user-attachments/assets/ec126e9f-3a7c-4f8f-88bb-41fba4a6ab79" />)
- Secure login for both admin and student users.

### 🏠 Student Homepage
<img width="1622" height="1016" alt="image" src="https://github.com/user-attachments/assets/6c75912c-4d02-42f6-897d-9674d6afa450" />
- View personal profile, courses enrolled, grades, and attendance.

---

### 🧑‍💼 Admin Homepage
<img width="2175" height="1044" alt="image" src="https://github.com/user-attachments/assets/6299a45f-4383-4803-8401-f4f569bf6f31" />
- Overview of all modules and quick access to student/course management.

---

## 📁 Student Module
<img width="1832" height="563" alt="image" src="https://github.com/user-attachments/assets/59766015-4070-45b4-ba54-c99a44d1cb90" />

- **Student List**
<img width="1832" height="563" alt="image" src="https://github.com/user-attachments/assets/e76edd68-9d79-4461-adac-0343259977c6" />
  Admins can create, view, update, and delete student records.
  
- **Add Student**
<img width="1652" height="1075" alt="image" src="https://github.com/user-attachments/assets/db58c0d8-4479-49ef-8680-1d38b4c088c6" />
<img width="1990" height="750" alt="image" src="https://github.com/user-attachments/assets/cc92870f-1f73-4121-9c99-103fc7f33606" />
  Input full student details and save.

- **Edit Student**

<img width="1632" height="1075" alt="image" src="https://github.com/user-attachments/assets/57b30439-f2c8-4f68-b78c-9db9bc03f8f4" />
<img width="2163" height="810" alt="image" src="https://github.com/user-attachments/assets/dbf69ad0-8801-403b-8079-50eb76b60646" />
  Update existing student details.

- **Delete Student**
  <img width="1646" height="679" alt="image" src="https://github.com/user-attachments/assets/bc9eaea7-06e4-464b-bca5-ce53a1335706" />
<img width="2170" height="698" alt="image" src="https://github.com/user-attachments/assets/546ca4f9-ac26-4c90-92df-bd318989b0e0" />
  Remove student records from the system.

---

## 📚 Course Module

- **Course List**  
  Admins can create, view, update, and delete course records.

- **Add Course**  
  Input course name, code, and description.

- **Edit Course**  
  Modify existing course info.

- **Delete Course**  
  Remove course entries.

---

## 🧾 Student-Course Module

- **Student Course List**  
  View all courses enrolled by each student.

- **Assign Course to Student**  
  Append a course to a student record and add grades/attendance.

- **Update Student Course Info**  
  Modify existing course assignments and grades.

- **Delete Course from Student**  
  Remove course enrollment from student profile.

---

## 🛠️ Tech Stack

- ASP.NET (MVC)
- Entity Framework
- SQL Server Database
- HTML, CSS, JavaScript
- Visual Studio

---

## 🚀 How to Run Locally

1. Clone the repo:
   ```bash
   git clone https://github.com/yourusername/student-information-system.git
2. **Copy to XAMPP directory**
   ```bash
   Move the folder to: C:\xampp\htdocs\
3. **Set up the database**
   ```bash
   - Import database.sql file via phpMyAdmin
   - Create database with the same name used in your config.php

4. Install dependencies
   ```bash
   - composer install

5. Start the server
    ```bash
    - Launch XAMPP
    - Start Apache and MySQL
    - Visit http://localhost/student-information-system/ in your browser

---

📬 Contact
For questions or feedback, please open an issue or contact us via GitHub.
