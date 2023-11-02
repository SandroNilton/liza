<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function contest()
    {
      return $this->belongsTo('App\Models\Contest');
    }

    public function lessons()
    {
      return $this->hasMany('App\Models\Lesson');
    }
}
