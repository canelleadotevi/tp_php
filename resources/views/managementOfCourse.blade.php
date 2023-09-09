@extends('layout.master')
@section('list')
    <div class="container" style="margin-top: 15rem">

        <section>
            @include('includes.managementSuccess')
        </section>
        <section>
            @include('includes.box-management')
        </section>
        {{--  <input type="hidden" name="name" id="" value="{{$name}}"> --}}
        <table class=" mx-auto mt-5" width="80%">
            <thead class="border-2  text-white fs-5" style="background-color:#0d224fee;">
                <tr>
                    <th class="border px-3 py-3 text-center">Nom du cours</th>
                    <th class="border px-3 py-3  text-center">Coefficient</th>
                    <th class="border px-3 py-3  text-center">Max horaire</th>
                    <th class="border px-3 py-3  text-center">Ajouté par</th>
                    <th class="border px-3 py-3  text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-secondary-subtle">

                @foreach ($courses as $course)
                    <tr class="border-bottom-2 border-dark">

                        <td class="border-white py-3 px-3  text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">

                            {{ $course['name'] }}</td>

                        </td>
                        <td class="border-white py-3 px-3 text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                            {{ $course['coef'] }}</td>

                        <td class="border-white py-3 px-3  text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                            {{ $course['timetable'] }}</td>

                        <td class="border-white py-3 px-3  text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">

                            @if ($course->user)
                                <p class="small text-success">
                                    {{ $couse->user->FullName }}
                                </p>
                            @endif
                        </td>
                        <td class="border-white py-3 px-3 "
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">

                            <div class="d-flex just">
                                <div class=" d-flex  gap-3"style="border-radius-top-left:5px">



                                    <a href="{{ route('addCourse', ['id' => $course['id']]) }}"
                                        class="px-3 py-2  text-decoration-none text-success"
                                      ><img src="{{asset('imagesProjet/plus.png')}}" alt="" width="40" height="40"></a>


                                    <a href="{{ route('modifyCourseForm', ['id' => $course['id']]) }}"
                                        class="px-3 py-2 text-decoration-none text-primary "
                                       ><img src="{{asset('imagesProjet/pen.png')}}" alt="" width="40" height="40"></a>


                                    <a href="{{ route('deleteCourse', ['id' => $course['id']]) }})}}"
                                        class="px-3 py-2  text-decoration-none text-danger "
                                       ><img src="{{asset('imagesProjet/trash.png')}}" alt="" width="40" height="40"></a>

                                    
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
                {{$courses->links()}}
            </tbody>
        </table>
        -
    </div>
@endsection

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
