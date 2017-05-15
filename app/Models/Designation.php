<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    //
    use SoftDeletes;
    protected $table = 'designations';

    protected $fillable = ['title', 'description', 'status', 'created_by'];

    public function users()
    {
        return $this->hasMany('\App\Models\User');
    }
}
