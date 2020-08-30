<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger("type_id");
            $table->date("date_creation");
            $table->integer('nombre_chambres');
            $table->integer("nombre_lits");
            $table->string('telephone');
            $table->string('ville');
            $table->string('commune');
            $table->string("type_assurence");
            $table->foreign('type_id')->references('id')->on('type_structures');
            $table->boolean('status')->default(0);
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('structures');
    }
}
