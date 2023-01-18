<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductInventoryReponsitoryInterface;
use App\Models\ProductInventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProductInventoryReponsitory implements ProductInventoryReponsitoryInterface
{

    public function allProductInventory()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'created_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = ProductInventory::query()
        ->where('id', 'like', "%{$search}%")->orWhere('quantity', 'like', "%{$search}%")
        ->orderBy($sortField, $sortDirection)
        ->paginate($perPage); 
        return  $query;
    }

    public function storeProductInventory(array $data)
    {
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        return ProductInventory::create($data);
    }

    public function findProductInventory($id)
    {
        return ProductInventory::find($id);
    }

    public function updateProductInventory($id, array $data)
    {
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        
        return ProductInventory::find($id)->update($data);
    }

    public function destroyProductInventory($id)
    {
        $productInventory_delete= ProductInventory::find($id);
        $productInventory_delete->delete();
    }
}