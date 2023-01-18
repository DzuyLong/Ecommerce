<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['customer_id', 'order_date','customer_address','customer_phone', 'customer_name','purchanse_total','payment_id','status','created_at','updated_at'];

 /* Một Order (đơn hàng) có nhiều orderDetails(Chi tiết đơn hàng)
 Vd: Đơn hàng có id: 1005 có thể có order_id: 1005, product_id:1009 - order_id: 1005, product_id: 1008... */
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class , 'order_id', 'id');
    }
}

