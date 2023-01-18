<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductCategoryReponsitoryInterface;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProductCategoryReponsitory implements ProductCategoryReponsitoryInterface
{

    public function allProductCategory()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'created_at');
        $sortDirection = request('sort_direction', 'desc');

        $query = ProductCategory::query()
        ->where('title', 'like', "%{$search}%")
        ->orderBy($sortField, $sortDirection)
        ->paginate($perPage); 
        return  $query;
    }

    public function storeProductCategory(array $data)
    {
        $data['created_at'] = Carbon::now('Asia/HoChi_Minh');
        $data['updated_at'] = Carbon::now('Asia/HoChi_Minh');
        return ProductCategory::create($data);
    }

    public function findProductCategory($id)
    {
        return ProductCategory::find($id);
    }

    public function updateProductCategory($id, array $data)
    {
        $data['updated_by'] = Auth::id(); //$request->user()->id;
        $data['updated_at'] = Carbon::now('Asia/HoChi_Minh');
        
        return ProductCategory::find($id)->update($data);
    }

    public function destroyProductCategory($id)
    {
        $productCategory_delete= ProductCategory::find($id);
        $productCategory_delete->delete();
    }
}