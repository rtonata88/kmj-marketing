<?php

namespace App\Http\Controllers;

use App\OtherSetting;
use App\Http\Requests\OtherSettingUpdateRequest;
use App\Http\Requests\OtherSettingStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class OtherSettingController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherSettings = OtherSetting::paginate(15);
        return view('.other-settings.index', compact('otherSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $otherSetting = new OtherSetting();
        return view('.other-settings.create', compact('otherSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OtherSettingStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtherSettingStoreRequest $request)
    {
        OtherSetting::create($request->except('_token'));
        return $this->success('Other Setting added successfully!', 'other-settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function show(\App\OtherSetting $otherSetting)
    {
        $previous = $otherSetting->where('id', '<', $otherSetting->id)->max('id');
        $next = $otherSetting->where('id', '>', $otherSetting->id)->min('id');

        return view('.other-settings.show', compact('otherSetting'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\OtherSetting $otherSetting)
    {
        return view('.other-settings.edit', compact('otherSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OtherSettingUpdateRequest  $request
     * @param  \App\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function update(OtherSettingUpdateRequest $request, OtherSetting $otherSetting)
    {
        $otherSetting->update($request->except('_token'));
        return $this->success('Other Setting updated successfully!', 'other-settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherSetting $otherSetting)
    {
        $otherSetting->delete();
        return $this->success('Other Setting deleted successfully!', 'other-settings.index');
    }
}
