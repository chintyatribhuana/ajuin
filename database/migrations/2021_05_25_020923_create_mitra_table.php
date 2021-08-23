<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jabatan')->constrained('jabatan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_jenis_instansi_mitra')->constrained('jenis_instansi_mitra')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_users')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_mitra',100);
            $table->string('instansi_mitra',100);
            $table->string('alamat')->nullable();
            $table->integer('telp')->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('mitra');
    }
}
