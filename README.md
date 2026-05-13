# 🚀 Sudenur Güngör - Personal Portfolio Project

A modern, responsive, and dynamic web portfolio developed for the **Haliç University Software Engineering** program. This project features a full-stack architecture with a dedicated administrative dashboard for content management.

## 🔗 Live Demo

You can access the live version of the project via the link below:

**[👉 Click Here for Live Demo]([http://sudenurportfolio.infinityfreeapp.com](https://sudenurportfolio.infinityfreeapp.com/))**

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3 (Custom Variables, Flexbox, Grid), JavaScript (Vanilla JS, Fetch API)
* **Backend:** PHP (MySQLi, Session Management)
* **Database:** MySQL
* **Version Control:** Git & GitHub

## ✨ Key Features

* **Dynamic Content Management:** Add or delete projects in real-time via a secure Admin Dashboard.
* **Asynchronous Interactions:** Implemented `Fetch API` for contact form submissions and project loading to ensure a seamless UI/UX without page refreshes.
* **Security First:** Robust protection against SQL Injection using `Prepared Statements`. Unauthorized access is prevented via server-side `Session` validation.
* **Dark Mode Persistence:** Integrated theme switching that remembers user preference using `localStorage`.
* **Clean Architecture:** Organized directory structure separating assets (CSS/JS) from business logic (PHP).

## 📂 Project Structure

```text
├── assets/             # CSS stylesheets and JavaScript files
├── php/                # Database connection and CRUD logic
├── images/             # Media assets and profile photos
├── index.php           # Public-facing portfolio (Home)
├── admin_dashboard.php # Administrative control panel
├── login.php           # Secure login interface
└── portfolio_db.sql    # Database schema export

```

## ⚙️ Installation & Setup

1. Clone the repository to your local machine.
2. Import `portfolio_db.sql` into your `phpMyAdmin` or MySQL server.
3. Configure your database credentials in `php/database_connection.php`.
4. Run the project using a local PHP server environment (XAMPP, WAMP, etc.).
