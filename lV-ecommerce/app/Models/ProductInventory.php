<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductInventory extends Model
{
    public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    protected $table ='product_inventories';
    protected $fillable = ['quantity','published','updated_by','created_at','updated_at','deleted_at','deleted_by'];

    /* Một ProductInventory(Kho sản phẩm) có một product(sản phẩm) thuộc kho sản phẩm đó liên kết với product bằng khóa 
    ngoại foreign key "inventory_id" và local key "id" */
    public function product(){
        return $this->hasOne(Product::class, 'inventory_id', 'id');
    }
}
