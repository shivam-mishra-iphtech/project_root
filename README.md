

<p align="center">
  <img src="https://www.php.net/images/logos/new-php-logo.svg" width="100" alt="PHP Logo">
</p>

<h2 align="center">Core PHP MVC User Authentication System</h2>

<p align="center">
  Lightweight, secure, and fast user registration & login/logout system using Core PHP (7.1.0) with MVC architecture.
</p>

---

## 🚀 Features
- 📝 User Registration
- 🔐 Secure Login & Logout
- 🔑 Password Hashing (BCRYPT)
- 🎯 Clean MVC Structure
- ⚙️ PHP 7.1.0 Compatible
- 📂 Simple & Extendable

---

## 📂 Quick Structure
```
/app
 ├── controllers (AuthController.php)
 ├── models (User.php)
 ├── views (login.php, register.php)
 └── core (Database.php)
 
/public (index.php)
.htaccess
README.md
```

---

## 🛠️ Setup Guide

1. **Database Table:**

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

2. **Configure DB:**  
Edit `/app/core/Database.php` with your DB credentials.

3. **Run:**

- Register → `/public/register`
- Login → `/public/login`
- Logout → `/public/logout`

---

## 📽️ Demo Video

▶️ [Watch Full Demo](https://www.loom.com/share/7765ebcc51904e2eaf7e79d3660bb06f?sid=b5669543-5781-4594-8b2e-3ffb0ac04ba2)



