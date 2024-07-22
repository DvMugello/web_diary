@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration-100 m-0">
                <form method="POST" action="/Register" enctype="multipart/form-data">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Registered</h1>

                    <div class="form-floating">
                        <input type="text"name="name"
                            class="form-control mb-md-1 @error('name')is-invalid
                    @enderror" id="name"
                            placeholder="Name" required autofocus value="{{ old('name') }}">
                        <label for="name">Name</label>

                    </div>
                    <div class="form-floating">
                        <input type="text"name="username"
                            class="form-control mb-md-1 @error('username')is-invalid
                    @enderror" id="username"
                            placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control mb-md-1 @error('email')is-invalid
                    @enderror " id="email"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control mb-md-1 @error('password')is-invalid
                    @enderror" id="password"
                            placeholder="Password" required value="{{ old('password') }}">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Image Profile</label>
                        <input type="file" id="image" name="image"
                            class="form-control  @error('image')
                        is-invalid
                        @enderror">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-1 mt-3 " type="submit">Register</button>
                </form>
                <small class="d-blox text-center mt-3">Already registered <a href="/Login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
