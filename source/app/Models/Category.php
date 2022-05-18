<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'desc', 'status', 'parent_id'
    ];

    public function subCategories() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class,'post_id','id');
    }
}
