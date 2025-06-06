@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shop</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p>By: {{ $product->vendor->name }}</p>
                    <p>Price: KES {{ $product->price }}</p>
                    <p>Status: {{ $product->status }}</p>
                    <button class="btn btn-primary add-to-cart" data-id="{{ $product->id }}">Add to Cart</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
