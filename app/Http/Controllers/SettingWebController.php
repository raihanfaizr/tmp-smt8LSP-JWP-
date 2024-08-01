<?php

namespace App\Http\Controllers;

use App\Models\SettingWeb;
use App\Http\Requests\StoreSettingWebRequest;
use App\Http\Requests\UpdateSettingWebRequest;

class SettingWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingWeb = SettingWeb::where('id', 1)->first();
        $data = [
            'settingWeb' => $settingWeb
        ];
        return view('admin.setting-web')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingWebRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SettingWeb $settingWeb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SettingWeb $settingWeb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingWebRequest $request, SettingWeb $settingWeb)
    {
        $request->validate([
            'contact' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'maps' => 'required'
        ]);

        SettingWeb::updateOrCreate(
            ['id' => $settingWeb->id],
            [
                'contact' => $request->contact,
                'email' => $request->email,
                'instagram' => $request->instagram,
                'instagram' => $request->instagram,
                'maps' => $request->maps,
            ]
        );

        session()->flash('success', 'Data berhasil diubah');
        return redirect('/admin/setting-web/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingWeb $settingWeb)
    {
        //
    }
}
