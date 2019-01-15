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
            $table->tinyInteger('user_id')->unsigned();
            $table->unsignedTinyInteger('lokasi_id')->nullable();
            $table->unsignedTinyInteger('kategori_id')->nullable();
            $table->string('foto', 36)->nullable();
            //$table->string('resiko1')->nullable();
            $table->boolean('keamanan')->default(false);
            $table->boolean('kerugian')->default(false);    
            //$table->string('resiko2')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('pengaduans');
    }
}
