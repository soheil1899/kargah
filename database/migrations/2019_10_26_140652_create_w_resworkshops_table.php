<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWResworkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_resworkshops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('w_user_id')->unsigned();
            $table->bigInteger('w_workshop_id')->unsigned();
            $table->integer('price')->unsigned();
            $table->string('evidence')->nullable();
            $table->string('pricedate')->nullable();
            $table->string('evidencedate')->nullable();
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
        Schema::dropIfExists('w_resworkshops');
    }
}
