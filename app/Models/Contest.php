<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
  
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['participants'];

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => $this->cover_image ??'default/cover.jpg',
        );
    }

    protected function state(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["Privado", "Público"][$value],
        );
    }

    /*
    public function getRouteKeyName(){
        return "slug";
    }
    */

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function participants(){
        return $this->belongsToMany('App\Models\User');
    }

    public function requirements()
    {
        return $this->hasManyThrough('App\Models\Requirement', 'App\Models\Folder');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function folders()
    {
        return $this->hasMany('App\Models\Folder');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
