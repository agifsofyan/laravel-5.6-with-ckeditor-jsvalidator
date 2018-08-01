<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class SearchesController extends Controller
{
    public function getAIndex( Request $request ) {
		$sa = $request->query('sa');

		// Query and paginate result
		// $posts = Post::where('post_title', 'like', "%$sa%")
		// 		->orWhere('post_content', 'like', "%$sa%")
		// 		->paginate(6);

		$posts = DB::table('categories')
                ->join('posts', 'categories.id', '=', 'posts.category_ID')
                ->where('post_title', 'like', "%$sa%")
                ->orWhere('post_content', 'like', "%$sa%")
                ->select('categories.*', 'posts.*')
                ->paginate(10);

		return view('admin.searches.index', ['posts' => $posts, 'sa' => $sa ]);
    }

    public function getUIndex( Request $request) {
		$su = $request->query('su');

		// Query and paginate result
		// $posts = Post::where('post_title', 'like', "%$su%")
		// 		->orWhere('post_content', 'like', "%$su%")
		// 		->paginate(6);

		$posts = DB::table('categories')
                ->join('posts', 'categories.id', '=', 'posts.category_ID')
                ->where('post_title', 'like', "%$su%")
                ->orWhere('post_content', 'like', "%$su%")
                ->select('categories.*', 'posts.*')
                ->paginate(10);

		return view('searches.index', ['posts' => $posts, 'su' => $su ]);
	}
}
