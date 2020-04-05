<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    protected $guarded=[];

    public function preguntasAsociadas()
    {
        return $this->hasMany(QuestionsTest::class, 'questions_id');
    }
}
