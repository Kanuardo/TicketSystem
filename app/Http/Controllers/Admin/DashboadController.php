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

        $tickets = Tickets::where('status', 1)->paginate(3);


        return view("admin.dashboard", [
            'tickets'=> $tickets,
            'user' =>$user],
            compact('departments'));
    }
}
