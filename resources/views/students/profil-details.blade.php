@extends('layout.master')

@if (isset($id))

    @section('presentation-card')
        <div class="container ">
            <div class="main__content">
                <div class="profil_content  border-primary rounded-2 mx-5 my-5" style="height: 700px;">
                    <div class=" image">

                        <img class=" rounded-top-2" src="{{ asset($data['profil']) }}" alt="">

                    </div>

                    <div class=" profil_content_item  " style="background-color:#0d224fee;  height:60%">

                        <p class=" ">Nom: {{ $data['lastname'] }}</p>
                        <p class=" ">Prenom: {{ $data['firstname'] }}</p>
                        <p class=" ">Date de naissance: {{ $data['birthday'] }}</p>
                        <p class=" ">Hobbies: {{ $data['hobbies'] }}</p>
                        <p class=" ">Specialité: {{ $data['speciality'] }}</p>

                        <p class=" ">Biographie: {{ $data['bio'] }}</p>


                        <div class="text-secondary py-3 d-flex justify-content-center fs-3">
                            @include('includes.box-button')
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endsection
@else
    @section('button')
        @if ($errors->any())
            <div class="alert alert-warming alert-dismissible fade show d-flex justify-content-start" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li><br />
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
    @endsection
    @section('list')
        @include('includes.form')
    @endsection


@endif
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<style>
    * {
        box-sizing: border-box;
        font-size: 14;
        margin: 0;
    }

    .container {
        max-width: 1080px;
        padding: 0 15px;
        margin: auto 0;

    }

    .main__content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: calc(100vh - 85px);

    }

    .profil_content {
        width: 385px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .image {
        width: 385px;
        height: 40%;
    }

    ;

    .profil_content_item p {
        padding-bottom: 10px;
        line-height: 20px;
        font-size: 18px;

    }

    .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
