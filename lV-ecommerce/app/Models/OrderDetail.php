<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id','unit_price','quantity','created_at','updated_at'];
    /*
     OrderDetais sẽ có mối quan hệ 1-n vs order
     orderDetais sẽ chỉ thuộc về một đơn hàng.
     */
    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
