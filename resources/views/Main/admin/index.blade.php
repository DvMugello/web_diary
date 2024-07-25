@extends('layouts.main')

@section('container')
    {{-- <main class="col-md-auto m-md-5 col-lg-auto px-md-0 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
            <h1 class="fs-4 fw-bold text-dark" style="font-family: 'Times New Roman', Times, serif">Diary {{ auth()->user()->name }}</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success col-lg-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small col-lg-auto m-5">
            <a href="{{ route('Main.create')}}" class="btn btn-primary mb-2 mt-3" style="font-family: 'Times New Roman', Times, serif">Create New Diary</a>
            <table class="table table-striped table-sm mb-md-5 col-lg-auto">
                <thead>
                    <tr>
                        <th scope="col-md-auto">#</th>
                        <th scope="col-md-auto">Title</th>
                        <th scope="col-md-auto">Body</th>
                        <th scope="col-md-auto">Tanggal Dibuat</th>
                        <th scope="col-md-auto">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->body !!}</td>
                            <td>{{ $post->date_format }}</td>

                            <td><a href="{{ route('Main.show', ['Main']) }}" class="badge bg-info"><i
                                        class="bi bi-eye"></i></a></td>
                            <td><a href="{{ route('Main.edit',['Main']) }}" class="badge bg-warning"><i
                                        class="bi bi-plus-circle"></i></a></td>
                            <form action="/Main/{{ $post->slug }}" method="post"
                            class="d-inline">
                                @method('delete')
                                @csrf
                                <td>
                                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Data Ini?')"><i
                                            class="bi bi-x-circle"></i></button>
                                </td>
                            </form>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                data kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main> --}}
@endsection
