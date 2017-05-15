<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $table = 'divisions';

    public function province()
    {
        return $this->belongsTo('\App\Models\Province');
    }

    public function districts()
    {
        return $this->hasMany('\App\Models\District');
    }
}
