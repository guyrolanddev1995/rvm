<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigrationPraticienSpecialite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praticien_specialite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('praticien_id');
            $table->unsignedBigInteger('specialite_id');
            $table->date("specialite_praticien_date_debut");
            $table->enum('specialite_praticien_status', ['BROUILLON', 'VALIDE', 'DESACTIVE']);
            $table->foreign('praticien_id')->references('id')->on('praticiens');
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
        Schema::dropIfExists('praticien_specialite');
    }
}
