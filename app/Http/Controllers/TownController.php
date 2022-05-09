<?php

namespace App\Http\Controllers;

use App\Town;
use App\Http\Requests\TownUpdateRequest;
use App\Http\Requests\TownStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class TownController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = Town::paginate(15);
        return view('.towns.index', compact('towns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $town = new Town();
        return view('.towns.create', compact('town'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TownStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TownStoreRequest $request)
    {
        Town::create($request->except('_token'));
        return $this->success('Town added successfully!', 'towns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Town $town)
    {
        $previous = $town->where('id', '<', $town->id)->max('id');
        $next = $town->where('id', '>', $town->id)->min('id');

        return view('.towns.show', compact('town'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Town $town)
    {
        return view('.towns.edit', compact('town'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TownUpdateRequest  $request
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function update(TownUpdateRequest $request, Town $town)
    {
        $town->update($request->except('_token'));
        return $this->success('Town updated successfully!', 'towns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Town  $town
     * @return \Illuminate\Http\Response
     */
    public function destroy(Town $town)
    {
        $town->delete();
        return $this->success('Town deleted successfully!', 'towns.index');
    }
}
