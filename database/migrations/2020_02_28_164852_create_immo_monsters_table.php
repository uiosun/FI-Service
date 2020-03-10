<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmoMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immo_monsters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mapId');
            $table->string('name', 10);
            $table->smallInteger('level')->comment('种类');
            $table->mediumInteger('exp')->comment('经验值');
            $table->mediumInteger('hp')->comment('生命');
            $table->mediumInteger('sp')->comment('灵力');
            $table->mediumInteger('attack')->comment('物理杀伤');
            $table->mediumInteger('defense')->comment('物理防御');
            $table->mediumInteger('attack_magic')->comment('术法杀伤');
            $table->mediumInteger('defense_magic')->comment('术法抵抗');
            $table->mediumInteger('dodge')->default(0)->comment('闪避率');
            $table->mediumInteger('critical_rate')->default(0)->comment('暴击率');
            $table->mediumInteger('critical_damage')->default(0)->comment('暴击伤害增幅(%)');

            $table->integer('giftID1')->default(0)->comment('掉落的物品 ID');
            $table->integer('giftRate1')->default(0)->comment('掉落概率');
            $table->integer('giftID2')->default(0)->comment('掉落的物品 ID');
            $table->integer('giftRate2')->default(0)->comment('掉落概率');
            $table->integer('giftID3')->default(0)->comment('掉落的物品 ID');
            $table->integer('giftRate3')->default(0)->comment('掉落概率');
            $table->integer('giftID4')->default(0)->comment('掉落的物品 ID');
            $table->integer('giftRate4')->default(0)->comment('掉落概率');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immo_monsters');
    }
}
