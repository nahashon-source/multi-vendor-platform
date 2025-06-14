@extends('layouts.vendor')

@section('content')
<div class="container">
    <h1>Your Products</h1>
    <a href="{{route('vendor.products.create')}}" class="btn btn-primary"></a>

    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
             @foreach($products as $product)
             <tr>
                <td>{{ $product->name}}</td>
                <td>{{ $product->status}}</td>
                <td>{{ $product->price}}</td>
                <td>
                    <a href="{{ route('vendor.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('vendor.products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                    </form>
                </td>
             </tr>
        </tbody>
    </table>
 
</div>
<!-- your product table/list here -->

<!-- SweetAlert Delete Confirmation Script -->
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the product!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>

@endsection