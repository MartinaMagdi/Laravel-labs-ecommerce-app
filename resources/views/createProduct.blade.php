@extends('layouts.app')

@section('content')
    <div class="container mt-2 bg-white p-5" style="min-height: 100vh">
        <h3 class="text-center fw-bold mb-5"><span class="text-primary fs-1 me-2">Create</span> new product</h3>

        <form method="post" action="{{ route('products.store') }}" class="w-75 mx-auto">
            @csrf
            <div class="form-row">
                <div class="col mb-4">
                    <label for="name" class="mb-2">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="product name">
                </div>
                <div class="col mb-4">
                    <label for="image" class="mb-2">Image</label>
                    <input type="text" id="image" name="image" class="form-control"
                        placeholder="product image name">
                </div>
                <div class="col mb-4">
                    <label for="price" class="mb-2">Price</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="product price">
                </div>
                <div class="col mb-4">
                    <label for="category" class="mb-2">Category</label>
                    <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                        <option selected disabled>Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mb-4">
                    <label for="description" class="mb-2">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control" rows="5"
                        placeholder="product description"></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-5 fs-5 mt-3">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
