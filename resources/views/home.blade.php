@extends('layouts.main')

@section('container')
  <h1 class="visually-hidden">Selamat Datang Di My Diary</h1>

  <div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 ms-2 fw-bold text-success mt-0 mb-3">Selamat Datang Di My Diary</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 fw-bold fs-6 text-success" >Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        @auth()
        <a href="/Main" class="btn btn-success btn-lg fs-4 text-white">My Diary</a>
        @else
        <a href="/Login" class="btn btn-success btn-lg fs-4 text-white">Login</a>
        <a href="/Register/create" class="btn btn-primary btn-lg fs-4 text-white">Register</a>
        @endauth
        {{-- <button type="button" href="/" class="btn btn-outline-secondary btn-lg px-4">Register</button> --}}
      </div>
    </div>
  </div>
</main>


@endsection
