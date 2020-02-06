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
            $table->integer('gen1')->default(1);
            $table->integer('gen2')->default(1);
            $table->integer('gen3')->default(1);
            $table->integer('gen4')->default(1);
            $table->integer('gen5')->default(1);
            $table->integer('gen6')->default(1);
            $table->integer('gen7')->default(1);
            $table->integer('gen8')->default(1);
            $table->integer('gen9')->default(1);
            $table->integer('gen10')->default(1);
            $table->integer('gen11')->default(1);
            $table->integer('gen12')->default(1);
            $table->integer('gen13')->default(1);
            $table->integer('gen14')->default(1);
            $table->integer('gen15')->default(1);
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
