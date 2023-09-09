<section >
    <div class="container mt-3 mb-3   d-flex justify-content-center  ">
        <form action="{{ route('student') }}" method="post"
            class ="rounded-2 px-5 py-5  my-5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:700px;"
            enctype="multipart/form-data">
            
            @csrf
            <div class="d-flex justify-content-center  my-3 rounded-3 " style=" background-color:#0d224fee;">
                <div class="d-flex gap-4  py-4 my-4 ">
                    <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                            class="text-center bg-white rounded-2"width='100' height='50'></a>
                    <h2 class="text-white ">Student Registration</h2>
                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center mt-5">
                <div>
                    <label for="lastname" class="d-flex justify-content-start   pb-2 fs-4 fw-1">Nom</label>
                    <input type="text" name="lastname" id="" class="form-control mb-4 py-3 px-4"autocomplete="off" value="{{old('lastname')}}">
                </div>

                <div class="form_item">
                    <label for="firstname" class="d-flex justify-content-start  fs-4 fw-1  pb-2">Prenom</label>
                    <input type="text" name="firstname" id="" class="form-control mb-4 py-3 px-4" autocomplete="off" value="{{old('firstname')}}">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center ">
                <div class="form_item">
                    <label for="birthday" class="d-flex justify-content-start  fs-4 fw-1 pb-2">Date de naissance</label>
                    <input type="date" name="birthday" id="" class="form-control mb-4 py-3 px-4" autocomplete="off" value="{{old('birthday')}}">
                </div>
    
                <div class="form_item">
                    <label for="hobbies" class="d-flex justify-content-start  fs-4 fw-1 pb-2">Hobbies</label>
                    <input type="text" name="hobbies" id="" class="form-control mb-4 py-3 px-4" autocomplete="off" value="{{old('hobbies')}}">
                </div>
            </div>

            <div class="form_item">
                <label for="speciality" class="d-flex justify-content-start  fs-4 fw-1 pb-2">Specialité</label>
                <input type="text" name="speciality" id="" class="form-control mb-4 py-3 px-4" autocomplete="off" value="{{old('speciality')}}">
            </div>

            <div class="form_item">
                <label for="bio" class="d-flex justify-content-start  fs-4 fw-1 pb-2">Biographie</label>
                <textarea name="bio" id="" cols="31" rows="10" class="form-control mb-4 py-3 px-4" value="{{old('bio')}}"></textarea>
            </div>

            <div class="form_item">
                <input type="file" name="profil" id="" class="form-control mb-4  py-3 px-4" value="{{old('profil')}}">
            </div>

            <div class="btn d-flex justify-content-end my-3">
                <button type="submit"
                    class=" rounded-3 py-3 px-5 mb-3 text-white border-white" style=" background-color:#0d224fee; ">Enregistrer</button>
            </div>
        </form>
    </div>
</section>
