@extends('layout.master')

@if (isset($id))

    @section('presentation-card')
        <div class="container ">
            <div class="profil_content  border-primary rounded-2 mx-5 my-5">
                <div class=" image">

                    <img class=" rounded-top-2" src="{{ asset($data['profil']) }}" alt="">

                </div>

                <div class=" profil_content_item">

                    <p class="text-primary ">Nom: {{ $data['lastname'] }}</p>
                    <p class="text-primary ">Prenom: {{ $data['firstname'] }}</p>
                    <p class="text-primary ">Date de naissance: {{ $data['birthday'] }}</p>
                    <p class="text-primary ">Hobbies: {{ $data['hobbies'] }}</p>
                    <p class="text-primary ">Specialité: {{ $data['speciality'] }}</p>

                    <p class="text-primary ">Biographie: {{ $data['bio'] }}</p>


                    <div class="text-secondary py-3 d-flex justify-content-center fs-3">
                        @include('includes.box-button')
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
        max-width: 1080;

        margin: auto;
    }

    .profil_content {
        max-width: 400px;


        margin: 20px auto;

        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .image {
        width: 100%;
       
    }

    .profil_content_item {
        width: 100%;
        background-color: white;
        margin:10px 0;
       
    }

    .profil_content_item p {
         /* paddi: 10px  0; */
        text-align: center;
        font-size: 18px;

    }

    .image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
