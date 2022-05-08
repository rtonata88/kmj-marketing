<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\CountryUpdateRequest;
use App\Http\Requests\CountryStoreRequest;
use Illuminate\Routing\Controller;

class CountryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(15);
        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = new Country();
        return view('.countries.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CountryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->except('_token'));
        return $this->success('Country added successfully!', 'countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Country $country)
    {
        $previous = $country->where('id', '<', $country->id)->max('id');
        $next = $country->where('id', '>', $country->id)->min('id');

        return view('.countries.show', compact('country'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Country $country)
    {
        return view('.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CountryUpdateRequest  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryUpdateRequest $request, Country $country)
    {
        $country->update($request->except('_token'));
        return $this->success('Country updated successfully!', 'countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return $this->success('Country deleted successfully!', 'countries.index');
    }
}
