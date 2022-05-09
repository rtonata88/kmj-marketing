<?php

namespace App\Http\Controllers;

use App\Region;
use App\Http\Requests\RegionUpdateRequest;
use App\Http\Requests\RegionStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class RegionController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::paginate(15);
        return view('.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = new Region();
        return view('.regions.create', compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionStoreRequest $request)
    {
        Region::create($request->except('_token'));
        return $this->success('Region added successfully!', 'regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Region $region)
    {
        $previous = $region->where('id', '<', $region->id)->max('id');
        $next = $region->where('id', '>', $region->id)->min('id');

        return view('.regions.show', compact('region'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Region $region)
    {
        return view('.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RegionUpdateRequest  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionUpdateRequest $request, Region $region)
    {
        $region->update($request->except('_token'));
        return $this->success('Region updated successfully!', 'regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return $this->success('Region deleted successfully!', 'regions.index');
    }
}
