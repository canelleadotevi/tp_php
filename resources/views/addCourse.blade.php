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
                <p class="text-primary py-3 text-center fs-3">Nom: {{ $data['name'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Coefficient {{ $data['coef'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Max horaire {{ $data['timetable'] }}</p>
                <p class="text-primary py-3 text-center fs-3">Ajouté par {{ $data['addby'] }}</p>


                <div class="text-secondary py-3 text-center fs-3">
                    @include('includes.box-button-course')
                </div>

            </div>
        </div>
    </div>

</section>
@else

<section class="d-flex justify-content-center mt-5">
    <form action="{{route('courseStore')}}" method="post"
            class="rounded-2 px-5 py-5"style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:700px;"
            >
            @csrf


            <div class="d-flex justify-content-center my-3 rounded-3 " style="background-color:#0d224fee;">
                <div class="d-flex gap-4  py-4 my-4 ">
                    <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                            class="text-center bg-white rounded-2"width='100' height='50'></a>
                    <h2 class="text-white ">Ajouter un cours</h2>
                </div>
            </div>

            <div class="d-flex gap-5 align-items-center mt-5">
                <div>
                    <label for="name" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Nom du cours</label>
                    <input type="text" name="name" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('name')}}">
                </div>

                <div>
                    <label for="" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Masse horaire</label>
                    <input type="text" name="timetable" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('timetable')}}">
                </div>
              
            </div>


            <div class="d-flex gap-5 align-items-center mt-5">
                <div>
                    <label for="name" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Coefficient</label>
                    <input type="text" name="coef" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('coef')}}">
                </div>
                <div  >
                    <label for="category" class="d-flex justify-content-start pb-2 fs-4 fw-1">Catégorie</label>
                    <select name="categories_id" id="" class="form-select px-5 pt-4 mb-4" >
                        @foreach($categories as $category)

                        <option  value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                        
                    </select>
                </div>

              
            </div>


            <div class="btn d-flex justify-content-end my-3">
                <button type="submit"
                    class=" rounded-3 py-2 px-3 mb-3 text-white border-white" style="background-color:#0d224fee;">Enregistrer</button>
            </div>



        </form>
</section>

@endif

@endsection