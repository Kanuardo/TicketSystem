<?php

namespace App\Http\Controllers\Admin;


use App\Department;
use App\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index($slug)
    {
        $ticket = Tickets::where('slug', $slug)->firstOrFail();
        $user= Auth::user();

        return view('admin.ticket.index',[
            'user'=>$user
        ], compact('ticket'));
    }
    public function department($slug)
    {
        $department = Department::where('slug', $slug)->firstOrFail();
        $tickets = $department->tickets()->where('status', 1)-> paginate(2);
        $user= Auth::user();
        return view('admin.departments.list',
            ['tickets' => $tickets,
                'user'=>$user
            ]);
    }
}
