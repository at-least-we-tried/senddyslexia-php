@extends('master')

@section('title', 'Try dyslexia')
@section('body_class', 'try')

@section('content')
    <h1 class="plask">tr<span>y</span></h1> <h1> dyslexia</h1>
    <p class="ani">Give us an URL and we will show you what it's like to read with dyslexia.</p>
    
    <form action="{{ action('LinksController@store') }}" method="POST">
        {{ csrf_field() }}
        <input class="ani" type="text" name="url" /><br>
        <input class="ani" type="submit" value="Try" />
    </form>

    @if ($popularLinks)
    <div class="footer">
        <h2>Popular links :</h2>
        <ul>
        @foreach($popularLinks as $link)
            <li>
                <a href="{{ route('show_link', ['url' => $link]) }}">{{ $link }}</a>
            </li>
        @endforeach
        </ul>
    </div>
    @endif
@endsection