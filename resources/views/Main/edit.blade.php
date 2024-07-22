@extends('layouts.main')

@section('container')

<main class="col-md-auto ms-sm-auto col-lg-auto px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="fs-4">{{ $title }}</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive small col-lg-auto">
        <table class="table table-striped table-sm">
            <form method="post" action="{{ route('Main.update',['Main']) }}" class="mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text"
                        class="form-control @error('title')
                    is-invalid
                    @enderror"
                        id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Sub Judul</label>
                    <input type="text"
                        class="form-control @error('slug')
                    is-invalid
                    @enderror"
                        id="slug" name="slug" required autofocus value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date"
                        class="form-control @error('date')
                    is-invalid
                    @enderror"
                        id="date" name="date" required value="{{ old('date', $post->date) }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>

                </div>

                <button type="submit" class="btn btn-primary">Edit Diary</button>
            </form>
        </table>
    </div>
</main>


@endsection
