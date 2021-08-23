<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_jabatan')->constrained('jabatan')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('id_unit')->constrained('unit')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('email',100)->unique();
            $table->integer('no_telp');
            $table->string('level',20);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
