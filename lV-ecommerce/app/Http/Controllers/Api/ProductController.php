<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Api\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Repositories\Interfaces\ProductsRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ProductController extends Controller
{

    protected $productReponsitory;
    public function __construct(ProductsRepositoryInterface $productReponsitory)
    {
        $this->productReponsitory = $productReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $all_product =  $this->productReponsitory->allProducts();
        return ProductListResource::collection($all_product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
        $product = $this->productReponsitory->storeProducts($request);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product      $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        
        // $product->update($data);
       $this->productReponsitory->updateProducts($product, $request);
        return new ProductResource($product);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      
        // $product->delete();
        
        $this->productReponsitory->destroyProducts($product->id);
        
        return response()->noContent();
    }

}