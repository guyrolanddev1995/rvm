<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('str_consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_structure');
            $table->unsignedBigInteger('id_str_praticien');
            $table->unsignedBigInteger('id_specialite');
            $table->string('jour');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->foreign('id_structure')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('id_str_praticien')->references('id')->on('strpraticiens')->onDelete('cascade');
            $table->foreign('id_specialite')->references('id')->on('specialites')->onDelete('cascade');
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
        Schema::dropIfExists('str_consultations');
    }
}
