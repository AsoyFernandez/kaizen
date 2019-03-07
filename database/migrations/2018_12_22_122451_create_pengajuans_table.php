<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('penanganan_id')->unsigned();
            $table->string('foto', 86);
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('penanganan_id')->references('id')->on('penanganans')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
