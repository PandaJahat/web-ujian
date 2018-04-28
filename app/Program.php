<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'code',
        'name',
        'active',
        'faculty_id'
    ];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
}
