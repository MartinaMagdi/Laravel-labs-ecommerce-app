@extends("layouts.app")

@section("content")
<div class="container mt-2" style="min-height: 100vh">
    <a class="btn btn-success m-0 mb-5 ms-auto d-block w-25" href="{{ route("product.create") }}">Create New Product</a>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-header text-center bg-primary text-white fw-bold fs-4">{{ $product->name }}</div>

                <div class="card-body p-0">
                    <img height="250px" width="100%" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" />
                    <p class="bg-white p-3 m-0 text-muted" style="min-height: 100px">{{ $product->description }}</p>
                </div>

                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <p class="fw-bold m-0 text-primary fs-4">$ {{ $product->price }}</p>
                        </div>
                        <div class="col-8 text-end">
                            <a href={{route("product.show", $product->id)}} class="btn btn-primary">Show</a>
                            <a href={{route("product.update", $product->id)}} class="btn btn-success">Edit</a>
                            <a  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>

@if(count($products) > 0)
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body fs-3">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href={{route("product.destroy", $product->id)}} type="button" class="btn btn-danger px-4">Yes</a>
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection