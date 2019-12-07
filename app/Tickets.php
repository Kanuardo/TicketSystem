<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Carbon;



class Tickets extends Model
{
    use Sluggable;
    const IS_CLOSE = 1;
    const IS_OPEN = 0;

    protected $fillable=['title', 'content', 'user_id'];


    public  function department(){
        return $this->belongsTo(Department::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class ,'ticket_id' );
    }

    public function comments3() {
        return $this->hasMany(Comment::class,'ticket_id')->limit(1)->orderBy('created_at','desc');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields){
        $ticket=new static;
        $ticket->fill($fields);

        $ticket->save();

        return $ticket;

    }

    public function setDepartment($id)
    {
        if($id == null){return;}
        $this->department_id = $id;
        $this->save();
    }

    public function setClose()
    {
        $this->status = Tickets::IS_CLOSE;
        $this->save();
    }

    public function setOpen()
    {
        $this->status = Tickets::IS_OPEN;
        $this->save();
    }

    public function toggleStatus($value){
        if($value == null){
            return $this->setClose();
        }
        return $this->setOpen();
    }
    public function data()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('M. d. Y H:i');
    }

}
