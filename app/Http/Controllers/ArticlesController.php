<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DB;

class ArticlesController extends Controller
{
    /**
	 * Display articles
	 */
    public function getIndex() {
    	$posts = Category::get();

    	return view('userArticle.index', ['posts' => $posts]);
    }

    /**
     * Display single article
     *
     * $post_slug STRING Article slug
     */
    public function getSingle( $category_slug ) {
    	// $post = Post::where('post_slug', '=', $post_slug)->first();

        // return view('userArticle.singleTwo', ['post' => $post]);

        // $posts = Post::where('post_type', 'post')
    	// 		->orderBy('created_at', 'desc')
        //         ->paginate( 6 );

        $posts = DB::table('categories')
                ->join('posts', 'categories.id', '=', 'posts.category_ID')
                ->where('category_slug', $category_slug)
                ->select('categories.*', 'posts.*')
                ->paginate(10);

    	return view('articles.index', ['posts' => $posts]);
    }

    public function getSingleTwo( $category_slug, $post_slug ) {
    	$posts = DB::table('categories')
                ->join('posts', 'categories.id', '=', 'posts.category_ID')
                ->where('category_slug', $category_slug)
                ->Where('post_slug', $post_slug)
                ->select('categories.*', 'posts.*')
                ->paginate(10);

    	return view('articles.single', ['posts' => $posts]);
    }
}
