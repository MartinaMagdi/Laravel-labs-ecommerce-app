@extends("layouts.app")

@section("content")
<div class="container mt-3 mb-5" style="min-height: 100vh">
    <div class="row justify-content-center align-items-center w-50 mx-auto">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white fw-bold fs-4">{{ $category->name }} category</div>

                <div class="card-body p-0">
                    <img height="350px" width="100%" src="{{ asset('images/categories/' . $category->logo) }}" alt="{{ $category->name }}" />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary m-0 mb-3 ms-auto d-block" href="{{ route("categories.index") }}">Back to all categories</a>
            <a class="btn btn-success m-0 mb-3 ms-auto d-block" href={{route("categories.edit", $category->id)}}>Edit Category</a>
            <form action="{{route("categories.destroy", $category->id)}}" method="post" class="w-100">
                @csrf
                @method('delete')    
                <input type="submit" class="btn btn-danger m-0 ms-auto d-block w-100" value="Delete Category" />
            </form>
        </div>
    </div>

    <h2 class="mt-5 text-center">Products in the <span class="fw-bold fs-1 text-primary">{{ $category->name }}</span> category </h2>
    <table class="table mt-5">
        <thead>
          <tr>
            <th class="bg-white" scope="col">Image</th>
            <th class="bg-white" scope="col">Name</th>
            <th class="bg-white" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($category->products as $product)
          <tr>
            <th class="bg-white">
              <img class="w-50" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" height="150px">
            </th>
            <td class="bg-white">{{ $product->name }}</td>
            <td class="bg-white">
              <a href={{route("product.show", $product->id)}} class="btn btn-primary">Show</a>
              <a href={{ route('product.update', $product->id) }} class="btn btn-success">Edit</a>
              <a href={{route("product.destroy", $product->id)}} class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection