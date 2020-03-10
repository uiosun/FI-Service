<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immo_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mapId')->default(0)->comment('地图 ID');

            $table->string('name', 12)->default('萌新')->comment('昵称');
            $table->smallInteger('level')->default(0)->comment('级别');
            $table->integer('exp')->default(0)->comment('修为值');
            $table->integer('expMax')->default(500 * 3)->comment('修为值获取上限');
            $table->bigInteger('money')->default(42)->comment('金币');
            $table->bigInteger('stone')->default(0)->comment('灵石');

            $table->mediumInteger('intellect')->default(5)->comment('悟性');
            $table->mediumInteger('strong')->default(5)->comment('根骨');
            $table->mediumInteger('battery')->default(5)->comment('灵识');
            $table->mediumInteger('luck')->default(50)->comment('运气');

            $table->integer('hp')->default(100)->comment('生命');
            $table->integer('hpMax')->default(100)->comment('生命上限');
            $table->integer('sp')->default(10)->comment('灵力');
            $table->integer('spMax')->default(10)->comment('灵力上限');
            $table->integer('attack')->default(5)->comment('物理杀伤');
            $table->integer('defense')->default(0)->comment('物理防御');
            $table->integer('attack_magic')->default(3)->comment('术法杀伤');
            $table->integer('defense_magic')->default(0)->comment('术法抵抗');
            $table->integer('dodge')->default(0)->comment('闪避率');
            $table->integer('critical_rate')->default(0)->comment('暴击率');
            $table->integer('critical_damage')->default(0)->comment('暴击伤害增幅(%)');
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
        Schema::dropIfExists('immo_users');
    }
}
