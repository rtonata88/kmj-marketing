<?php

namespace App\Http\Controllers;

use App\StageReward;
use App\Http\Requests\StageRewardUpdateRequest;
use App\Http\Requests\StageRewardStoreRequest;
use App\Stage;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class StageRewardController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stageRewards = StageReward::paginate(15);
        return view('.stage-rewards.index', compact('stageRewards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stageReward = new StageReward();

        $stages = Stage::pluck('name', 'id');

        return view('.stage-rewards.create', compact('stageReward', 'stages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StageRewardStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRewardStoreRequest $request)
    {
        StageReward::create($request->except('_token'));
        return $this->success('Stage Reward added successfully!', 'stage-rewards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StageReward  $stageReward
     * @return \Illuminate\Http\Response
     */
    public function show(\App\StageReward $stageReward)
    {
        $previous = $stageReward->where('id', '<', $stageReward->id)->max('id');
        $next = $stageReward->where('id', '>', $stageReward->id)->min('id');

        return view('.stage-rewards.show', compact('stageReward'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StageReward  $stageReward
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\StageReward $stageReward)
    {
        $stages = Stage::pluck('name', 'id');

        return view('.stage-rewards.edit', compact('stageReward', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StageRewardUpdateRequest  $request
     * @param  \App\StageReward  $stageReward
     * @return \Illuminate\Http\Response
     */
    public function update(StageRewardUpdateRequest $request, StageReward $stageReward)
    {
        $stageReward->update($request->except('_token'));
        return $this->success('Stage Reward updated successfully!', 'stage-rewards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StageReward  $stageReward
     * @return \Illuminate\Http\Response
     */
    public function destroy(StageReward $stageReward)
    {
        $stageReward->delete();
        return $this->success('Stage Reward deleted successfully!', 'stage-rewards.index');
    }
}
