<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'rep_comment', 'name', 'content', 'post_id', 'status'
    ];

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
}
