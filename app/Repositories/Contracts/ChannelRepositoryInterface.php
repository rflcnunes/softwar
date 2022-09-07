<?php

namespace App\Repositories\Contracts;

interface ChannelRepositoryInterface
{
    public function getAll();
    public function getAllWithPivot();
    public function getUsers($id);
}