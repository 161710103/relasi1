<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
   protected $table = 'tamus';
    protected $fillable = ['nama','nik','kamar_id'];
    public $timestamps = true;

    public function Kamar()
	{
		return $this->belongsTo('App\Kamar','kamar_id');
	}
}
