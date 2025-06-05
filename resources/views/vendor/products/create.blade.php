@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Add Product</h2>

    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Price</label>
            <input type="number" name="price" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Stock</label>
            <input type="number" name="stock" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Status</label>
            <select name="status" class="border p-2 w-full">
                <option value="Available">Available</option>
                <option value="Sold">Sold</option>
            </select>
        </div>

        <div class="mb-4">
            <label>Image</label>
            <input type="file" name="image" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>
    </form>
</div>
@endsection
