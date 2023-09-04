@extends('layout.master')
@section('list')
<div class="container"  style="margin-top: 15rem">

    <section>
        @include('includes.enseignantSuccess')
    </section>
    <section>
        @include('includes.box-enseignant')
    </section>
   {{--  <input type="hidden" name="name" id="" value="{{$name}}"> --}}
        <table class=" mx-auto mt-5" width="80%">
            <thead class="border-2 bg-dark text-white fs-5">
                <tr>
                    <th class="border px-3 py-3 text-center">Nom </th>
                    <th class="border px-3 py-3  text-center">Prénom</th>
                    <th class="border px-3 py-3  text-center">Addresse</th>
                    <th class="border px-3 py-3  text-center">Téléphone</th>
                    <th class="border px-3 py-3  text-center">Actions</th>
                </tr>
            </thead> 
          <tbody class="bg-secondary-subtle">
    
               
                    @foreach($teachers as $teacher)

                    <tr class="border-bottom-2 border-dark">
                       
                        <td class="border-white py-3 px-3"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">

                          {{$teacher['lastname']}}</td>
                            
                        </td>
                        <td class="border-white py-3 px-3"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                           {{$teacher['firstname']}} </td>
    
                        <td class="border-white py-3 px-3"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                           {{$teacher['address']}} </td>
    
                        <td class="border-white py-3 px-3 "
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
    
                            
                        {{$teacher['phone']}}</td>

                        <td class="border-white py-3 px-3 " style="border-bottom: 1px solid black;border-right: 1px solid black;">

                            <div class="d-flex just">
                                <div class=" d-flex  gap-3"style="border-radius-top-left:5px">
                
                
                
                                    <a href="{{route('addTeacher',['id'=>$teacher['id']])}}"
                                        class="px-1  text-decoration-none text-success"
                                        style="border:1px solid white;border-radius:5px;">Voir plus</a>
                
                
                                    <a href="{{route('modifyTeacherForm',['id'=>$teacher['id']])}}"
                                        class="px-3 text-decoration-none text-primary "
                                        style="border:1px solid white ;border-radius:5px;">Modifier </a>
                
                
                                    <a href="{{route('teacherDelete',['id'=>$teacher['id']])}})}}"
                                        class="px-1  text-decoration-none text-danger "
                                        style="border:1px solid white; border-radius:5px;">Supprimer</a>



                                    <a href="{{route('affect',['id'=>$teacher['id']])}}"
                                        class="px-1  text-decoration-none text-warning "
                                        style="border:1px solid white; border-radius:5px;">Affecter un cours</a>
                
                
                                </div>
                                
                            </div>
                
                
                        </td>
                    </tr>

                    @endforeach
              
            </tbody>
        </table>
 -   
</div>
@endsection

<script src="{{ asset('js/bootstrap.min.js') }}"></script>


