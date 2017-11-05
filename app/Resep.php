<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'nomorresep';

    public function poliklinik()
    {
        return $this->belongsTo('App\Poliklinik','poliklinik_id');
    }
    public function dokter()
    {
        return $this->belongsTo('App\Dokter','dokter_id');
    }
    public function pasien()
    {
        return $this->belongsTo('App\Pasien','pasien_id');
    }
}
