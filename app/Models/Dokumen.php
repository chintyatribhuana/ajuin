<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumen';

    public function jenis_dokumen(){
    	return $this->belongsTo(JenisDokumen::class);
    }
    public function kerjasama(){
    	return $this->belongsTo(Kerjasama::class);
    }
    public function progres_dokumen(){
    	return $this->hasMany(ProgresDokumen::class);
    }
}
