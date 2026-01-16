# Leave Application Management System

## 📌 Project Overview
The Leave Application Management System is a web-based application designed to simplify and digitalise the leave application process within an organisation. It allows staff to apply for leave anytime and anywhere, while enabling managers and admins to efficiently monitor, manage, and approve leave requests.

The system supports three user roles: **Admin**, **Manager**, and **Staff**, each with distinct functionalities.

---

## ✨ Features

### 👨‍💼 Admin
- Add, edit, and delete users (staff & managers)
- View total employees, staff, and managers
- Monitor pending and approved leave applications
- Maintain an up-to-date user database
- Track leave application status

### 🧑‍💼 Manager
- Approve or reject staff leave applications
- View pending, approved, and total leave applications
- Sort applications by date or alphabetical order
- View system statistics and reports
- Update personal profile information

### 👩‍💻 Staff
- Apply for leave online
- View leave application history and status
- Cancel pending leave applications
- View remaining leave quota
- Update personal profile information

---

## 🛠 Tools & Technologies
- **HTML** – Structure and layout of web pages  
- **CSS** – Styling and UI design  
- **JavaScript** – Client-side interactivity  
- **PHP** – Server-side logic and form handling  
- **MySQL** – Database management  
- **Sessions & Cookies** – Authentication and user state management  

---

## 🧠 Additional Functionalities
- **Session Management** to differentiate user roles
- **Cookies (Remember Me)** feature for login convenience
- Role-based access control
- Sorting and filtering of leave records

---

## 🗄 Database Design
**Database Name:** `simpleleavedb`

### Tables:
- `users` – Stores user and employee information
- `leaves` – Stores leave application details and status
- `department` – Stores department information
- `admin` – Stores admin login credentials

---

## ▶ How to Run the Project
1. Install **XAMPP / WAMP**
2. Import the database (`simpleleavedb`) into MySQL
3. Place the project folder inside the `htdocs` directory
4. Start Apache and MySQL services
5. Access the system via browser (e.g. `http://localhost/project-folder`)

---

## 🔐 Test Accounts

### Admin
- Email: `admin@gamail.com`
- Password: `admin1234`

### Manager
- Email: `ikmal@gmail.com`
- Password: `ikmal1234`

### Staff
- Email: `aisyah@gmail.com`
- Password: `aisyah1234`

---

## 👥 Contributors
- Muhammad Amsyar Bin Ibrahim  
- Muhammad Nur Solihin Bin Malik Radzuan  
- Norain Binti Mohd Sulaiman  
- Safura Balqis Binti Azman  

---

## ✅ Conclusion
This system successfully streamlines the leave application process by providing an efficient, user-friendly, and role-based platform that improves accessibility, management, and organisational workflow.
