<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $guarded = [];

    public function preguntasAsociadas()
    {
        return $this->belongsToMany(Questions::class);
    }
}
