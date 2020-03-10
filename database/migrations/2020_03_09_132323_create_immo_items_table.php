<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immo_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 12);
            $table->string('desc', 144)->comment('介绍');
            $table->string('effectKey1', 12)->comment('效果 Key');
            $table->integer('effectValue1')->comment('效果值');
            $table->string('effectKey2', 12)->comment('效果 Key');
            $table->integer('effectValue2')->comment('效果值');
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
        Schema::dropIfExists('immo_items');
    }
}
