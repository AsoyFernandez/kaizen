<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('user_id')->unsigned();
            $table->unsignedTinyInteger('lokasi_id');
            $table->unsignedTinyInteger('kategori_id');
            $table->string('foto', 86);
            //$table->string('resiko1')->nullable();
            $table->boolean('keamanan')->default(false);
            $table->boolean('kerugian')->default(false);    
            //$table->string('resiko2')->nullable();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade');

            $table->foreign('lokasi_id')->references('id')->on('tempats')
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
        Schema::dropIfExists('pengaduans');
    }
}
