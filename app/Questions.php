<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    protected $guarded=[];

    public function opcionesAsociadas()
    {
        return $this->hasMany(Opciones::class, 'id_question');
    }

}
