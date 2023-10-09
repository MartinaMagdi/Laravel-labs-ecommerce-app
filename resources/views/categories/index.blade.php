@extends("layouts.app")

@section("content")
<div class="container mt-2" style="min-height: 100vh">
    <a class="btn btn-success m-0 mb-5 ms-auto d-block w-25" href="{{ route("categories.create") }}">Create New Category</a>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 mb-5">
            <div class="card">
                <div class="card-header text-center bg-primary text-white fw-bold fs-4">{{ $category->name }}</div>

                <div class="card-body p-0">
                    <img height="250px" width="100%" src="{{ asset('images/categories/' . $category->logo) }}" alt="{{ $category->name }}" />
                </div>

                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-12 text-end">
                            <a href={{route("categories.show", $category->id)}} class="btn btn-primary">Show</a>
                            <a href={{route("categories.edit", $category->id)}} class="btn btn-success">Edit</a>
                            <a  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $categories->links() }}
</div>

@if (count($categories) > 0)
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body fs-3">
          Are you sure?
        </div>
        <div class="modal-footer">
          <form method="post" action="{{route("categories.destroy", $category->id)}}">
            @csrf
            @method('delete')
          <input type="submit" class="btn btn-danger px-4" value="Yes" />
          </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection