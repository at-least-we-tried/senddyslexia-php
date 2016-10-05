<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function try_dyslexia()
    {
        return view('try');
    }

    public function what()
    {
        return view('what');
    }
}
