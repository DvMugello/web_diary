@extends('layouts.main')

@section('container')
    <div class="row mt-3">
        <div class="col">
            <div class="card mt-md-5">

                <main class="ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="fs-4">{{ $title }}</h1>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-6" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="table-responsive small col-lg-auto">
                            <div class="container">
                                <div class="row my-3">
                                    <div class="col-lg-auto">
                                        {{-- <h1>{{ auth()->user()->get_role }}</h1> --}}


                                        <a href="{{ route('Main.index') }}" class="btn btn-success"><i
                                                class="bi bi-arrow-left"></i>
                                            Back To
                                            All My Posts</a>

                                        <a href="{{ route('Main.edit', ['Main']) }}" class="btn btn-warning"><i
                                                class="bi bi-plus-circle"></i>Edit</a>
                                        @method('delete')
                                        @csrf
                                        <td>
                                            <button class="btn btn-danger border-0"
                                                onclick="return confirm('Hapus Data Ini?')"><i
                                                    class="bi bi-x-circle"></i>Delete</button>
                                        </td>


                                        {{-- @if ($user->image)
                        <div style="max-height: 350px; overflow:hidden">
                            <img class="img-fluid mt-3"
                                src="{{ asset('storage/' . $post->image) }} "alt="{{ $post->category->name }}"
                                class="img-fluid mt-3">
                        </div>
                    @else
                        <img class="img-fluid mt-3"
                            src="https://source.unsplash.com/1200x400?{{ $post->category->name }} "alt="{{ $post->category->name }}"
                            class="img-fluid mt-3">
                    @endif --}}

                                        <h2 class="mt-3 text-primary">{{ $post->title }}</h2>

                                        <p class="mb-3 fw-bold fs-5 text-primary">Tanggal Diary Dibuat
                                            :{{ $post->date_format }}</p>

                                        <article class="my-3 text-dark fs-5">

                                            {!! $post->body !!}

                                        </article>
                                        <a class="d-block mt-3 text-dark fs-4 fw-bold text-decoration-none"
                                            href="/Main">Back To MyDiary</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </main>
            </div>
        </div>
    </div>
@endsection
