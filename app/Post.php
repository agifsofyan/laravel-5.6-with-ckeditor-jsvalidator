<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['post_content', 'post_title', 'post_slug', 'post_type'];

    public function callingCategory()
    {
        return $this->belongsTo('App\Category', 'category_ID');
    }
}
