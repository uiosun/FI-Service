<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmoMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immo_maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 10);
            $table->string('description', 144);
            $table->string('location', 20)->unique()->comment('x,y');
            $table->smallInteger('type')->default(0);  // true/false - 1位：危险/安全; 2位：自由探索/固定摊位；3位：没有事件/行动会触发突发事件
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
        Schema::dropIfExists('immo_maps');
    }
}
