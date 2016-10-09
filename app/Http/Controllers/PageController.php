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
        $popularLinks = ['svt.se', 'expressen.se', 'nytimes.com'];
        return view('try', compact('popularLinks'));
    }

    public function what()
    {
        return view('what');
    }
}
