<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    
    protected $table = 'kamars';
    protected $fillable = ['nomor_kamar','fasilitas_id'];
    public $timestamps = true;

    public function Fasilitas()
    {
        return $this->belongsTo('App\Fasilitas','fasilitas_id');
    }
}
