<?php
namespace App\Repositories\Interfaces;
Interface ProductCategoryReponsitoryInterface{
    
    public function allProductCategory();
    public function storeProductCategory(array $data);
    public function findProductcategory($id);
    public function updateProductCategory($id, array $data); 
    public function destroyProductCategory($id);
}