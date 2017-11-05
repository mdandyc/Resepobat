<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'kodedkt';

    public function poliklinik()
    {
        return $this->belongsTo('App\poliklinik','poliklinik_id');
    }
}
