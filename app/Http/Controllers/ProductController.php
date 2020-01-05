<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Util\OpenFoodFactsProduct;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    protected $OpenFoodFactsProduct;

    public function __construct(OpenFoodFactsProduct $offProduct)
    {
        $this->OpenFoodFactsProduct = $offProduct;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @return \Illuminate\Http\Response
     */
    public function show($barcode)
    {
        $product = Product::where('barcode', $barcode)->first();
        if(!$product){
            $response = $this->OpenFoodFactsProduct->getProduct($barcode);
            //TODO Need to check response before we add to database.
            $product = new Product($response);
            $product->save();
        }
        return response()->json(new ProductResource($product),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
