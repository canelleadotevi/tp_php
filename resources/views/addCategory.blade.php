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



<section class="d-flex justify-content-center mt-5">
    <form action="{{route('categoryStore')}}" method="post"
            class="rounded-2 px-5 py-5"style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:700px;"
            >
            @csrf


            <div class="d-flex justify-content-center my-3 rounded-3 "style="background-color:#0d224fee;">
                <div class="d-flex gap-4  py-4 my-4 ">
                    <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                            class="text-center bg-white rounded-2"width='100' height='50'></a>
                    <h2 class="text-white ">Ajouter une catégorie</h2>
                </div>
            </div>

            
                <div>
                    <label for="name" class="d-flex justify-content-start   pb-2 pt-40 fs-4 fw-1">Nom de la catégorie</label>
                    <input type="text" name="name" id="" class="form-control mb-4 py-3 px-4"autocomplete="off"  value ="{{old('name')}}">
                </div>
              
           

            <div class="btn d-flex justify-content-end my-3">
                <button type="submit"
                    class=" rounded-3 py-2 px-3 mb-3 text-white border-white" style="background-color:#0d224fee;">Enregistrer</button>
            </div>


        </form>
</section>

@endsection