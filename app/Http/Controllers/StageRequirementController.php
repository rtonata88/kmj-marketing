<?php

namespace App\Http\Controllers;

use App\StageRequirement;
use App\Http\Requests\StageRequirementUpdateRequest;
use App\Http\Requests\StageRequirementStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class StageRequirementController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stageRequirements = StageRequirement::paginate(15);
        return view('.stage-requirements.index', compact('stageRequirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stageRequirement = new StageRequirement();
        return view('.stage-requirements.create', compact('stageRequirement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StageRequirementStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequirementStoreRequest $request)
    {
        StageRequirement::create($request->except('_token'));
        return $this->success('Stage Requirement added successfully!', 'stage-requirements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StageRequirement  $stageRequirement
     * @return \Illuminate\Http\Response
     */
    public function show(\App\StageRequirement $stageRequirement)
    {
        $previous = $stageRequirement->where('id', '<', $stageRequirement->id)->max('id');
        $next = $stageRequirement->where('id', '>', $stageRequirement->id)->min('id');

        return view('.stage-requirements.show', compact('stageRequirement'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StageRequirement  $stageRequirement
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\StageRequirement $stageRequirement)
    {
        return view('.stage-requirements.edit', compact('stageRequirement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StageRequirementUpdateRequest  $request
     * @param  \App\StageRequirement  $stageRequirement
     * @return \Illuminate\Http\Response
     */
    public function update(StageRequirementUpdateRequest $request, StageRequirement $stageRequirement)
    {
        $stageRequirement->update($request->except('_token'));
        return $this->success('Stage Requirement updated successfully!', 'stage-requirements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StageRequirement  $stageRequirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(StageRequirement $stageRequirement)
    {
        $stageRequirement->delete();
        return $this->success('Stage Requirement deleted successfully!', 'stage-requirements.index');
    }
}
