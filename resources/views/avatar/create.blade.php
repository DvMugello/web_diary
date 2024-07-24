@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col">
        <div class="card">
            <form action="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="image" class="form-label">Image Profile</label>
                    <input type="file" id="image" name="image"
                        class="form-control dropify @error('image')
                    is-invalid
                    @enderror">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
