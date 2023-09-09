@extends('layout.master-register')
@section('content')


<section class="mt-2 px-3">
    @if(session("success"))
    <div class="alert alert-dismissible alert-success fade show  text-center"role="alert">
        <strong>Success</strong><br/>
        {{session('success')}}
        <button class="btn btn-close " data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
</section>

<section class="mt-2 px-3">
    @if(session(" passwordReset"))
    <div class="alert alert-dismissible alert-success fade show  text-center"role="alert">
        <strong> Success</strong><br/>
        {{session(' passwordReset')}}
        <button class="btn btn-close " data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
</section >

<section class="mt-2 px-3">
    @if(session("error"))
    <div class="alert alert-dismissible alert-danger fade show text-center"role="alert">
        <strong>Error</strong><br/>
        {{session('error')}}
        <button class="btn btn-close " data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
</section >




   <div class="container " >
   
        <div class="form_content">
            <form class="form"  action="{{route('authentification')}}"
        method="post" enctype="multipart/form-data"> 
        
        @csrf
        <div >
            <div class="mt-3 mb-3 me-3">
                <div class="text-center text-secondary  fw-bold fs-2 py-3">
                    <span>Se connecter</span>
                </div>
                <div class="my-2">
                    <label for="email" class="mb-2 text-secondary fs-5">Email</label>
                    <input type="email" name="email" class="form-control px-2 mb-2 py-1" autocomplete="off">
                </div>
                <div class="my-2">
                    <label for="password" class="mb-2 text-secondary fs-5">Mot de passe</label>
                    <input type="password" name="password" class="form-control px-5 mb-2 py-1" autocomplete="off">
                </div>
                <div class="d-flex justify-content-between py-3">

                         <span class="mt-3"><a href="{{route('forgotPassword')}}">Mot de passe oublié ?</a></span>

                         <button type="submit" class=" px-3 py-2 rounded  text-white border border-primary bg-primary fs-5"
                         >Connexion</button>
                </div>
                <div class="d-flex justify-content-end py-3">
    
                    <span class="text-secondary fs-5"> Pas encore de compte ?<a class="text-primary text-decoration-none px-2 fs-5"  href="{{route('register')}}" class="text-white text-decoration-none px-2">Cliquez ici</a></span>
    
                </div>
            </div>
        </div>
    </form>
        </div>
   
   

   </div>

   @endsection
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <style>
    *{
        box-sizing: border-box;
        margin: 0;

    }
    .container{
        max-width: 1080px;
        margin: 40px  auto;

    }
    .form_content{
        display: flex;
        justify-content: center;
        align-items: center;
       
    }
    .form{
        width: 500px;
        border-radius: 8px;
        box-shadow:  rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 10px 20px;
    }
</style>