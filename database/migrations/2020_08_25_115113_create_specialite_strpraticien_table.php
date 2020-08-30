<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialiteStrpraticienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialite_strpraticien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('str_praticien_id');
            $table->unsignedBigInteger('specialite_id');
            $table->foreign('str_praticien_id')->references('id')->on('strpraticiens');
            $table->foreign('specialite_id')->references('id')->on('specialites');
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
        Schema::dropIfExists('specialite_strpraticien');
    }
}
