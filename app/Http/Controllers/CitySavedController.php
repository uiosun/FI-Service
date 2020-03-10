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
        if ($saveData !== null) {
            $saveData->update($request->all());
        }

        return $saveData;
    }

    /**
     * 获取签到收益清单
     * 清单：是否已签到、本日签到收益、连签第 7 日的本周收益、连签第 30 日的本月收益
     * 逻辑简述：周三开始签到，到下周二达到 7 日连签，搜索下周日的 7 日签到收益
     * @return string
     */
    public function getGiftList ()
    {
        $result = null;

        return $result;
    }

    /**
     * 获取签到收益清单
     * 清单：本日签到收益、连签第 7 日的本周收益、连签第 30 日的本月收益
     * @return string
     */
    public function setGift ()
    {
        $result = null;

        return $result;
    }

    /**
     * 检查版本号，待实现
     * @param Request $request
     * @return string
     */
    public function checkVersion (Request $request)
    {
        return 'hello World!';
    }
}
