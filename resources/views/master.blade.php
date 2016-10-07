<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="canonical" href="" />

        <meta name="content-language" content="en" />
        <meta http-equiv="Content-Language" content="en" />

        <!-- Open Graph >>> -->
        <meta property="og:title" content="" />
        <meta property="og:description" content="" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:type" content="website" />
        <meta name="abstract" content="" />
        <meta name="city" content="" />
        <meta name="country" content="Romania" />
        <meta name="ICBM" content="" />
        <meta name="classification" content="" />
        <meta name="pagerank" content="10" />
        <meta name="author" content="" />
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
        <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
        <meta name="DC.title" content="" />
        <meta name="DC.creator" content="" />
        <meta name="DC.subject" content="" />
        <meta name="DC.description" content="" />
        <meta name="DC.type" scheme="DCTERMS.DCMIType" content="Text" />
        <meta name="DC.format" content="text/html" />
        <meta name="DC.format" content="83798 bytes" />
        <meta name="DC.identifier" scheme="DCTERMS.URI" content="" />
        <!-- <<< Open Graph -->

        <!-- Robots >>> -->
        <meta name="Robots" content="NOODP" />
        <meta name="revisit" content="2 days" />
        <meta name="revisit-after" content="2 days" />
        <meta name="robots" content="index, follow" />
        <meta name="alexa" content="100" />
        <meta name="subject" content="" />
        <meta name="robots" content="all, index, follow" />
        <meta name="googlebot" content="all, index, follow" />
        <!-- <<< Robots -->

        <meta name="viewport" content="initial-scale=1.0" />
        <meta charset="utf-8">
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- Encoding & CSS & JS >>> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet">
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <!-- JS -->
        <script src="http://code.jquery.com/jquery-3.1.1.slim.min.js"   integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="   crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
        <script>

        </script>
        <!-- HTML5 Compatibility -->
        <!--[if lt IE 10]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!-- <<< Encoding & CSS & JS -->
    </head>
    <body class="@yield('body_class')">
        <div class="header">
            <div class="nav">
                {!! $MenuBar->asUl() !!}
            </div>

            <div class="soc">
                <ul>
                    <li><a href=""><img src="img/icon-fb.png" /></a></li>
                    <li><a href=""><img src="img/icon-tw.png" /></a></li>
                </ul>
            </div>

        </div>
        
        <div class="main">
            @yield('content')
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>

    </body>
</html>