<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('family');
            $table->string('mobile')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('major')->nullable();
            $table->string('nationalcode')->nullable();
            $table->string('university')->nullable();
            $table->string('email')->nullable();
            $table->string('birthday')->nullable();
            $table->string('grade')->nullable();
            $table->string('gender')->default('مرد');
            $table->bigInteger('user_id')->unsigned();
            $table->string('password');
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
        Schema::dropIfExists('w_users');
    }
}
