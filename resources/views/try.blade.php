@extends('master')

@section('body_class', 'try')

@section('content')
    <h1 class="plask">tr<span>y</span></h1> <h1> dyslexia</h1>
    <p class="ani">Give us an URL and we will show you what it's like to read with dyslexia.</p>
    
    <form action="{{ action('UrlController@show') }}" method="GET">
        <input class="ani" type="text" name="url" /><br>
        <input class="ani" type="submit" value="Try" />
    </form>

    <div class="footer">
        <h2>Popular links :</h2>
        <ul>
            <li><a href="">nytimes.com</a> / </li>
            <li><a href="">nytimes.com</a> / </li>
            <li><a href="">nytimes.com</a> / </li>
            <li><a href="">nytimes.com</a> / </li>
        </ul>
    </div>
@endsection