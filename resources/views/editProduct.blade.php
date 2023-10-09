@extends("layouts.app")

@section("content")
<div class="container mt-2 bg-white p-5" style="min-height: 100vh">
    <h3 class="text-center fw-bold mb-5">Edit <span class="text-primary fs-1 me-2">{{ $product->name }}</span> product</h3>

    <form method="post" action="{{ route('product.storeEdit', $product->id) }}" class="w-75 mx-auto">
        @csrf
            <div class="form-row">
              <div class="col mb-4">
                <label for="name" class="mb-2">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="product name" value="{{ $product->name }}">
              </div>
              <div class="col mb-4">
                <label for="image" class="mb-2">Image</label>
                <input type="text" id="image" name="image" class="form-control" placeholder="product image name" value="{{ $product->image }}">
              </div>
              <div class="col mb-4">
                <label for="price" class="mb-2">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="product price" value="{{ $product->price }}">
              </div>
              <div class="col mb-4">
                <label for="category" class="mb-2">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                    <option disabled selected>Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="col mb-4">
                <label for="description" class="mb-2">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary px-5 fs-5 mt-3">Edit</button>
              </div>
            </div>
          </form>
    </div>
@endsection