<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch data needed for the admin dashboard
        return view('projects.index'); // or your admin view
    }
}
