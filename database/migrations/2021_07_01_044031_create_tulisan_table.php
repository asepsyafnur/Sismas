<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTulisanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tulisan', function (Blueprint $table) {
            $table->increments('tulisan_id');
            $table->string('tulisan_judul');
            $table->text('tulisan_isi');
            $table->dateTime('tulisan_tanggal');
            $table->string('tulisan_kategori_id');
            $table->string('tulisan_kategori_nama');
            $table->string('tulisan_views');
            $table->string('tulisan_gambar');
            $table->string('tulisan_pengguna_id');
            $table->string('tulisan_author');
            $table->string('tulisan_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tulisan');
    }
}
