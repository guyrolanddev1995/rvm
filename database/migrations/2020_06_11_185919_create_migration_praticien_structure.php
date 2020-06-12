<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationPraticienStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praticien_structure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('praticien_id');
            $table->unsignedBigInteger('structure_id');
            $table->date('structure_praticien_date_debut');
            $table->foreign('praticien_id')->references('id')->on('praticiens');
            $table->foreign('structure_id')->references('id')->on('structures');
            $table->enum('structure_paticien_status', ['BROUILLON', 'VALIDE', 'DESACTIVE'])->default('BROUILLON');
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
        Schema::dropIfExists('praticien_structure');
    }
}
