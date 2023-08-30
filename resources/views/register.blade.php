@extends('layout.master-register')
@section('content')
<section>
    @if(session('msg') )
    <div class="alert alert-dismissible alert-warming fade show bg-success text-center
    " role="alert">
        <strong>Success</strong><br/>
            {{session('msg')}}
             
        <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</section>
<section>
    @if($errors->all() )
    <div class="alert alert-dismissible alert-warming fade show bg-danger 
    " role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li><br/>
            @endforeach
        </ul>
        <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</section>
    <div  class="container" >
        <form  class=" form" action="{{route('registerStore')}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div {{--  class="d-flex gap-5" --}} class="">
                {{--  <div class="image" height="600">
            <img src="{{ asset('images/form1.jpg') }}" alt="" width="400" height="100%">
        </div> --}}
                <div class="mt-3 mb-3 me-3">
                    <div class="text-center text-secondary mb-3 fw-bold fs-2 py-3">
                        <span>S'inscrire</span>
                    </div>
                    <div class="my-2">
                        <label for="firstname" class="mb-2 text-secondary fs-5">Nom</label>
                        <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control px-2 mb-2 py-1 " autocomplete="off">
                    </div>

                    <div class="my-2">
                        <label for="lastname" class="mb-2 text-secondary  fs-5">Prenom</label>
                        <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control px-2 mb-2 py-1" autocomplete="off">
                    </div>
                    <div class="my-2">
                        <label for="birthday" class="mb-2 text-secondary  fs-5">Date de naissance</label>
                        <input type="date" value="{{old('birthday')}}" name="birthday" class="form-control px-2 mb-2 py-1" autocomplete="off">
                    </div>
                    <div class="my-2">
                        <label for="email" class="mb-2 text-secondary  fs-5">Email</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control px-2 mb-2 py-1" autocomplete="off">
                    </div>
                    <div class="my-2">
                        <label for="password" class="mb-2 text-secondary  fs-5">Mot de passe</label>
                        <input type="password" name="password" class="form-control px-2 mb-2 py-1" autocomplete="off">
                    </div>
                    <div class="my-2">
                        <label for="password_confirm" class="mb-2 text-secondary  fs-5"> Confirmation de Mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control px-2 mb-2 py-1 " autocomplete="off">
                    </div>
                  
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class=" px-3 py-2 rounded  text-white bg-primary border border-primary fs-5"
                                >Connexion</button>
                        </div>
                        <div class="d-flex justify-content-end py-2 ">
                            <p class="fs-5 mt-1"> Déjà un compte ?<a href="{{ route('login') }}"
                                    class="text-primary text-decoration-none px-1 fs-5">Cliquez ici</a></p>
                        </div>
                  
                </div>
            </div>
        </form>

    </div>
@endsection
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<style>
    .container{
        max-width: 1080px;
        margin: 20px auto;
    }
    .form{
        width: 500px;
        border-radius: 8px;
        box-shadow:  rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin: auto;
        padding: 10px 20px;
    }
</style>
