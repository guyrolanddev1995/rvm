<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdv_consultations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patient');
            $table->unsignedBigInteger('id_structure');
            $table->unsignedBigInteger('id_specialite');
            $table->boolean('praticien_check')->default(0);
            $table->unsignedBigInteger('id_praticien')->nullable();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_specialite')->references('id')->on('specialites');
            $table->foreign('id_structure')->references('id')->on('structures');
            $table->foreign('id_praticien')->references('id')->on('strpraticiens');
            $table->string('ville');
            $table->string('commune');
            $table->string('date');
            $table->string('heure');
            $table->string('motif');
            $table->boolean('assure')->default(false);
            $table->string('assurence')->nullable();
            $table->string('autre_assurence')->nullable();
            $table->enum('status', ['en attente', 'valide', 'effectue'])->default('en attente');
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
        Schema::dropIfExists('rdv_consultations');
    }
}
