<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'category_id', 'status', 'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
