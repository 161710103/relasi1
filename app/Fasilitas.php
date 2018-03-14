<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas'; // -> meminta izin untuk mengakses table dosens
    protected $fillable = ['nama_fasilitas']; // -> field apa saja yang boleh di isi -> fill = mengisi, able = boleh jadi fillable = boleh di isi
    public $timestamps = true; // penanggalan otomatis record kapan di isi dan di update di aktikfkan

    public function Kamar()
    {
    	return $this->hasMany('App\Kamar','fasilitas_id');
    }
}
