<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected function state(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Sin evaluar", "Evaluando", "Evaluado"][$value],
        );
    }

    public function user(){
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
