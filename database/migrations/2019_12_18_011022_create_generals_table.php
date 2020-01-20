<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('gen1');
            $table->integer('gen2');
            $table->integer('gen3');
            $table->integer('gen4');
            $table->integer('gen5');
            $table->integer('gen6');
            $table->integer('gen7');
            $table->integer('gen8');
            $table->integer('gen9');
            $table->integer('gen10');
            $table->integer('gen11');
            $table->integer('gen12');
            $table->integer('gen13');
            $table->integer('gen14');
            $table->integer('gen15');
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
        Schema::dropIfExists('generals');
    }
}
