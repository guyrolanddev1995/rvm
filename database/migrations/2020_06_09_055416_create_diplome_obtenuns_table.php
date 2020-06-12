<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomeObtenunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplome_obtenuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('praticien_id');
            $table->unsignedBigInteger('diplome_id');
            $table->enum('status', ['VALIDE', 'SUPPRIME']);
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
        Schema::dropIfExists('diplome_obtenuns');
    }
}
