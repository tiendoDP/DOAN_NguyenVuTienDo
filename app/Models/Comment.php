<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ProductModel;
use App\Models\CommentImage;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'rating', 'user_id', 'product_id'];

    public function images()
    {
        return $this->hasMany(CommentImage::class, 'comment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}
