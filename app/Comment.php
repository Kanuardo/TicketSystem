<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function ticket ()
    {
        return $this->belongsTo(Tickets::class)->orderBy('created_at','asc');;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
