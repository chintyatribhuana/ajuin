<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'pimpinan',
            'username' => 'pimpinan',
            'email' => 'pimpinan@gmail.com',
            'no_telp' => '0892374343',
            'jabatan' => 'pimpinan',
            'level' => 'pimpinan',
            'remember_token' => Str::random(),
            'password' => bcrypt('pimpinan'),
        ]);
    }
}
