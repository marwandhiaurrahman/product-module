<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product::index', compact('products'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        // Product::updateOrCreate($request->except('_token'));
        Product::create($request->except('_token'));

        return redirect()->route('product.index')->with('success', $product->name . 'deleted successfully');
    }

    /**
     * Show the specified resource.
     * @return Renderable
     */
    public function show(Product $product)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Renderable
     */
    public function edit(Product $product)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }
}
