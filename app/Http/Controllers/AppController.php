<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //Index
    public function index()
    {
        return view("welcome");
    }
}
