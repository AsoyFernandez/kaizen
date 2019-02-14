<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('pengajuan_id')->unsigned();
            $table->unsignedSmallInteger('user_id');
            $table->boolean('status')->default(false);
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('statuses');
    }
}
