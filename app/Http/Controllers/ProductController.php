<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::orderBy('p_name','asc')->paginate(6);
        return view('backend.products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('backend.products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'p_name' => 'required|max:255',
            'image' => 'required|image|max:2048',
            'price' => 'required',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $filename = $request->image->store('images', 'public');
            $validatedData['image'] = $filename;
        }

        Product::create($validatedData);
        return redirect()->route('products.index')->with('error','New Data has stored!');
    }

    // Display a specific product
    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }

    // Show the form for editing a product
    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    // Update a specific product
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'p_name' => 'required|max:255',
            'image' => 'image|max:2048',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->store('images', 'public');
            $validatedData['image'] = $filename;
        }

        $product->update($validatedData);
        return redirect()->route('products.index')->with('error','Data Updated!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('error','Data Deleted!');
    }
}
