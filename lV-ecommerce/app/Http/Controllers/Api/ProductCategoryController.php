<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Resources\ProductCategoryListResource;
use App\Http\Resources\ProductCategoryResource;
use App\Repositories\Interfaces\ProductCategoryReponsitoryInterface;
use Carbon\Carbon;
class ProductCategoryController extends Controller
{
    protected $productCategoryReponsitory;
    public function __construct(ProductCategoryReponsitoryInterface $productCategoryReponsitory)
    {
        $this->productCategoryReponsitory = $productCategoryReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = $this->productCategoryReponsitory->allProductCategory();
         return ProductCategoryListResource::collection($all_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->validated();
        $store_pc = $this->productCategoryReponsitory->storeProductCategory($data);
        return new ProductCategoryResource($store_pc);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product_category $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_edit = $this->productCategoryReponsitory->findProductCategory($id);
        return new ProductCategoryResource($get_edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $this->productCategoryReponsitory->updateProductCategory($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productCategoryReponsitory->destroyProductCategory($id);
        return response()->noContent();
    }
}
