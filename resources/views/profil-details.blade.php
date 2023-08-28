@extends('layout.master')

@if (isset($id))
            @section('presentation-card')
                <div class="container px-5 py-5" style=" ">
                    <div class=" d-block border-primary rounded-2 mx-5 my-5" width="100%" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" >
                      <div class=" " width="100%" >
                                <img class=" rounded-top-2" src="{{ asset($data['profil']) }}" alt="" width="100%"style="object-fit:cover;" height="600">
                           
                          
                      </div>

                        <div class="">
                            <p class="text-primary py-3 text-center fs-3">Nom: {{ $data['lastname'] }}</p>
                            <p class="text-primary py-3 text-center fs-3">Prenom: {{ $data['firstname'] }}</p>
                            <p class="text-primary py-3 text-center fs-3">Date de naissance: {{ $data['birthday'] }}</p>
                            <p class="text-primary py-3 text-center fs-3">Hobbies: {{ $data['hobbies'] }}</p>
                            <p class="text-primary py-3 text-center fs-3">Specialité: {{ $data['speciality'] }}</p>
                          
                            <p class="text-primary py-3 text-center fs-3">Biographie: {{ $data['bio'] }}</p>


                            <div class="text-secondary py-3 text-center fs-3">
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
<script src="{{asset('js/bootstrap.min.js')}}"></script>
