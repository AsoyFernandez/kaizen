<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('status_id')->unsigned();
            $table->boolean('nilai'); 
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('pengaduans', function (Blueprint $table) {
            $table->unsignedSmallInteger('penilaian_id')->nullable();
            $table->foreign('penilaian_id')->references('id')->on('penilaians');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaians');
    }
}
