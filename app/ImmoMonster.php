<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ImmoMonster extends Model
{
    /**
     * 获取该地图的一只怪物
     * @param int $mapId
     * @return int
     */
    static function getMonsterID (int $mapId = -1) {
        if ($mapId < 0){
            $mapId = Redis::get(Auth::id() . 'mapId');
            if (!$mapId && $mapId != 0)
                return;
        }
        $monster = [
            [0, 1],
            [2],
        ];
        $max = count($monster[$mapId]) - 1;
        $monsterId = $monster[$mapId][rand(0, $max)];
        if (Auth::id()) {
            Redis::set(Auth::id() . 'monster', $monsterId);
        }

        return $monsterId;
    }

    /**
     * 更新 Redis 存储的怪物数据
     */
    function refreshRedis () {
        //
    }
}
