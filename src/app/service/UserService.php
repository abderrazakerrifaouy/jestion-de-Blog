<?php
namespace App\Service;
use App\Repository\UserRepository;
use App\Models\Reader;
use App\Models\Admin;
use App\Models\Author;

class UserService
{
    private static $userService = null;
    private $userRepository;
    private function __construct()
    {
        $this->userRepository = UserRepository::getRepository();
    }
    public static function getService()
    {
        if (self::$userService === null) {
            self::$userService = new self();
        }
        return self::$userService;
    }

    public function register( $firstName, $lastName, $email, $password, $validePassword
    ) {
        $role = 'READER';

        if ($password !== $validePassword) {
            return false;
        }

        return $this->userRepository->register(
            $firstName,
            $lastName,
            $email,
            $password,
            $role
        );
    }

    public function login($email, $password)
    {
        $userData = $this->userRepository->login($email, $password);

        if ($userData) {

            if ($userData['role'] === 'READER') {
                $user = new Reader(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );
                $_SESSION['role'] = 'reader';

            } elseif ($userData['role'] === 'ADMIN') {
                $user = new Admin(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );
                $_SESSION['role'] = 'admin';

            } elseif ($userData['role'] === 'AUTHOR') {
                $user = new Author(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );
                $_SESSION['role'] = 'author';
            }

            $_SESSION['id'] = $user->getId();
            return true;
        }

        return false;
    }
    public function logAout()
    {
        session_destroy();
        header("Location: /");
        exit;
    }
    public function getMemperUsers(){
        $users =  $this->userRepository->getAllUsers() ;
        return count($users);
    }
    public function getUserById($id){
        $userData = $this->userRepository->getUserBysId($id);
        if ($userData) {

            if ($userData['role'] === 'READER') {
                $user = new Reader(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );

            } elseif ($userData['role'] === 'ADMIN') {
                $user = new Admin(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );

            } elseif ($userData['role'] === 'AUTHOR') {
                $user = new Author(
                    $userData['id'],
                    $userData['firstName'],
                    $userData['lastName'],
                    $userData['email']
                );
            }

            return $user;
        }
    }
    public function chengeRoleUser($idUser){
        $this->userRepository->chengeRoleUser($idUser);
        $this->userRepository->deleteRoleChangeRequest($idUser);
        return true ;
    }
    public function deleteRoleChangeRequest($idUser){
        return $this->userRepository->deleteRoleChangeRequest($idUser);
    }
    public function getUsersWithRoleChangeRequests(){
        $usersData = $this->userRepository->getUsersWithRoleChangeRequests();
        return $usersData ;
    }
    public function createUsersWithRoleChangeRequests($idUser, $content){
        return $this->userRepository->submitRoleChangeRequest($idUser, $content);
    }
}