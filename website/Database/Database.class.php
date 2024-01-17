<?php

class Database
{
    protected $pdo;
    public $message;

    public function __construct(
        string $servername = "localhost",
        string $db = "mu",
        string $username = "root",
        string $password = "Zinedine020"
    ) {
        $this->pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function query(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->query($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function Profile($id, $data = [], $params = [])
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE User SET $data WHERE user_id = $id");
            $stmt->execute($params);
            header("Location: ../Pages/Login.php");
        } catch (PDOException) {
            $this->message = "The user already exists";
            return $this->message;
        }
    }
}