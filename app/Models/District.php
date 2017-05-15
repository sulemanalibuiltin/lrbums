<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'districts';

    public function division()
    {
        return $this->belongsTo('\App\Models\Division');
    }

    public function tehsils()
    {
        return $this->hasMany('\App\Models\Tehsil');
    }
}
