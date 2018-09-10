<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';
    protected $fillable = ['title', 'slug', 'post_content', 'status'];
    protected $dates = ['deleted_at'];

    // public function callingCategory()
    // {
    //     return $this->belongsTo('App\Category', 'category_id');
    // }
}
