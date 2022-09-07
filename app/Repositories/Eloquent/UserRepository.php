<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function getAll()
    {
        return $this->user->all();
    }

    public function getAllWithPivot()
    {
        return $this->user->with('channels')->get();
    }
}
