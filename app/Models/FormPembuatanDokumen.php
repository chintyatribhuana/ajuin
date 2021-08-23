<?php

namespace App\Models;
use App\Models\JenisDokumen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPembuatanDokumen extends Model
{
    use HasFactory;
    protected $table = 'form_pembuatan_dokumen';
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function jabatan(){
    	return $this->belongsTo('App\Models\Jabatan');
    }
    public function jenis_instansi_mitra(){
    	return $this->belongsTo('App\JenisInstansiMitra');
    }
    public function jenis_dokumen(){
    	return $this->belongsTo(JenisDokumen::class);
    }
}
