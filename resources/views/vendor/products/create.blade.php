@extends('layouts.app')

@section('content')
<script>
document.getElementById('imageInput').onchange = function (event) {
    const [file] = event.target.files;
    if (file) {
        const preview = document.getElementById('previewImage');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
};
</script>
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
    <div class="mb-3">
       <label>Product Image:</label>
       <input type="file" name="image" id="ImageInput" class="form-control">
    </div>
    <div class="mb-3"> 
         <img id = "previewImage" src="#" alt="Image Preview" style="display:none; max-width:200px;"/>
    </div>
</div>
@endsection
