@extends('layout.master')
@section('list')
    <section>
        @if (session('Success'))
            <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
                <strong>Succès</strong><br />
                {{ session('Success') }}

                <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </section>

    <section>
        <div class="container">

            <div>
                <div class="d-flex gap-3">

                    <div class="div"width="200" height="200">
                        <img src="{{ asset($student['profil']) }}" alt="" style="border-radius:30%;" width="200"
                            height="200">
                    </div>
                    <div class="mt-5 ms-5">
                        <span class="fw-2 fs-2 mt-5" style="color:#0d224fee;">Nom et prénoms : {{ $student['lastname'] }}
                            {{ $student['firstname'] }}</span><br />
                        <span class="fw-2 fs-2 mt-4 " style="color:#0d224fee;">Cours : {{ $aff->name }}
                        </span>
                    </div>

                </div>
                <div class="d-flex gap-5 align-items-center">
                    <table class=" mx-auto mt-3" width="100%">
                        <thead class="border-2  text-white fs-5" style="background-color:#0d224fee;">
                            <tr>
                                <th class="border px-3 py-3 text-center">Type</th>
                                <th class="border px-3 py-3  text-center">Note 1</th>
                                <th class="border px-3 py-3  text-center">Note 2</th>
                                <th class="border px-3 py-3  text-center">Moyenne</th>
                            </tr>
                        </thead>
                        <tbody class="bg-secondary-subtle">




                            <tr class="border-bottom-2 border-dark">

                                <td class="border-white py-3 px-3 text-center"
                                    style="border-bottom: 1px solid black;border-right: 1px solid black;">

                                    Partiel
                                </td>
                                @foreach ($notesetu as $element)
                                    @if ($element->type === 'Partiel')
                                        <td class="text-center">
                                            {{ $element->note }}
                                        </td>
                                    @endif
                                   
                                    
                                @endforeach
                                <td></td>

                            </tr>


                            <tr class="border-bottom-2 border-dark">

                                <td class="border-white py-3 px-3 text-center"
                                    style="border-bottom: 1px solid black;border-right: 1px solid black;">

                                    Devoir
                                </td>
                                @foreach ($notesetu as $element)
                                    @if ($element->type === 'Devoir')
                                        <td class="text-center">
                                            {{ $element->note }}
                                        </td>
                                    @endif
                                   
                                @endforeach



                            </tr>










                        </tbody>

                    </table>

                    <form action="{{ route('studentmarktype') }}" method="post" class="mt-5">
                        @csrf
                        <div class="mb-5">
                            <input type="number" name="note" id="" class="form-control">
                        </div>
                        <div>
                            <select name="type" id="" class="form-select">
                                <option value="Partiel">Partiel</option>
                                <option value="Devoir">Devoir</option>
                            </select>
                            <input type="hidden" name="cours_id" value="{{ $aff->id }}">


                            <input type="hidden" name="studentinformation_id" value="{{ $student->id }}">'



                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn  px-5 py-1 text-white " style="background-color:#0d224fee;">Sauvegarder</button>
                        </div>
                    </form>


                </div>
            </div>




        </div>
    </section>
@endsection
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<style>
    .container {
        max-width: 1080px;
        margin: 100px auto;
    }
</style>
