<?php

require_once("Database.class.php");
require_once("GetData.class.php");

class Login extends GetData
{
    private $pdo;
    public $message;
    // Connect to database
    public function __construct(Database $pdo)
    {
        $this->pdo = $pdo;
    }
    // Login
    public function Login($username, $password)
    {
        // Htmlspecialchars the username and password
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        // Check if username and password are not empty
        if (!empty($username) && !empty($password)) {
            // Check if user exists
            $sql = "SELECT * FROM User WHERE user_name = :username";
            $stmt = $this->pdo->prepare($sql, [':username' => $username]);
            $user = $stmt->fetch();
            // Check if password is correct
            if ($user && password_verify($password, $user['user_password'])) {
                if ($user['user_type'] == "admin") {
                    session_start();
                    $_SESSION['admin'] = $user['user_type'];
                    $_SESSION['user_name'] = $user['user_name'];
                    header("Location: ../Admin/Home.php");
                } else {
                    session_start();
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_name'] = $user['user_name'];
                    header("Location: ../Pages/Home.php");
                }
            } else {
                $this->message = "Incorrect username or password";
                return $this->message;
            }
        } else {
            $this->message = "Please fill in all fields";
            return $this->message;
        }
    }
    // Register
    public function Register($username, $password, $email)
    {
        // Htmlspecialchars the username, password and email
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);
        // Check if username, password and email are not empty
        if (!empty($username) && !empty($password) && !empty($email)) {
            // Check if user already exists
            $sql = "INSERT INTO User (user_name, user_password, user_email) VALUES (:username, :password, :email)";
            $password = password_hash($password, PASSWORD_BCRYPT);
            $data = [':username' => $username, ':password' => $password, ':email' => $email];
            // Prepare and execute the SQL statement
            try {
                $stmt = $this->pdo->prepare($sql, $data);
            } catch (PDOException $e) {
                $this->message = "The user already exists";
                return $this->message;
            }
            $this->message = "You are registered successfully";
            return $this->message;
        } else {
            $this->message = "You need to fill in everything!";
            return $this->message;
        }
    }
}
