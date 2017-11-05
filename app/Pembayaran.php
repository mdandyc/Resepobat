<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'nomorbyr';

    public function pasien()
    {
        return $this->belongsTo('App\Pasien','pasien_id');
    }
}
