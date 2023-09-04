

@foreach ($studentsList as $item)
    <tr class="border-bottom-2 border-dark">
        <td class="py-3 px-3 border-white" style="border-bottom:1px solid black;border-right: 1px solid black;">
            <img class="thumbail rounded-5 " width="60" height="60" src="{{ asset($item['profil']) }}" alt="">
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
                        class="px-1  text-decoration-none text-success"
                        style="border:1px solid white;border-radius:5px;">Voir plus</a>


                    <a href="{{ route('modify', ['id' => $item['id']]) }}"
                        class="px-3 text-decoration-none text-primary "
                        style="border:1px solid white ;border-radius:5px;">Modifier </a>


                    <a href="{{ route('delete', ['id' => $item['id']]) }}"
                        class="px-1  text-decoration-none text-danger "
                        style="border:1px solid white; border-radius:5px;">Supprimer</a>


                </div>
                <form action="{{ route('activate', ['id' => $item['id']]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn px-4  mx-3  btn-{{ $item['status'] ? 'success' : 'danger' }}"
                        style="border:1px solid white; border-radius:5px;">

                        {{ $item['status'] ? 'Activé' : 'Desactivé' }}
                    </button>

                </form>
            </div>


        </td>
    </tr>
@endforeach
