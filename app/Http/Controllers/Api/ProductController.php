<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllHotProducts(){
        $hotProducts = Product::where('is_hot_product', 1)->get();
        return ProductResource::collection($hotProducts);
    }

    public function getAllNewArrivalProducts(){
        $newArrivalProducts = Product::where('is_new_arrival', 1)->get();
        return ProductResource::collection($newArrivalProducts);
    }

    public function getProductsByCategoryId($categoryId){
        $productsByCategory = Product::where('category_id', $categoryId)->get();
        return ProductResource::collection($productsByCategory);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
