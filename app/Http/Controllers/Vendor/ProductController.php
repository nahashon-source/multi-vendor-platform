<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ProductController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::where('user_id', Auth::user()->id)->get();
        return view('vendor.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('vendor.products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate();
        $data['user_id'] = Auth::id();
        
        if($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
    }

    product::create($data);
    return redirect()->route('vendor.products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
        $this->authorize('update', $product);
        return view('vendor.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        $this->authorize('update', $product);


        $data = $request->validated();

        if($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('product_image');
        }

        $product->update($data);

        return redirect()->route('vendor.products.index')->with('success', 'Product updated successfully'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $this->authorize('delete', $product);

        if($product->image) {
            Storage::disk('public')->delete($product->image);


        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');



    }
}
