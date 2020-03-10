<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userID')->comment('玩家 ID');
            $table->mediumInteger('from')->comment('所属游戏');
            $table->smallInteger('piece')->comment('本轮连续次数，30 次重置');
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
        Schema::dropIfExists('gift_histories');
    }
}
