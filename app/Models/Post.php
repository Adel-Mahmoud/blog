<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_title',
        'post_picture',
        'post_content',
        'post_category_id',
        'post_user_name',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'post_category_id');
    }
    
    public function comments ()
    {
        return $this->hasMany(Comment::class);
        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }
}
