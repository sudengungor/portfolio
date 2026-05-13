# 🚀 Full-Stack Web Portfolio Project

### 👤 Student Information

* **Name:** Sudenur Güngör
* **University:** Haliç University
* **Department:** Software Engineering 
* **Course:** Internet & Web Programming

---

## 🌟 Project Overview

This project is a dynamic, database-driven personal portfolio website designed to showcase professional skills and academic background. It bridges the gap between a static resume and a live application by featuring a secure **Administrative Dashboard** that allows for real-time content management without modifying the source code.

* **🌐 Live Demo:** [https://sudenurportfolio.infinityfreeapp.com](https://sudenurportfolio.infinityfreeapp.com)
* **💻 GitHub Repository:** [(https://www.google.com/search?q=https://github.com/sudengungor/portfolio](https://github.com/sudengungor/portfolio)

---

## 🛠️ Technical Stack

The project follows a modern Full-Stack architecture (LAMP stack principle):

* **🎨 Frontend:** HTML5 (Semantic tags), CSS3 (Custom Variables, Flexbox, Grid), and JavaScript (ES6+).
* **⚙️ Backend:** PHP 8.x handles server-side processing, routing, and session management.
* **🗄️ Database:** MySQL is used for persistent storage of projects and contact messages.
* **📱 Mobile Integration:** A Flutter module was developed to demonstrate cross-platform capability.
* **☁️ Hosting:** Managed via InfinityFree with automated SSL redirection.

---

## 💎 Detailed Features & Implementation

### 🔐 1. State Management & Admin Security

The administrative side is protected by **PHP Sessions**. When a login is successful, a session is initiated on the server. Every administrative script (add/delete) performs a top-level session check. If the session is invalid, the user is automatically redirected to the login page, ensuring that only the authorized owner can modify the portfolio.

### 📂 2. Dynamic Data & Fetch API

Instead of hard-coding projects, the site uses the **Fetch API** to send asynchronous requests to PHP endpoints. This allows the portfolio to load data and send contact form messages without a full page reload, providing a smooth, app-like user experience.

### 🛡️ 3. Security Enhancements

To ensure the application is production-ready, several security measures were implemented:

* **SQL Injection Prevention:** Used **MySQLi Prepared Statements** with `bind_param()` for all database operations.
* **XSS Protection:** Applied `htmlspecialchars()` to all outputs to prevent malicious script injection.

### 🌙 4. Advanced UI/UX

* **Dark Mode Persistence:** Implemented a theme switcher that utilizes `localStorage` to remember the user's preference across different sessions.
* **Responsive Design:** Utilized CSS Grid and Media Queries to ensure a jilet-sharp appearance on everything from mobile phones to wide-screen monitors.

---

## 📈 Development Journey

1. **Phase 1 (Database):** Architected the MySQL schema for `projects`, `messages`, and `admins` tables.
2. **Phase 2 (Backend):** Developed a centralized database connection script and secure CRUD handlers.
3. **Phase 3 (Frontend):** Built the responsive UI and integrated client-side validation for the contact form.
4. **Phase 4 (Deployment):** Configured the production environment on InfinityFree and successfully migrated the database.

---

## 🎯 Conclusion

This project demonstrates a comprehensive understanding of web technologies, from initial database design to final cloud deployment. It successfully fulfills all course requirements while standing as a professional asset for my future career in software engineering.
