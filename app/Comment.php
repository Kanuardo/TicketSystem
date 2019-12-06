<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function ticket ()
    {
        return $this->belongsTo(Tickets::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
