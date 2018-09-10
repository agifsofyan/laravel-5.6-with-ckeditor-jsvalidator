<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Session;
use DB;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch records in pagination so only 10 pages per page
        // To get all records you may use get() method
        $pages = Post::where('post_type', 'page')->paginate( 6 );

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Directly display `pages.create` view blade file
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and filter user inputted data
        // Refer to `References` for more info
        $this->validate($request, [
            'post_title'        => 'required',
            'post_slug'         => 'required|alpha_dash|max:200|unique:posts,post_slug',
            'post_content'      => 'required',
        ]);

        // Create a new Post Model initialization
        // There are many ways to coke an Egg and same in storing data to database in Laravel
        // You might use or prefer this one https://laravel.com/docs/5.4/queries#inserts
        // I just love using Eloquent
        $page = new Post;

        $page->author_ID        = $request->author_ID;
        $page->post_type        = $request->post_type;
        $page->post_title       = $request->post_title;
        $page->post_slug        = $request->post_slug;
        $page->post_content     = $request->post_content;

        $page->save();

        // Store data for only a single request and destory
        // Session::flash( 'sucess', 'Page published.' );

        // Redirect to `pages.show` route
        // Use route:list to view the `Action` or where this routes going to
        return redirect()->route('admins.show', $page->id)->with('success', 'Page published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Post::findOrFail( $id );

        return view('admin.pages.show', [ 'page' => $page ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Post::findOrFail( $id );

        return view('admin.pages.edit', [ 'page' => $page ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_title'        => 'required',
            'post_slug'         => 'required|alpha_dash|max:200|unique:posts,post_slug,'.$id,
            'post_content'      => 'required',
        ]);

        // You might prefer to use this one instead https://laravel.com/docs/5.4/queries#updates
        // You choose
        $page = Post::findOrFail($id);

        $page->author_ID        = $request->input('author_ID');
        $page->post_type        = $request->input('post_type');
        $page->post_title       = $request->input('post_title');
        $page->post_slug        = $request->input('post_slug');
        $page->post_content     = $request->input('post_content');

        $page->save();

        // Session::flash('success', 'Page updated.');

        return redirect()->route('admins.edit', $id)->with('success', 'Page updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve records and throw an exception if a model is not found
        $page = Post::findOrFail( $id );

        // https://laravel.com/docs/5.4/queries#deletes
        $page->delete();

        // Session::flash('success', 'Page deleted.');

        return redirect()->route('admins.index')->with('error', 'Page deleted');
    }


    /**
     * Front page
     */
    public function getIndex( Request $request ) {

        // Get query string
        $page_id    = $request->query('page_id');

        // If page_id is viewed use `pages.page.php` file to handle the display
        // otherwise use and display 404.blade.php file
        if( $page_id ) :

            $posts = \App\Post::where('id', $page_id)
                        ->where('post_type', 'page')
                        ->first()
                        ->paginate(4)
                        ;

            // Check if page exist
            if( $posts )
                return view('admin.pages.page', [ 'posts' => $posts ]);
            else
                return view('errors.404');

        // If none of the above is true, then display most recently added Blot posts
        else :

            $posts = DB::table('categories')
                ->join('posts', 'categories.id', '=', 'posts.category_ID')
                ->where('post_type', 'post')
                ->select('categories.*', 'posts.*')
                ->paginate(10);

            // It replaces the previous `index.blade.php` blade file that is now used in displaying lists of added pages
            return view('admin.pages.frontpage', [ 'posts' => $posts ]);

        endif;
    }
}
