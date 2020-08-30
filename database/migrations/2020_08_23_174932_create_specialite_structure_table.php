<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialiteStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialite_structure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structure_id');
            $table->unsignedBigInteger('specialite_id');
            $table->foreign('structure_id')->references('id')->on('structures');
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
        Schema::dropIfExists('specialite_structure');
    }
}
