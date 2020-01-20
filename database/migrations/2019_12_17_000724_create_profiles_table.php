<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->integer('student')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('r_status')->nullable();
            $table->integer('m_status')->nullable();
            $table->integer('height')->nullable();
            $table->integer('body_shape')->nullable();
            $table->integer('skin_colour')->nullable();
            $table->integer('need')->nullable();
            $table->string('model')->nullable();
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->integer('level')->nullable();
            $table->integer('jobs')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
