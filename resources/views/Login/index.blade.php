@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mb-md-5">
        <div class="col-md-4 mb-md-0 ">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('LoginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin w-90 m-4">
                <form action="/Login" method="post">
                    @csrf

                    <h1 class="h3 m-5 fw-normal text-center">Please Login</h1>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control mb-md-4 @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" autofocus required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control mb-md-4 " id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <button class="btn btn-primary w-100 mt-md-3 mb-md-3 py-2" type="submit">Login</button>
                </form>
                <small class="d-blox text-center mb-md-4 ">Not Registered <a href="/Register/create">Register Now!</a></small>
            </main>
        </div>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0dcaf0" fill-opacity="1" d="M0,64L26.7,101.3C53.3,139,107,213,160,213.3C213.3,213,267,139,320,122.7C373.3,107,427,149,480,186.7C533.3,224,587,256,640,266.7C693.3,277,747,267,800,261.3C853.3,256,907,256,960,250.7C1013.3,245,1067,235,1120,229.3C1173.3,224,1227,224,1280,202.7C1333.3,181,1387,139,1413,117.3L1440,96L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg> --}}
    </div>
@endsection
