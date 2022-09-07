<?php

namespace App\Repositories\Eloquent;

use App\Models\Channel;
use App\Repositories\Contracts\ChannelRepositoryInterface;

class ChannelRepository implements ChannelRepositoryInterface
{
    private $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function getAll()
    {
        return $this->channel->all();
    }

    public function getAllWithPivot()
    {
        return $this->channel->with('users')->get();
    }

    public function getUsers($id)
    {
        return $this->channel->find($id)->users;
    }
}
