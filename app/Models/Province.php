<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'provinces';

    public function country()
    {
        return $this->belongsTo('\App\Models\Country');
    }

    public function divisions()
    {
        return $this->hasMany('\App\Models\Division');
    }
}
