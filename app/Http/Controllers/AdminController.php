<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $num  = "1.000";
        dd($num);
        return view('admin.index');
    }

    public function create()
    {

    }
}
