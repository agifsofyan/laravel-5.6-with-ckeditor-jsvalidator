<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
// use Session;

class DiseasesController extends Controller
{
    /**
	 * Display articles
	 */
    // public function getIndex() {
    // 	$posts = Post::paginate( 5 );

    // 	return view('articles.index', ['posts' => $posts]);
    // }

    public function getIndex( $id) {
        $posts = Post::where('category_ID', '=', $id)->paginate( 5 );

    	return view('articles.index', ['posts' => $posts]);
    }

    public function getSingle( $category_ID, $id ) {
        // $posts = Post::where('post_slug', '=', $post_slug)->first();

        $posts = Post::where('category_ID', '=', $category_ID)
                     ->where('id', '=', $id)->get();

    	return view('articles.single', ['posts' => $posts]);
    }
}
