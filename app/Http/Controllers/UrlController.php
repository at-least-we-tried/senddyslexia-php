<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ScrapeSite;

class UrlController extends Controller
{
    public function show(Request $request)
    {
        $site = ScrapeSite::url($request->input('url'));
        $markup = $site->html;
        return view('url', compact('markup'));
    }
}
