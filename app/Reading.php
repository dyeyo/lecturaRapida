<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    protected $guarded=[];

    public function questions()
    {
        return $this->belongsTo(Questions::class);
    }
}
