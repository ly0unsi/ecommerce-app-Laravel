<!doctype html>
<html>

<head>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel=" stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/">

    <!-- Bootstrap core CSS -->



    <!-- Favicons -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    @yield('meta')

</head>

<body>
    <div class="loader-container">
        <div style="" class="loader">

        </div>
    </div>
    <div class="container">

        <!-- navbar -->
        <div class="d-flex">
            @include('partials.auth') <li style="list-style: none" class="nav-item">
                <div style="right:115px;position:absolute">
                    @foreach ($socialLinks as $s)
                    <a class="p-1" href="{{$s->link}}">
                        <i style="color:white;background:#343a40;font-size:20px;padding:5px;border-radius:5px"
                            class="fa fa-{{$s->name}}"></i>
                    </a>
                    @endforeach
                </div>
            </li>

        </div>


        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <a class="navbar-brand " style="font-weight:900;color:#343a40;font-size:22px"
                    href={{url('/')}}>{{setting('site.title')}}</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="p-2 text-muted" href="{{url('mycard')}}">
                            <span style="font-size:16px;color:#eeee;margin-top:6px"
                                class=" badge badge-pill badge-dark">
                                <i class="fa fa-shopping-cart" style="color:#eeee"></i>
                                {{Cart::count()}}
                            </span>
                        </a>
                    </li>
                    @foreach ($categories as $category)

                    <a class="p-2 text-muted"
                        href="{{route('/',['category'=>$category->slug])}}">{{$category->name}}</a>
                    </li>

                    @endforeach

                </ul>
                @include('partials.search')


            </div>
        </nav>

        <!-- navbar -->
        <!--
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav navbar-toggler d-flex fixed justify-content-between">

            </nav>
        </div>
         -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


        @yield('content')
        <footer class="blog-footer">
            <h6>Blog template built for <a style="color: #343a40" href="https://lyounsi.netlify.app">❤</a> by <a
                    href="https://twitter.com/mdo" style="color: #343a40">harami</a>.</h6>
            <h6>
                <a href="#">Back to top</a>
            </h6>
        </footer>

        @yield('js')
        <script>
            $(window).on("load",function(){
            $(".loader-container").fadeOut(600);
        });
        </script>
</body>

</html>