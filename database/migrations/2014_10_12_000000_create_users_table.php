<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('gender');
            $table->date('DOB');
            $table->string('zodiac');
            $table->string('avatar')->nullable();
            $table->text('about')->nullable();
            $table->integer('cluster')->nullable();
            $table->integer('sub')->default(1);
<<<<<<< HEAD
            $table->integer('jobs')->default(0);
=======
>>>>>>> 2081252c3055c9c464cf04d6c3a6f6e61ec4a1ab
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
