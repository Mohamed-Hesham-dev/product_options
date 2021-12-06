<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
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

        try {
            $products = Product::with('optionValue')->get();
            return response()->json(['data' =>ProductResource::collection($products),'message' => ' retrieved successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => ' retrieved Failed.']);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
            {
                $product=Product::create(['name'=>$request->name]);
                $product->optionValue()->sync($request->values);
                return response()->json(['data' =>new ProductResource($product),'message' => ' created successfully.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()]);
            }
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
        try
            {
                $product->optionValue()->detach($product->id);
                $product->update(['name'=>$request->name]);
                $product->optionValue()->sync($request->values);
                return response()->json(['data' =>new ProductResource($product),'message' => ' updated successfully.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try
        {
            $product->delete();
            $product->optionValue()->detach($product->id);
            return response()->json(['message' => ' deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => ' deleted Failed.']);
        }
    }
}
