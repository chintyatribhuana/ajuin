<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;
    protected $table = 'kerjasama';
    public function mitra(){
    	return $this->belongsTo(Mitra::class);
    }
    public function users(){
    	return $this->belongsTo(User::class);
    }
    public function dokumen(){
    	return $this->hasMany(Dokumen::class);
    }
    public function progres_dokumen(){
    	return $this->hasManyThrough( ProgresDokumen::class, Dokumen::class,);
    }
}
