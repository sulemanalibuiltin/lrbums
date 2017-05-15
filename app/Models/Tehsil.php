<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    //
    protected $table = 'tehsils';

    public function district()
    {
        return $this->belongsTo('\App\Models\District');
    }

}
