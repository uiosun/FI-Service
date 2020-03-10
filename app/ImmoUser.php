<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ImmoUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'mapId', 'name', 'money',
    ];

    static function createNew () {
        $model = ImmoUser::create([
            'id' => Auth::id(),
            'name' => '萌新' . time(),
            'mapId' => 0,
            'money' => rand(42, 100),
        ]);
        $model->level = 0;
        $model->exp = 0;
        $model->expMax = 0;
        $model->stone = 0;
        $model->intellect = 5;
        $model->strong = 5;
        $model->battery = 5;
        $model->luck = 50;
        $model->hp = 100;
        $model->hpMax = 100;
        $model->sp = 10;
        $model->spMax = 10;
        $model->attack = 3;
        $model->defense = 0;
        $model->attack_magic = 3;
        $model->defense_magic = 0;
        $model->dodge = 0;
        $model->critical_rate = 0;
        $model->critical_damage = 0;

        return $model;
    }
}
