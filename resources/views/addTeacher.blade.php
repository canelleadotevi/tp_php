@extends('layout.master')
@section('list')

<section>
    @if ($errors->all())
        <div class="alert alert-dismissible alert-warming fade show bg-danger 
" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li><br />
                @endforeach
            </ul>
            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section>

@if(isset($id))

<section>
    <div class="container px-5 py-5" style=" ">
        <div class=" d-block border-primary rounded-2 mx-5 my-5" width="100%" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" >

            <div class="">
                <p class="text-primary py-3 text-center fs-3">Nom : {{ $data['lastname'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Prénom : {{ $data['firstname'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Addresse : {{ $data['address'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Téléphone : {{ $data['phone'] }}</p>


                <div class="text-secondary py-3 text-center fs-3">
                    @include('includes.box-button-teacher')
                </div>

            </div>
        </div>
    </div>
</section>

@else

<section class="d-flex justify-content-center mt-5">
    <form action="{{route('teacherStore')}}" method="post"
            class="rounded-2 px-5 py-5"style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:800px;"
            >
            @csrf


            <div class="d-flex justify-content-center bg-secondary my-3 rounded-3 ">
                <div class="d-flex gap-4  py-4 my-4 ">
                    <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                            class="text-center bg-white rounded-2"width='100' height='50'></a>
                    <h2 class="text-white ">Ajouter un enseignant</h2>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5">
                <div>
                    <label for="lastname" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Nom </label>
                    <input type="text" name="lastname" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('lasttname')}}">
                </div>

                <div>
                    <label for="firstname" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Prénom</label>
                    <input type="text" name="firstname" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('firstname')}}">
                </div>
              
            </div>


            <div class="d-flex justify-content-between align-items-center mt-5">
                <div>
                    <label for="address" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Addresse</label>
                    <input type="text" name="address" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('address')}}">
                </div>
                <div  >
                    <label for="phone" class="d-flex justify-content-start pb-2 fs-4 fw-1">Téléphone</label>
                    <input type="text" name="phone" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('phone')}}">
                </div>

              
            </div>


            <div class="btn d-flex justify-content-end my-3">
                <button type="submit"
                    class="bg-secondary rounded-3 py-2 px-3 mb-3 text-white border-white">Enregistrer</button>
            </div>

        </form>
</section>
@endif
@endsection