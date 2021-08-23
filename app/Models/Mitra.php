<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitra';
    protected $fillable = [
        'nama_mitra',
        'jabatan',
        'instansi_mitra',
        'logo',
        'jenis_instansi_mitra',
        'users_id',
        // 'level',
    ];
    public function kerjasama(){
    	return $this->hasMany(Kerjasama::class);
    }
}
