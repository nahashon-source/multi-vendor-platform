@extends('layouts.vendor')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Price:</strong> Ksh {{ $product->price }}</p>
    <p><strong>Status:</strong> {{ $product->status }}</p>

    <a href="{{ route('vendor.products.index') }}" class="btn btn-secondary">Back to Products</a>
</div>
@endsection
