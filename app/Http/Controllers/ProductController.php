<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use App\Product;
use App\Util\OpenFoodFactsProduct;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    protected $OpenFoodFactsProduct;

    public function __construct(OpenFoodFactsProduct $offProduct)
    {
        $this->OpenFoodFactsProduct = $offProduct;
    }

    /**
     * Return the specified Product.
     *
     * User found from parsed Bearer Token.
     * Product added to user's history.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($barcode)
    {
        $user = auth()->user();
        $product = Product::where('barcode', $barcode)->first();
        if (!$product) {
            $product = $this->OpenFoodFactsProduct->getProduct($barcode);
            if ($product == null) {
                return response()->json(['message' => 'No Information Found'], 203);
            }
        }
        $user->scanned()->sync($product, false);
        return response()->json(new ProductResource($product), 200);
    }

    /**
     * Save the specified Product to User's saved list.
     *
     * User found from parsed Bearer Token.
     *
     * @return \Illuminate\Http\Response
     */
    public function save($barcode)
    {
        $user = auth()->user();
        $product = Product::where('barcode', $barcode)->first();
        if (!$product) {
            return response()->json(['message' => 'No Product Found'], 203);
        }
        $user->scanned()->updateExistingPivot($product->id, ['saved' => true]);
        return response()->json(new ProductResource($product), 200);
    }

    /**
     * Un-Save the specified Product to User's saved list.
     *
     * User found from parsed Bearer Token.
     *
     * @return \Illuminate\Http\Response
     */
    public function unsave($barcode)
    {
        $user = auth()->user();
        $product = Product::where('barcode', $barcode)->first();
        if (!$product) {
            return response()->json(['message' => 'No Product Found'], 203);
        }
        $user->scanned()->updateExistingPivot($product->id, ['saved' => false]);
        return response()->json(new ProductResource($product), 200);
    }
}
