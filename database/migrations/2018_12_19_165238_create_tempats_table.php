<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempats', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nama', 30);
            $table->unsignedTinyInteger('perusahaan_id')->nullable();
            $table->timestamps();

            $table->foreign('perusahaan_id')->references('id')->on('perusahaans')
            ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('tempats', function (Blueprint $table) {
            $table->unsignedTinyInteger('tempat_id')->nullable();
            $table->foreign('tempat_id')->references('id')->on('tempats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempats');
    }
}
