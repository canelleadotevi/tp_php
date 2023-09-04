<section>
    @if (session('Addsuccess'))
        <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
            <strong>Succès</strong><br />
            {{ session('Addsuccess') }}

            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section >

<section> 
    @if (session('addCourse'))
        <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
            <strong>Succès</strong><br />
            {{ session('addCourse') }}

            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section >

<section > 
    @if (session('addCourseFailed'))
        <div class="alert alert-dismissible alert-danger fade show text-center
" role="alert">
            <strong>Echec</strong><br />
            {{ session('addCourseFailed') }}

            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section >





<section>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>