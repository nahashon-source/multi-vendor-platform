@extends('layouts.vendor')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('vendor.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price (Ksh):</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="available" {{ $product->status === 'available' ? 'selected' : '' }}>Available</option>
                <option value="sold" {{ $product->status === 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
