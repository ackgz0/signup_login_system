# Signup and Login System #

## Overview

This is a simple signup and login system built using PHP and MySQL. The system allows users to create an account, log in, and log out. It includes basic error handling, session management, and form validation.

## Features

- **User Signup:** Allows new users to create an account with a username and password.
- **User Login:** Allows registered users to log in using their credentials.
- **User Logout:** Provides a way for users to securely log out of the system.
- **Form Validation:** Basic validation for empty fields and incorrect login details.
- **Session Management:** Secure session handling with periodic session ID regeneration.

## Installation

### Prerequisites

- A web server with PHP support (e.g., Apache)
- MySQL database
- PHP version 7.4 or higher

### Setup

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/signup-login-system.git
   cd signup-login-system

2. **Create a Database**
Create a new database in MySQL or MariaDB and import the provided SQL schema.

```
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
pwd VARCHAR(255) NOT NULL
);
```

3. **Configure Database Connection**

Edit the includes/dbh.inc.php file to include your database connection details.

```
<?php
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_database_user';
$pass = 'your_database_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
```

4. **Update Session Configuration**

Edit the includes/config_session.inc.php file to suit your server configuration, especially the session cookie settings.

```
<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();
?>
```
Adjust session settings according to your server's requirements, particularly the cookie parameters.

5. **Set Up Web Server**

Ensure your web server is configured to serve the PHP files and point to the root directory of your project.

**Usage**

1. Access the Application

Open your web browser and navigate to the URL where the application is hosted (e.g., http://localhost/signup-login-system).

2. Signup

-Go to the signup section.
-Enter a username and password.
-Click the "Signup" button to create a new account.

3. Login

-Go to the login section.
-Enter your username and password.
-Click the "Login" button to access your account.

4. Logout

-Click the "Logout" button to end your session.

**Error Handling**

*Login Errors:* If login details are incorrect or fields are empty, appropriate error messages will be displayed.
*Signup Errors:* Any issues during signup (e.g., username already exists) will be shown to the user.

**Security Notes**

*Password Storage:* Passwords are hashed using PHP’s password_hash function for security.
*Session Management:* Sessions are managed securely with periodic regeneration of session IDs to prevent fixation attacks.
