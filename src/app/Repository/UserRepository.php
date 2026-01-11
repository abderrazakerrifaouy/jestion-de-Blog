<?php

namespace App\Repository;

use App\Core\Database;

class UserRepository
{
    private $pdo;
    private static $UserRepository;
    private function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public static function getRepository()
    {
        if (self::$UserRepository === null) {
            self::$UserRepository = new self();
        }
        return self::$UserRepository;
    }

    public function register(
        $firstName,
        $lastName,
        $email,
        $password,
        $role
    ) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (firstName, lastName, email, pass, role)
            VALUES (:firstName, :lastName, :email, :pass, :role)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $passwordHash);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['pass'])) {
            return $user;
        }
        return false;
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users WHERE role != 'admin'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    public function getUserBysId($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user ;
    }
    public function chengeRoleUser($idUser){
        $sql = "UPDATE users SET role = 'author' WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $idUser);
        return $stmt->execute();
    }

    public function getUsersWithRoleChangeRequests()
    {
        $sql = "SELECT u.*, dcr.content AS requestContent
                FROM users u
                JOIN dommendchengesRole dcr ON u.id = dcr.idUser
                WHERE u.role != 'admin'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    public function submitRoleChangeRequest($idUser, $content)
    {
        $sql = "INSERT INTO dommendchengesRole (idUser, content) VALUES (:idUser, :content)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }
    public function deleteRoleChangeRequest($idUser)
    {
        $sql = "DELETE FROM dommendchengesRole WHERE idUser = :idUser";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idUser', $idUser);
        return $stmt->execute();
    }
    public function delete($idUser)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $idUser);
        return $stmt->execute();
    }
}