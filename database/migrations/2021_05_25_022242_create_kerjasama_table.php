<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjasamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('id_laporan')->constrained('laporan')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('id_jenis_instansi_mitra')->constrained('jenis_instansi_mitra')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('id_mitra')->constrained('mitra')->onUpdate('cascade')->onDelete('cascade');
            $table->string('perihal_kerjasama');
            $table->string('unit_pelaksana');
            $table->text('deskripsi');
            $table->text('dokumen_usulan');
            $table->text('rencana_implementasi');
            $table->string('status');
            $table->date('lama_kerjasama');
            $table->date('tgl_dimulai');
            $table->date('tgl_berakhir');
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
        Schema::dropIfExists('kerjasama');
    }
}
