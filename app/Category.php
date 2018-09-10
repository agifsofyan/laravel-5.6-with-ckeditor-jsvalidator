<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['category_name', 'category_slug'];
    protected $dates = ['deleted_at'];

    public function callingPosts()
    {
        return $this->hasMany('App\Post');
    }

    // public function callingPages()
    // {
    //     return $this->hasMany('App\Page');
    // }
}
