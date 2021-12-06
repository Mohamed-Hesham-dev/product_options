<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('optionValue')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::get();
        return view('products.create',compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product=Product::create(['name'=>$request->name]);
        $options = Option::all()->pluck('name')->toArray();
        $values = collect($request->all($options))->collapse()->values()->toArray();
        $product->optionValue()->sync($values);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $options = Option::get();
        $product->load(['optionValue']);
        $optionValue = $product->optionValue->pluck('id')->toArray();
        return view('products.show',compact('options','product','optionValue'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $options = Option::get();
        $product->load(['optionValue']);
        $optionValue = $product->optionValue->pluck('id')->toArray();
        return view('products.edit',compact('options','product','optionValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $product->update(['name'=>$request->name]);
        $options = Option::all()->pluck('name')->toArray();
        $values = collect($request->all($options))->collapse()->values()->toArray();
        $product->optionValue()->sync($values);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->optionValue()->detach($product->id);
        return redirect('/products');
    }
}
