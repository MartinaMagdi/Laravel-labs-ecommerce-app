@extends('layouts.app')

@section('content')
    <div class="container mt-3 mb-5" style="min-height: 100vh">
        <a class="btn btn-primary m-0 mb-3 ms-auto d-block w-25" href="{{ route('products') }}">Back to all products</a>
        <a class="btn btn-success m-0 mb-5 ms-auto d-block w-25" href={{ route('product.update', $product->id) }}>Edit
            product</a>

            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white fw-bold fs-4">{{ $product->name }}</div>

                    <div class="card-body p-0">
                        <img height="500px" width="100%" src="{{ asset('images/products/' . $product->image) }}"
                            alt="{{ $product->name }}" />
                        <p class="bg-white p-3 m-0" style="min-height: 100px">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer p-0">
                        <div class="row justify-content-center m-1">
                            <div class="col-6 text-center bg-success p-2">
                                <p class="m-0 text-white fs-5">Category: 
                                    <span class="fw-bold ms-5 fs-4">
                                        @if($product->category_id)
                                        <a class="text-white" href="{{ route('categories.show', $product->category_id) }}">{{ $product->category->name }}</a>
                                        @else
                                        <span class="text-white text-decoration-none">Not assigned yet</span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="col-6 text-center bg-primary p-2">
                                <p class="fw-bold m-0 text-white fs-4">$ {{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
