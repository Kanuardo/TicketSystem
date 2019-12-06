<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model
{
    use Sluggable;

    protected $fillable =['title'];

    public  function tickets(){
        return $this->hasMany(Tickets::class);
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
