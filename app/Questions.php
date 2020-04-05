<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    protected $guarded=[];

    public function reading()
    {
        return $this->hasMany(Reading::class);
    }
}
