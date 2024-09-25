<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Storage;

class ProductController extends Controller
{
    public function index() {
       
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        $product = new Product();
        $product->name = $validated['name'];
        $product->amount = $validated['amount'];
        $product->description = $validated['description'];
    
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
           
        }
       
        $product->save();
    
        return redirect()->route('admin.products');
    }

    public function show($id) {

        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product->name = $validated['name'];
        $product->amount = $validated['amount'];
        $product->description = $validated['description'];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('admin.products');
    }
    public function destroy($id) {
       // dd($id);
        $product = Product::findOrFail($id);
    
        // Optionally, delete the product's image from storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    
        $product->delete();
    
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }
    
    
}
