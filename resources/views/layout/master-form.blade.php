<form action="/" method="post" class="rounded-2 px-2 py-2 mt-4">
    @csrf


    <div class="d-flex justify-content-center bg-secondary my-3 rounded-3 ">
        <div class="d-flex gap-4  py-4 my-4 ">
            <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                    class="text-center bg-white rounded-2"width='100' height='50'></a>
            <h2 class="text-white "></h2>
        </div>
    </div>


    <div class="d-flex justify-content-between align-items-center mt-5">

        <div>
            <label for="cours" class="d-flex justify-content-start pb-2 fs-4 fw-1">Sélectionner des
                cours</label>
            <select name="cours_id[]" id="" class="form-select px-5py-1"
                value="{{ $data->cours_id }}" multiple>

                @foreach ($cours as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach

            </select>
        </div>
        <div>
            <input type="hidden" name="enseignants_id" value="{{ $data->id }}">
        </div>


    </div>



    <div class="btn d-flex justify-content-center my-3">
        <button type="submit"
            class="bg-secondary rounded-3 py-2 px-3 mb-3 text-white border-white">Enregistrer</button>
    </div>



</form>
