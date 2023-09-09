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
            <thead class="border-2  text-white text-center fs-5"style="background-color: #0d224fee;">
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
                       
                        <td class="border-white py-3 px-3 text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">

                          {{$teacher['lastname']}}</td>
                            
                        </td>
                        <td class="border-white py-3 px-3 text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                           {{$teacher['firstname']}} </td>
    
                        <td class="border-white py-3 px-3 text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
                           {{$teacher['address']}} </td>
    
                        <td class="border-white py-3 px-3 text-center"
                            style="border-bottom: 1px solid black;border-right: 1px solid black;">
    
                            
                        {{$teacher['phone']}}</td>

                        <td class="border-white py-3 px-3 text-center" style="border-bottom: 1px solid black;border-right: 1px solid black;">

                            <div class="d-flex just">
                                <div class=" d-flex  gap-3"style="border-radius-top-left:5px">
                
                
                
                                    <a href="{{route('addTeacher',['id'=>$teacher['id']])}}"
                                        class="px-3 py-2 text-decoration-none "
                                        style="border-radius:5px;"><img src="{{asset('imagesProjet/plus.png')}}" alt="" width="40" height="40"></a>
                
                
                                    <a href="{{route('modifyTeacherForm',['id'=>$teacher['id']])}}"
                                        class="px-3 py-2 text-decoration-none  "
                                        style="border-radius:5px;"><img src="{{asset('imagesProjet/pen.png')}}" alt="" width="40" height="40"></a>
                
                
                                    <a href="{{route('teacherDelete',['id'=>$teacher['id']])}})}}"
                                        class="px-3  py-2 text-decoration-none  "
                                        style=" border-radius:5px;"><img src="{{asset('imagesProjet/trash.png')}}" alt="" width="40" height="40"></a>



                                    <a href="{{route('affect',['id'=>$teacher['id']])}}"
                                        class="  text-decoration-none text-white my-auto "
                                        style=" border-radius:5px; background-color: #0d224fee; padding: 10px;">Affecter un cours</a>
                
                
                                </div>
                                
                            </div>
                
                
                        </td>
                    </tr>

                    @endforeach
                    <div class="d-flex justify-content-center mt-5" >
                        {{ $teachers->links()}}
                    </div>
              
            </tbody>
        </table>
 -   
</div>
@endsection

<script src="{{ asset('js/bootstrap.min.js') }}"></script>


