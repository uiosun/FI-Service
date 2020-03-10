<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ImmoMap extends Model
{
    const TYPE_SAFE = 1;  // 是安全区？
    const TYPE_HAS_EVENT = 2;  // 有突发事件？

    static function setMap ($mapId) {
        Redis::set(Auth::id() . 'mapId', $mapId);
    }
}
