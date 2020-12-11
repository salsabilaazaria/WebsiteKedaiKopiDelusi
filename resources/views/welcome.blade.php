<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>$okopedia</title>

        Fonts
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        Styles
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    $okopedia
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> -->

@extends('layouts.app')

@section('content')

<img src="banner.png" alt="Snow">
<a href="/order"><button class="btn" id="bannerbutton">ORDER NOW</button></a>




<div class="container ">
    <div class="d-flex justify-content-center ">
        <h1 class="text-center mb-4" style="font-size: 70pt;">MENU</h1>
            <br>
    </div>

    <div class="row text-center" id="photorowmenu">
        <div class="col" id="photomenu">
        <a href="/Category/1"><img src="coffee.png" alt=""></a>
        </div>
        <div class="col " id="photomenu">
        <a href="/Category/2"><img src="noncoffee.png" alt=""></a>
        </div>
        
    </div>

</div>


  <div class="row bg-dark mt-4" id="colvisit">
    <div class="col text-center"  id="visittext" >
        <div >
            <p id="visitus">VISIT US ON</p>
            <h2>MONDAY - SUNDAY</h2>
            <h3>06.00 - 23.00</h3>
        </div>
    </div>
    <div class="col ">
   <a href="https://www.google.com/maps/place/Kedai+Kopi+Delusi/@-6.3919366,106.8739443,15z/data=!4m2!3m1!1s0x0:0x6557971fd4fcb93a?sa=X&ved=2ahUKEwjhjcrv2KztAhUXA3IKHVCuCxUQ_BIwE3oECB8QBQ"><img src="location.png" alt=""></a>
    </div>
  </div>
 






@endsection
