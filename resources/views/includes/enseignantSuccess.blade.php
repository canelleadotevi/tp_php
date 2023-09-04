<section>
    @if (session('addTeacher'))
        <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
            <strong>Succès</strong><br />
            {{ session('addTeacher') }}

            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section >

<section>
    @if (session('updateSuccess'))
        <div class="alert alert-dismissible alert-success fade show text-center
" role="alert">
            <strong>Succès</strong><br />
            {{ session('updateSuccess') }}

            <button class="btn btn-close" aria-label="close" data-bs-dismiss="alert"></button>
        </div>
    @endif
</section >