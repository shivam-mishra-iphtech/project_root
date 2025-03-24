
<p align="center">
  <img src="https://www.php.net/images/logos/new-php-logo.svg" width="100" alt="PHP Logo">
</p>

<h2 align="center">Core PHP MVC User Authentication System</h2>

---

## 🔑 Features
- User Registration
- Secure Login & Logout (Session-based)
- Password Hashing
- Follows MVC Architecture
- PHP 7.1.0 Compatible

---

## 📂 Structure
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

## 🛠️ Setup

1. **Database Table:**
```sql
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50),
  `email` VARCHAR(100) UNIQUE,
  `password` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

2. **Update DB Credentials:**  
`/app/core/Database.php`

3. **Access:**
- Register → `/public/register`
- Login → `/public/login`
- Logout → `/public/logout`

---

## 📽️ Demo

[Watch Demo Video](https://www.loom.com/share/7765ebcc51904e2eaf7e79d3660bb06f?sid=b5669543-5781-4594-8b2e-3ffb0ac04ba2)

---
