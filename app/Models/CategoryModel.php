<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel as Product;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'created_by',
        'status',
    ];

    public function products() {
        return $this->hasMany(Product::class, 'category_id');
    }

    static public function getRecord() {
        return self::select('categories.*', 'users.name as create_by_name')
        ->join('users', 'categories.created_by', '=', 'users.id')
        ->get();
    }
}
