<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequiredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requireds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('age');
            $table->string('location');
            $table->integer('student');
            $table->integer('religion');
            $table->integer('r_status');
            $table->integer('m_status');
            $table->integer('height');
            $table->integer('need');
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->integer('degree')->nullable();
            $table->integer('level')->nullable();
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
        Schema::dropIfExists('requireds');
    }
}