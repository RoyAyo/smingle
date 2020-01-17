<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('integer');
            $table->integer('j1');
            $table->integer('j2');
            $table->integer('j3');
            $table->integer('j4');
            $table->integer('j5');
            $table->integer('j6');
            $table->integer('j7');
            $table->integer('j8');
            $table->integer('j9');
            $table->integer('j10');
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
        Schema::dropIfExists('job_questions');
    }
}
