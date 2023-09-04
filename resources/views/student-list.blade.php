@extends('layout.master')

@section('title', 'Listes des étudiants')




@section('button')
   <div class="container " style="margin-top: 15rem">
    <section class="mt-5 mb-5 text-center px-5">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Message success</strong><br />
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
    </section>

    <section class="mt-5 mb-5 text-center px-5">
        @if (session('welcomeMessage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Message success</strong><br />
                {{ session('welcomeMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
    </section>

   {{--  <section class="mt-5 mb-5 text-center px-5">
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Update success</strong><br />
                {{ session('update') }}
                <button class=" btn-close" data-bs-dismiss="alert" aria-label="close"></button>

            </div>
        @endif
    </section> --}}


    <section class="mt-5 text-center mx-4">
        @if (session('Status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Status</strong><br />
                {{ session('Status') }}
                <button class="btn btn-close" data-bs-dismiss="alert"aria-label="close"></button>
            </div>
        @endif
    </section>


@section('list')
    <section class="text-center mx-auto my-4">
        @include('includes.button')
    </section>




    <table class=" mx-auto" width="80%">
        <thead class="border-2 bg-dark text-white fs-5">
            <tr>
                <th class="border px-3 py-3">Photo</th>
                <th class="border px-3 py-3">Nom et prénoms</th>
                <th class="border px-3 py-3">Hobbies</th>
                <th class="border px-3 py-3">Spécialité</th>
                <th class="border px-3 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-secondary-subtle">
            @include('includes.list')
        </tbody>
    </table>


@endsection

   </div>
@endsection


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
