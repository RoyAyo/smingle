<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('host_name');
            $table->string('host_contact');
            $table->string('venue');
            $table->string('event_avatar')->nullable();
            $table->date('event_date');
            $table->integer('users_going')->default(0);
            $table->text('about')->nullable();
            $table->string('category')->default('Show');
            $table->integer('verified')->unsigned()->default(0);
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
        Schema::dropIfExists('events');
    }
}
