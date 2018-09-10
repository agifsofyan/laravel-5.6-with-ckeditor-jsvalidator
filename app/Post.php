<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['post_content', 'post_title', 'post_slug', 'post_type'];
    protected $dates = ['deleted_at'];

    public function callingCategory()
    {
        return $this->belongsTo('App\Category', 'category_ID');
    }
}
