<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = DB::table('products')
        ->when($request->input('name'), function($query, $name) {
            return $query->where('name','like','%'.$name.'%');
        })
        ->orderby('id','desc')
        ->paginate(10);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|unique:products',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|in:food,drink,snack',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        $data = $request->all();

        $product = new \App\Models\Product;
        $product->name = $request->name;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category = $request->category;
        $product->image = $filename;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('pages.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $product = \App\Models\Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('product.index')->with('success','Product berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Product berhasil dihapus');
    }
}
