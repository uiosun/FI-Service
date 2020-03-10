<?php

namespace App\Http\Controllers;


use App\CitySaved;
use App\ImmoMonster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Jenssegers\Agent\Facades\Agent;
use phpDocumentor\Reflection\Types\Integer;

class ImmortalizeController extends Controller
{
    // 玩家数值：ID、昵称、修为、
    // 门派数值：地底灵脉级别（0.5）、藏经阁的经书 IDs（12|52|5）
    /**
     * 玩家切换位置
     * @param Request $request
     */
    function setMapPath (Request $request) {
        // 校验位置
        // 更新缓存的位置、时间
        // 若处于战斗位置，返回怪物，否则返回相关信息
    }

    /**
     * 上报战斗结果，并获取下一个怪物
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function getNextMonster (Request $request) {
        // 上报内容：地图 ID、怪物 ID、单局战斗总伤害、平均每次攻击伤害、单局怪物击杀数量、单局Boss击杀数量、获取收益和修为值、战斗耗时
        // 校验新旧战斗数据
            // 有问题，报警并终止本收益录入
            // 确认收益
//        if ($request->settle === 0) {}
        // 返回新怪物
        $monsterId = ImmoMonster::getMonsterID();
        if (Auth::id()) {
            Redis::set(Auth::id() . 'monster', $monsterId);
        }

        return response()->json($monsterId, 201);
    }

    /**
     * 装备/使用一件物品
     *
     * @param Request $request
     */
    function useGoods (Request $request) {
        // 确认物品存在
        // 上装物品，更新数值
        // 返回结果
    }

    /**
     * 尝试晋级
     *
     * @param Request $request
     */
    function upLevel (Request $request) {
        $levelRate = [
            [1, 0.9, 0.8],
            [1, 0.9, 0.8],
            [1, 0.9, 0.8],
            [1, 0.9, 0.8],
            [1, 0.9, 0.8],
        ];
        // 随机结果
        // 更新修为值
        // 返回结果
    }

    /**
     * 获取一个怪物
     *
     * @param int $mapID
     */
    protected function getMonster (int $mapID) {
        // 确认地图
        // 获取新的怪物
    }
}
