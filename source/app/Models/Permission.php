<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name','desc',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }
}
