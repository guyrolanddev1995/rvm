<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examin_structure', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structure_id');
            $table->unsignedBigInteger('examin_id');
            $table->foreign('structure_id')->references('id')->on('structures');
            $table->foreign('examin_id')->references('id')->on('examins');
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
        Schema::dropIfExists('examin_structure');
    }
}
