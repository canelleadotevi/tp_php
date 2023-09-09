@extends('layout.master')
@section('list')
    <section>
        @if (session('affectSuccess'))
            <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
                <strong>Succès</strong><br />
                {{ session('affectSuccess') }}

                <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </section>
    <div class="container">


        <div class="d-flex justify-content-center ">
            <a href="{{ route('index') }}" class="btn  text-white border border-white px-4 py-2 mt-3" style="background-color:#0d224fee;">Retour</a>

        </div>

        <div class="row g-2 "
            style="margin-top:40px; width:100%; padding:20px 15px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

            <div class="col-md">

                <form action="{{ route('courseToStudent.add') }}" method="post" class="rounded-2 px-2 py-2 mt-4">
                    @csrf


                    <div class="d-flex justify-content-center  my-3 rounded-3 " style="background-color:#0d224fee;">
                        <div class="d-flex gap-4  py-4 my-4 ">
                            <a href="#"> <img src="{{ asset('imagesProjet/ecole229.png') }}" alt=""
                                    class="text-center bg-white rounded-2"width='100' height='50'></a>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between align-items-center mt-5">

                        <div class="d-flex gap-3">


                            <div>
                                <label for="" class="d-flex justify-content-start pb-2 fs-4 fw-1">Sélectionner un
                                    étudiant</label>

                                <select name="studentinformation_id" id="" class="form-select px-5py-1"
                                    value="">


                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->lastname }}
                                            {{ $student->firstname }}</option>
                                    @endforeach



                                </select>
                            </div>

                            <div>
                                <label for="cours" class="d-flex justify-content-start pb-2 fs-4 fw-1">Sélectionner des
                                    cours</label>
                                <select name="cours_id[]" id="" class="form-select px-5py-1" multiple>

                                    @foreach ($cours as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach


                                </select>

                            </div>
                        </div>



                    </div>



                    <div class="btn d-flex justify-content-center my-3">
                        <button type="submit"
                            class=" rounded-3 py-2 px-3 mb-3 text-white border-white" style="background-color:#0d224fee;">Enregistrer</button>
                    </div>

                </form>

            </div>

            <div class="col-md" width="100%">

                <table class=" mx-auto mt-5" width="100%">
                    <thead class="border-2  text-white fs-5" style="background-color:#0d224fee;">
                        <tr>
                            <th class="border px-3 py-3 text-center">Id_AFF </th>
                            <th class="border px-3 py-3  text-center">Etudiant</th>
                            <th class="border px-3 py-3  text-center">Cours</th>
                        </tr>
                    </thead>
                    <tbody class="bg-secondary-subtle">



                        @foreach ($affect as $item)
                            <tr class="border-bottom-2 border-dark">

                                <td class="border-white py-3 px-3 text-center"
                                    style="border-bottom: 1px solid black;border-right: 1px solid black;">

                                    @foreach ($item->etudiant as $element)
                                        <p>{{ $element->id }}</p>
                                    @endforeach
                                </td>


                                <td class="border-white py-3 px-3 text-center"
                                    style="border-bottom: 1px solid black;border-right: 1px solid black;">

                                    {{ $item['lastname'] }} {{ $item['firstname'] }}

                                </td>



                                <td class="border-white py-3 px-3 text-center"
                                    style="border-bottom: 1px solid black;border-right: 1px solid black;">
                                    @foreach ($item->affectation as $element)
                                         <p><a href="{{ route('studentMark', [
                                            'aff' => $element['id'], 
                                            'student' => $item->etudiant[0]['studentinformation_id']
                                            ]) }}"
                                                class="text-decoration-none">{{ $element['name'] }}</a></p> 
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach





                    </tbody>

                </table>


            </div>


            -
        </div>
    </div>
@endsection

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<style>
    .container {
        max-width: 1080px;
        margin: 50px auto;
    }
</style>
