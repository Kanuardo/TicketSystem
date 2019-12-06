<?php

namespace App\Http\Controllers;

use App\Department;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateTicketController extends Controller
{
    public function index()
    {

        return view('pages.create');
    }
}
