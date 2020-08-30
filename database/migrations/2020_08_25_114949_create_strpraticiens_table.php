<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrpraticiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strpraticiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structure_id');
            $table->string('str_praticien_nom', 50);
            $table->string('str_praticien_prenom', 225);
            $table->string('str_praticien_email');
            $table->string('str_praticien_telephone');
            $table->date('str_praticien_date_naissance');
            $table->string('str_praticien_lieu_naissance');
            $table->enum("str_praticien_sexe", ['F', 'M']);
            $table->string('str_praticien_lieu_residence');
            $table->string('ville');
            $table->string('commune');
            $table->foreign('structure_id')->references('id')->on('structures');
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
        Schema::dropIfExists('strpraticiens');
    }
}
