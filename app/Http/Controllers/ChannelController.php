<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Repositories\Contracts\ChannelRepositoryInterface;
use App\Services\GetRankingService;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    private $channelRepository;

    public function __construct(ChannelRepositoryInterface $channelRepository, GetRankingService $getRankingService)
    {
        $this->channelRepository = $channelRepository;
        $this->getRankingService = $getRankingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->channelRepository->getAllWithPivot();

        return new ApiResponse(true, 'List of Channels', $response, 200);
    }

    public function getRankingByMinutesWatched()
    {
        $response = $this->getRankingService->getRanking();

        return new ApiResponse(true, 'Ranking Channels by minutes watched', $response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
