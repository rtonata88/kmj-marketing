<?php

namespace App\Http\Controllers;

use App\Stage;
use App\Http\Requests\StageUpdateRequest;
use App\Http\Requests\StageStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class StageController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::paginate(15);
        return view('.stages.index', compact('stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stage = new Stage();
        return view('.stages.create', compact('stage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StageStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageStoreRequest $request)
    {
        Stage::create($request->except('_token'));
        return $this->success('Stage added successfully!', 'stages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Stage $stage)
    {
        $previous = $stage->where('id', '<', $stage->id)->max('id');
        $next = $stage->where('id', '>', $stage->id)->min('id');

        return view('.stages.show', compact('stage'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Stage $stage)
    {
        return view('.stages.edit', compact('stage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StageUpdateRequest  $request
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(StageUpdateRequest $request, Stage $stage)
    {
        $stage->update($request->except('_token'));
        return $this->success('Stage updated successfully!', 'stages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
        $stage->delete();
        return $this->success('Stage deleted successfully!', 'stages.index');
    }
}
