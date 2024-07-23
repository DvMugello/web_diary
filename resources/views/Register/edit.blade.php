@extends('layouts.main')

@section('container')
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-8">
            <main class="form-registration-100 m-auto">
                <form method="post" action="{{ route('Register.update',['Register']) }}">
                    @method('put')
                    @csrf
                    <h1 class="h3 mt-3 fw-normal text-center">Edit Profil </h1>

                    <div class="form-floating">
                        <input type="text"name="name"
                            class="form-control mb-md-3 @error('name')is-invalid
                    @enderror" id="name"
                            placeholder="Name" required autofocus value="{{ old('name') }}">
                        <label for="name">Name</label>

                    </div>
                    <div class="form-floating">
                        <input type="text"name="username"
                            class="form-control mb-md-3 @error('username')is-invalid
                    @enderror" id="username"
                            placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control  @error('email')is-invalid
                    @enderror " id="email"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control  @error('password')is-invalid
                    @enderror" id="password"
                            placeholder="Password" required value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Profile</label>
                        <input type="file" id="image" name="image"
                            class="form-control dropify @error('image')
                        is-invalid
                        @enderror"  value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-3 " type="submit">Edit</button>
                </form>
                <small class="d-flex fw-bold fs-3 mt-3"><a class="text-decoration-none text-success text-center" href="/Main">Back</a></small>
            </main>
        </div>
    </div>
@endsection
