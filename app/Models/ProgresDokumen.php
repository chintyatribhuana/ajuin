<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresDokumen extends Model
{
    use HasFactory;
    protected $table = 'progres_dokumen';
    public function dokumen(){
    	return $this->belongsTo(Dokumen::class);
    }
    public function kerjasama(){
    	return $this->belongsTo(Kerjasama::class);
    }
    public function users(){
    	return $this->belongsTo(User::class);
    }
    public function jenis_dokumen(){
    	return $this->belongsTo(JenisDokumen::class);
    }
}
