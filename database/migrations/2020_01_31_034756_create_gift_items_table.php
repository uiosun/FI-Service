<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumInteger('from')->comment('所属游戏');
            $table->smallInteger('day')->comment('第几天的奖励');

            $table->smallInteger('level')->comment('奖励级别，普通、7 日、30 日');
            $table->string('type', 16)->comment('奖励类型');
            $table->string('key', 16)->comment('奖励 key');
            $table->string('name', 16)->comment('奖励名称');
            $table->string('description', 144)->comment('奖励介绍');
            $table->integer('number')->comment('奖励数量');

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
        Schema::dropIfExists('gift_items');
    }
}
