@extends('layout.master-register')
@section('content')
<section>
    @if(session("verifyEmail"))
    <div class="alert alert-dismissible alert-success fade show bg-successntext-center"role="alert">
        <strong>Success</strong><br/>
        {{session('verifyEmail')}}
        <button class="btn btn-close " data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
</section>

<section>
    @if(session('messageError') )
    <div class="alert alert-dismissible alert-danger fade show bg-success text-center
    " role="alert">
        <strong>Success</strong><br/>
            {{session('messageError')}}
             
        <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
    @endif
</section>


   <div class="container " >

        <div class="form_content">
            <form class="form"  action="{{route('formPasswordStore')}}"
        method="post" enctype="multipart/form-data"> 
        
        @csrf
        <div>
            <div class="mt-3 mb-3 me-3">
                <div class="text-center text-secondary  fw-bold fs-2 py-3">
                    <span>Veuillez entrer votre addresse mail</span>
                </div>
                <div class="my-2">
                    <input type="email" name="email" class="form-control px-2 mb-2 py-1" autocomplete="off">
                </div>

                <div class="d-flex justify-content-between py-3">


                         <button type="submit" class=" px-3 py-2 rounded  text-white border border-primary bg-primary fs-5"
                         >Connexion</button>
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