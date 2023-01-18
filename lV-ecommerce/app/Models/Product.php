<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product_category;
class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    protected $table ='products';
    protected $fillable = ['title','slug', 'description', 'price', 'image', 'published', 'category_id', 'inventory_id','image_mime', 'image_size', 'created_by', 'updated_by','created_at','updated_at','deleted_at','deleted_by'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /* Một product sẽ thuộc về một kho sản phẩm */
    public function productInventory() 
    {
        return $this->belongsTo(Product_inventory::class, 'inventory_id', 'id');
    }
    /* Một product sẽ thuộc về một thể loại sản phẩm */
    public function productCategory() 
    {
        return $this->belongsTo(Product_category::class, 'category_id', 'id');
    }
}
