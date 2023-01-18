<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Http\Requests\ProductRequest;
use App\Models\api\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
class ProductsRepository implements ProductsRepositoryInterface
{

    public function allProducts()
    {
        $perPage = request('per_page', 10);
        $search = request('search', '');
        $sortField = request('sort_field', 'created_at');
        $sortDirection = request('sort_direction', 'desc');
        // withTrashed() laays tất cả record đã xóa bằng softdelete
        $query = Product::query()
            ->where('title', 'like', "%{$search}%")
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage);
        return $query;
    }

    public function storeProducts(ProductRequest $productRequest)
    {
       $data = $productRequest->validated();
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['created_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $image = $data['image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {          
            $file = $productRequest->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;        
            $path =  $file->move('uploads/images/',$filename);
            $data['image'] =  $filename;
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $path->getSize();
        }
        
        return Product::create($data);
    }

    public function findProducts($id)
    {
        return Product::find($id);
    }

    public function updateProducts(Product $product,ProductRequest $productRequest)
    {
        $data = $productRequest->validated();
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $image = $data['image'] ?? null;
        // Check if image was given and save on local file system
        if ($image) {
            $file = $productRequest->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;        
            $path =  $file->move('uploads/images/',$filename);
            $data['image'] =  $filename;
            $data['image_mime'] = $image->getClientMimeType();
            $data['image_size'] = $path->getSize();       
            
            // xóa ảnh cũ nếu có
            $destination = 'uploads/images/' . $product->image;
            if (File::exists( $destination)) {
                File::delete( $destination);        
                }
    }
        return Product::find($product->id)->update($data);
    }

    public function destroyProducts($id)
    {
        $Product = Product::find($id);
        $Product->delete();
    }
}