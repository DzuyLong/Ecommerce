<?php
namespace App\Repositories\Interfaces;
use App\Http\Requests\ProductRequest;
use App\Models\Api\Product;
Interface ProductsRepositoryInterface{
    
    public function allProducts();
    public function storeProducts(ProductRequest $productRequest);
    public function findProducts($id);
    public function updateProducts(Product $product, ProductRequest $request); 
    public function destroyProducts($id);
}