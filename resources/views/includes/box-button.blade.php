
<div class="d-flex gap-5 ">
    <div><a class="btn   py-2 px-4" href="{{ route('details',['id'=>$data['id']-1]) }}"  ><img src="{{asset('imagesProjet/left.png')}}" alt=""width="40" height="40"></a></div>
    <div><a class="btn   py-2 px-4 mt-2" href="{{ route('details',['id'=>$data['id']+1]) }}"><img src="{{asset('imagesProjet/next.png')}}" alt=""width="32" height="32"></a></div>
</div>


