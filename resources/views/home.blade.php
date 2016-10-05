@extends('master')

@section('body_class', 'home')

@section('content')

    <h1 class="plask">tr<span>y</span></h1> <h1> dyslexia</h1>
    <p class="ani">Having dyslexia dosen’t mean you're stupid. <br>It just means that reading is hard for you right now. <br>Just like some people having a hard time learning how to bowl. <br>But just like bowling, your reading ability can be improved.</p>
    <a href="{{ route('try_dyslexia') }}" class="btn" id="play">Try Dyslexia</a>

@endsection