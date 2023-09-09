<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class=" d-flex justify-content-between  px-3" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px ; background-color: whitesmoke;">
            <div class="" >
                <a href="/" class="text-decoration-none fs-3 " style="font-style:italic;"><img src="{{asset('imagesProjet/ecole229.png')}}" alt=""></a>
            </div>
            <div class="d-flex align-items-center ">
                <a href="{{route('logout')}}" class="text-white text-decoration-none px-4 py-2 rounded-2" style="font-style:italic; background-color:#0d224fee; ">LogOut</a>
            </div>
           
        </nav>
    </header>
    <main>
        {{-- <div class="container"> --}}
            <section {{-- class="d-flex justify-content-center mt-5 py-3" --}}>
                @yield('button')
            </section>
            <section {{-- class="text-center py-3  d-flex justify-content-center " --}} >
                @yield('list')
            </section>
            <section class="text-center ">
                @yield('presentation-card')
            </section>


       {{--   </div> --}}

    </main>

</body>

</html>
