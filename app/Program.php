<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'code',
        'name',
        'active',
    ];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
}
