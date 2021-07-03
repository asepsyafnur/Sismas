<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('agenda_id');
            $table->string('agenda_nama', NULL);
            $table->timestamp('agenda_tanggal', NULL);
            $table->text('agenda_deskripsi', NULL);
            $table->date('agenda_mulai', NULL);
            $table->date('agenda_selesai', NULL);
            $table->string('agenda_tempat', 90, NULL);
            $table->string('agenda_waktu', 30, NULL);
            $table->string('agenda_keterangan', NULL);
            $table->string('agenda_author', 60, NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
