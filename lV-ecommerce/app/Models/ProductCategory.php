<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductCategory extends Model
{
    public $timestamps = false;
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    protected $table ='product_categories';
    protected $fillable = ['title', 'slug', 'description','published','created_by', 'updated_by','updated_at','created_at'];
    
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
        /* Một ProductCategory(Thể loại sản phầm) có nhiều product(sản phẩm) thuộc danh mục đó liên kết với product bằng khóa 
    ngoại foreign key "category_id" và local key "id" với đk: field "published = 1" sắp xếp sản phẩm lấy ra theo ngày tạo giảm dần từ mới đến cũ */
    public function products() {
        return $this->hasMany(Product::class , 'category_id', 'id')->where('published', 1)->orderBy('created_at','DESC');
    }
    /* lấy ra sản phẩm cũ nhất hoặc mới nhất của danh mục chỉ định */
    public function newProduct() {
        return $this->hasOne(Product::class , 'category_id', 'id')->oldestOfMany();
    }
    
}
