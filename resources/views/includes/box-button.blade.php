
<div class="d-flex gap-5 ">
    <div><a class="btn btn-secondary text-white py-2 px-4" href="{{ route('details',['id'=>$data['id']-1]) }}"  >Retour</a></div>
    <div><a class="btn btn-secondary text-white py-2 px-4" href="{{ route('details',['id'=>$data['id']+1]) }}"   >Suivant</a></div>
</div>


