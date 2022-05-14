<?php

namespace App\Repository;

use App\Interfaces\RepositoryInterface;
use App\User;

class UserRepository extends RepositoryInterface
{
    public function __construct(User $user)
    {
        $this->entity = $user;
    }
}