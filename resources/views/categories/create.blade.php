@extends("layouts.app")

@section("content")
<div class="container mt-2 bg-white p-5" style="min-height: 100vh">
    <h3 class="text-center fw-bold mb-5"><span class="text-primary fs-1 me-2">Create</span> new category</h3>

    <form method="post" action="{{ route('categories.store') }}" class="w-75 mx-auto" enctype="multipart/form-data">
        @csrf
            <div class="form-row">
              <div class="col">
                <label for="name" class="mb-2">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="category name" value="{{ old('name') }}">
              </div>

              @error('name')
              <small style="color: red" class="mb-4">{{ $message }}</small>
              @enderror
              
              <div class="col mt-4">
                <label for="logo" class="mb-2">Logo</label>
                <input class="form-control" type="file" id="logo" name="logo" value="{{ old('logo') }}">
              </div>

              @error('logo')
              <small style="color: red" class="mb-4">{{ $message }}</small>
              @enderror

              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5 fs-5 mt-3">Create</button>
              </div>
            </div>
          </form>
    </div>
@endsection