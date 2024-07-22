@extends('layouts.main')

@section('container')
    <h1 class="text-center mt-md-5 mb-5 fs-2">My Profil {{ auth()->user()->name }}</h1>
    <div class="text-center mt-md-3 mb-4 fs-4">
        <img src="{{ asset('storage/' . auth()->user()->image ) }}" class="rounded-circle img-thumbnail shadow" alt={{ auth()->user()->image }}
            width="150px">
    </div>
    <h3 class="text-center mt-5">{{ auth()->user()->name }}</h3>
    <p class="text-center text-primary mb-3">{{ auth()->user()->email }}</p>
    <h4 class="text-center mt-md-5"><a href="{{ route('Register.edit',['Register']) }}" class="text-decoration-none text-dark fs-5 mt-md-5">Edit Profil</a></h4>
@endsection
