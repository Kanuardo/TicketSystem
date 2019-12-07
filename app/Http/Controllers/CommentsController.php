<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'message' => 'required'
        ]);
        $comment = new Comment;
        $comment->title=$request->get('message');
        $comment->ticket_id = $request->get('ticket_id');
        $comment->user_id= Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Ваше письмо отправлено!');
    }
}
