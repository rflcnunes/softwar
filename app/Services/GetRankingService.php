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
        $ranking = [];

        $response = $this->channelRepository->getAllWithPivot();

       foreach ($response as $channel) {
        $userWatched = $channel->users;

        $ranking[] = $payload = [
            'channel' => $channel->name,
            '01' => [
                'user' => $userWatched[0]->name,
                'minutes_watched' => $userWatched[0]->pivot->minutes_watched,
            ],
            '02' => [
                'user' => $userWatched[1]->name,
                'minutes_watched' => $userWatched[1]->pivot->minutes_watched,
            ],
            '03' => [
                'user' => $userWatched[2]->name,
                'minutes_watched' => $userWatched[2]->pivot->minutes_watched,
            ],
            'minutes_watched_in_channel' => $channel->users->sum('pivot.minutes_watched'),
        ];
       }
        

        return [
            'GetRankingService' => [
                'data' => $ranking,
            ],
        ];
    }
}