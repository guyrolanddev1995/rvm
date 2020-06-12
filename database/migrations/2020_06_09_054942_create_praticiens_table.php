<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraticiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praticiens', function (Blueprint $table) {
            $table->id();
            $table->string('commune_id');
            $table->string('praticien_nom', 50);
            $table->string('praticien_prenom', 225);
            $table->string('email')->unique();
            $table->boolean('verified')->default(false);
            $table->string('password');
            $table->date('praticien_date_naissance');
            $table->enum("praticien_sexe", ['F', 'M']);
            $table->string('praticien_numero_professionnel');
            $table->text('praticien_presentation');
            $table->string('praticien_lieu_naissance');
            $table->string('praticien_lieu_residence');
            $table->string('praticien_telephone');
            $table->enum('praticien_status', ["BROUILLON", 'VALIDE', 'DESACTIVE']);
            $table->text('avatar')->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('praticiens');
    }
}
