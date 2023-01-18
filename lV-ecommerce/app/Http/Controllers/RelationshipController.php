<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\Order_detail;
class RelationshipController extends Controller
{
    public function product (){
        // $product = Product::find(1);
        $product_inventory = Product::find(4);
        dd($product_inventory->ProductInventory);
    }
    public function order (){
        $query = ProductCategory::where('slug', 'banhmi-ngon-khong2')->first();
        
        dd($query->products);
    }
}
