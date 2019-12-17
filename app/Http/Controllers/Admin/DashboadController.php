<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Tickets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboadController extends Controller
{
    public function index()
    {
        $departments = Department::pluck('title', 'id')->all();
        $user= Auth::user();

        $tickets = Tickets::paginate(3);



        return view("admin.dashboard", [
            'tickets'=> $tickets,
            'user' =>$user],
            compact('departments'));
    }
public function updateStatus(Request $request, $id)
{
    $ticket = Tickets::where('id', $id)->firstOrFail();
    $ticket->status= 1;
    $ticket->save();
    return redirect()->back()->with("status", "Тикет был закрыт.");
}

}
