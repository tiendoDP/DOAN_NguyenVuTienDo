<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_color';
    protected $fillable = [
        'product_id',
        'color_id',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
