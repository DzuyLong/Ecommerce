<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductInventory;
use App\Http\Requests\ProductInventoryRequest;
use App\Http\Resources\ProductInventoryListResource;
use App\Http\Resources\ProductInventoryResource;
use App\Repositories\Interfaces\ProductInventoryReponsitoryInterface;
use Carbon\Carbon;
class ProductInventoryController extends Controller
{
    protected $productInventoryReponsitory;
    public function __construct(ProductInventoryReponsitoryInterface $productInventoryReponsitory)
    {
        $this->productInventoryReponsitory = $productInventoryReponsitory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data = $this->productInventoryReponsitory->allProductInventory();
         return ProductInventoryListResource::collection($all_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInventoryRequest $request)
    {
        $data = $request->validated();
        $store_in = $this->productInventoryReponsitory->storeProductInventory($data);
        return new ProductInventoryResource($store_in);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product_Inventory $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $get_edit = $this->productInventoryReponsitory->findProductInventory($id);
        return new ProductInventoryResource($get_edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductInventoryRequest $request, $id)
    {
        $data = $request->validated();
        $this->productInventoryReponsitory->updateProductInventory($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productInventoryReponsitory->destroyProductInventory($id);
        return response()->noContent();
    }
}
