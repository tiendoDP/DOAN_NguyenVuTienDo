<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'sub_category';
    public $timestamps = false;

    static public function getRecord() {
        return self::select('sub_category.*', 'users.name as created_by_name', 'category.name as category_name')
        ->join('category', 'sub_category.category_id', '=', 'category.id')
        ->join('users', 'category.create_by', '=', 'users.id')
        ->get();
    }
}
