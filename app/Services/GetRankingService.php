<?php

namespace App\Services;

use App\Repositories\Contracts\ChannelRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class GetRankingService
{
    private $channelRepository;
    private $userRepository;

    public function __construct(ChannelRepositoryInterface $channelRepository, UserRepositoryInterface $userRepository)
    {
        $this->channelRepository = $channelRepository;
        $this->userRepository = $userRepository;
    }

    public function getRanking()
    {
        $channels = $this->channelRepository->getAllWithPivot();

        $ranking = [];

        foreach ($channels as $channel) {

            $ranking[$channel->name] = $channel->users->sum('pivot.minutes_watched');

        }

        arsort($ranking);

        return $ranking;
    }
}