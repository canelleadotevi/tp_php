<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <title>Document</title>
</head>
<body>
    @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Message alert-success</strong><br/>
        {{session('message')}}
        <button class="btn-close ml-4" aria-label="close"></button>
    </div>
    @endif
    @if(session('message'))
    <div class="alert alert-dismissible alert-success fade show" role="alert">
        {{"message"}}
        <button class="btn btn-close" aria-label="close"></button>
    </div>
    @endif
    @yield('content')

</body>
</html>