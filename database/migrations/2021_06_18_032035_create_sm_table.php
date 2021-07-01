<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_arsip');
            $table->date('tgl_terima');
            $table->string('nmr_st', 30);
            $table->date('tgl_st');
            $table->text('isi',);
            $table->string('disposisi');
            $table->string('file');
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
        Schema::dropIfExists('sm');
    }
}
