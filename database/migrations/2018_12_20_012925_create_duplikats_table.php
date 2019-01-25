<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuplikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duplikats', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('lokasi_id')->nullable();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('lokasi_id')->references('id')->on('tempats')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duplikats');
    }
}
