<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_workshops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('poster')->default(0);
            $table->string('status')->nullable();
            $table->integer('time')->nullable();
            $table->string('target')->nullable();
            $table->string('capacity')->nullable();
            $table->string('gender')->nullable();
            $table->string('startregister')->nullable();
            $table->string('endregister')->nullable();
            $table->string('place')->nullable();
            $table->string('date')->nullable();
            $table->string('firstclass')->nullable();
            $table->string('teacher')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->unsigned()->nullable();
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
        Schema::dropIfExists('w_workshops');
    }
}
