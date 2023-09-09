
@extends('layout.master')
@section('list')



<section class="d-flex justify-content-center mt-5">
    <form action="{{route('courseUpdate',$data->id)}}" method="post"
            class="rounded-2 px-5 py-5"style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:800px;"
            >
            @csrf


            <div class="d-flex justify-content-center bg-secondary my-3 rounded-3 ">
                <div class="d-flex gap-4  py-4 my-4 ">
                    <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                            class="text-center bg-white rounded-2"width='100' height='50'></a>
                    <h2 class="text-white ">Ajouter un cours</h2>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-5">
                <div>
                    <label for="name" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Nom du cours</label>
                    <input type="text" name="name" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{$data->name}}">
                </div>

                <div>
                    <label for="timetable" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Max horaire</label>
                    <input type="text" name="timetable" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{$data->timetable}}">
                </div>
              
            </div>


            <div class="d-flex justify-content-between align-items-center mt-5">
                <div>
                    <label for="coef" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Coefficient</label>
                    <input type="text" name="coef" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{$data->coef}}">
                </div>
                <div  >
                    <label for="category" class="d-flex justify-content-start pb-2 fs-4 fw-1">Catégorie</label>
                    <select name="categories_id" id="" class="form-select ps-5"  value="{{$data->categories_id}}">

                        @foreach($categories as $category)

                        <option @if($category->id == $data->categories_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                        
                    </select>
                </div>

              
            </div>


            <div class="btn d-flex justify-content-end my-3">
                <button type="submit"
                    class="bg-secondary rounded-3 py-2 px-3 mb-3 text-white border-white">Enregistrer</button>
            </div>



        </form>
</section>



@endsection