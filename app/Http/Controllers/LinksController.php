<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Link;
use App\ScrapeSite;

class LinksController extends Controller
{
    public function show($url)
    {
        $site = ScrapeSite::url($url);
        $markup = $site->html;
        return view('url', compact('markup'));
    }

    public function store(Request $request)
    {
        $link = Link::create(['url' => $request->input('url')]);
        return redirect(route('show_link', $link->url));
    }
}
