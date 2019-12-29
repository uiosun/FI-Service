<?php

namespace App\Http\Controllers;

use App\CitySaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitySavedController extends Controller
{
    public function index ()
    {
        $saveData = CitySaved::find(Auth::id());

        return response()->json([
            'save' => $saveData,
        ]);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|unique:city_saveds',
            'ver' => 'required|string|max:7',
            'jsonString' => 'required|json',
        ], [],
            [
                'id' => '存档 ID',
                'ver' => '版本号',
                'jsonString' => '存档数据',
            ]
        );

        $saveData = CitySaved::create($request->all());

        return response()->json([
            'save' => $saveData,
        ]);
    }

    public function update (Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'ver' => 'required|string|max:7',
            'jsonString' => 'required|json',
        ], [],
            [
                'id' => '存档 ID',
                'ver' => '版本号',
                'jsonString' => '存档数据',
            ]
        );

        $saveData = CitySaved::find(Auth::id());
        $saveData->update($request->all());

        return $saveData;
    }
}
