<?php
namespace App\Repositories\Interfaces;
Interface ProductInventoryReponsitoryInterface{
    
    public function allProductInventory();
    public function storeProductInventory(array $data);
    public function findProductInventory($id);
    public function updateProductInventory($id, array $data); 
    public function destroyProductInventory($id);
}