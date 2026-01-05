<?php

namespace App\Models;

abstract class User {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;  
    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email
    ){

    }
}
