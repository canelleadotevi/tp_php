

@foreach ($studentsList as $item)
    <tr class="border-bottom-2 border-dark bg-{{$item['status']? 'white':'secondary-substle'}}">
        <td class="py-3 px-3 border-white" style="border-bottom:1px solid black;border-right: 1px solid black;">
            <img class="thumbail rounded-5 " width="60" height="60" src="{{ asset($item['profil']) }}" alt="" style="object-fit: cover;">
        </td>
        <td class="border-white py-3 px-3" style="border-bottom: 1px solid black;border-right: 1px solid black;">
            {{ $item['lastname'] . '     ' . $item['firstname'] }}
        </td>
        <td class="border-white py-3 px-3" style="border-bottom: 1px solid black;border-right: 1px solid black;">
            {{ $item['hobbies'] }}</td>

        <td class="border-white py-3 px-3" style="border-bottom: 1px solid black;border-right: 1px solid black;">
            {{ $item['speciality'] }}</td>

        <td class="border-white py-3 px-3 " style="border-bottom: 1px solid black;border-right: 1px solid black;">

            <div class="d-flex just">
               
                <div class=" d-flex  gap-3"style="border-radius-top-left:5px">



                    <a href="{{ route('details', ['id' => $item['id']]) }}"
                        class="px-1 py-2 text-decoration-none text-white "
                        style="border-radius:5px;"><img src="{{asset('imagesProjet/plus.png')}}" alt="" width="40" height="40"></a>


                    <a href="{{ route('modify', ['id' => $item['id']]) }}"
                        class="px-3 py-2 text-decoration-none text-white "
                        style="border:1px solid secondary ;border-radius:5px;"><img src="{{asset('imagesProjet/pen.png')}}" alt="" width="40" height="40"></a>


                    <a href="{{ route('delete', ['id' => $item['id']]) }}"
                        class="px-1 py-2 text-decoration-none text-white "
                        style="border:1px solid secondary; border-radius:5px;"><img src="{{asset('imagesProjet/trash.png')}}" alt="" width="40" height="40"></a>


                </div>
               
                <form action="{{ route('activate', ['id' => $item['id']]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn px-4  mx-3  bg-{{ $item['status'] ? 'success' : 'danger'  }}"
                        style="border:1px solid white; border-radius:5px;">

                        {{ $item['status'] ? 'Activé'  : 'Desactivé' }}


                    </button>

                </form>
            </div>


        </td>
    </tr>
@endforeach
<div class="d-flex justify-content-center mt-5">
    {{$studentsList->links()}}
</div>
