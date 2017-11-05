<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';
    public function resep()
    {
        return $this->belongsTo('App\Resep','resep_id');
    }
    public function obat()
    {
        return $this->belongsTo('App\Obat','obat_id');
    }

}
