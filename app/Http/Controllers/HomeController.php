<?php

namespace App\Http\Controllers;


use App\Department;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
   public function index()
   {

       $departments = Department::pluck('title', 'id')->all();
       $user= Auth::user();
       $tickets = Tickets::where( 'user_id', auth()->user()->id)->paginate(2);

        return view("pages.index", [
        'tickets'=> $tickets,
        'user' =>$user],
        compact('departments'));
   }

   public function login()
   {
       return view('pages.login');
   }


   public function show($slug)
   {

       $ticket = Tickets::where('slug', $slug)->firstOrFail();
       $user= Auth::user();

       return view('pages.show',[
           'user'=>$user
       ], compact('ticket'));

   }
   public function department($slug)
   {
       $department = Department::where('slug', $slug)->firstOrFail();
       $tickets = $department->tickets()->where('user_id', auth()->user()->id)-> paginate(2);
       $user= Auth::user();
       return view('pages.list',
           ['tickets' => $tickets,
               'user'=>$user
       ]);
   }
   public function status(Request $request)
   {
       $tickets= Tickets::class();
       $tickets->toggleStatus($request->get('status'));
       return redirect('ticket/show');
   }

}
