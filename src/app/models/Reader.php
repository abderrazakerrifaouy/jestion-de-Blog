<?php

namespace App\Models;
use App\Models\User;
class Reader extends User {

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email
    ) {
        parent::__construct($id, $firstName, $lastName, $email);
    }
}