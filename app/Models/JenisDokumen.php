<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    use HasFactory;
    protected $table = 'jenis_dokumen';
    
    public function dokumen(){
    	return $this->hasMany('App\Dokumen');
    }
    // public function form_pembuatan_dokumen(){
    // 	return $this->hasOne(FormPembuatanDokumen::class,'foreign_key');
    // }
}
