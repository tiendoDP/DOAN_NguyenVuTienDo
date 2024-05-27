<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Offset;
use App\Models\Comment;
use App\Models\ProductImage;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $filable = [
        'name',
        'description',
        'image',
        'category_id',
        'sex',
        'quantity',
        'price',
        'discount',
        'status',
    ];

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    static public function getRecord() {
        return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->orderBy('quantity', 'asc')
        ->get();
    }

    static public function newProducts() {
        return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->orderby('id', 'desc')
        ->limit(8)
        ->get();
    }

    static public function getProductById($id) {
        return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id', $id)
        ->get();
    }

    static public function getProductByCategory($category, $sex) {
        return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.category_id', $category)
        ->where('products.sex', $sex)
        ->limit(10)
        ->offset(0)
        ->get();
    }

    static public function getProductBySex($sex) {
        return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.sex', $sex)
        ->limit(10)
        ->offset(0)
        ->get();
    }

    static public function getProductByName($keyword) {
        if($keyword != null) return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.name', 'like', '%' . $keyword . '%')
        ->paginate(6);
        else return self::select('products.*', 'categories.name as category_name')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->paginate(6);
    }
    
}
