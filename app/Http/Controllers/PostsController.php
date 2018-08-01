<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Image;
use Session;
use File;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate( 10 );

        return view('admin.posts.index', ['posts' => $posts]);
    }
    // public function index()
    // {
    //     $posts = Post::where('post_type', 'post')->paginate( 10 );

    //     return view('admin.posts.index', ['posts' => $posts]);
    // }

    public function balanitis()
    {
        // Fetch data in pagination so only 10 posts per page
        // To get all data you may use get() method
        $posts = Post::where('post_type', 'post')->paginate( 10 );

        return view('diseases.balanitis.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Directly display `posts.create` view blade file
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Validate and filter user inputted data
        // Refer to `References` for more info
        // $this->validate($request, [
        //     'post_title'     => 'required',
        //     'post_slug'      => 'required|alpha_dash|max:200|unique:posts,post_slug',
        //     'post_content'   => 'required',
        //     'post_thumbnail' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        // ]);

        // Create a new Post Model initialization
        // There are many ways to coke an Egg and same in storing data to database in Laravel
        // You might use or prefer this one https://laravel.com/docs/5.4/queries#inserts
        // I just love using Eloquent
        $post = new Post;

        $post->author_ID        = $request->author_ID;
        $post->post_type        = $request->post_type;
        $post->post_title       = $request->post_title;
        $post->post_slug        = $request->post_slug;
        $post->post_content     = $request->post_content;
        $post->category_ID      = $request->category_ID;

        // Check if file is present
        if( $request->hasFile('post_thumbnail') ) {
            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = $post_thumbnail->getClientOriginalName();

            Image::make($post_thumbnail)->resize(600, 600)->save( public_path('uploads/' . $filename ) );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();

        // Store data for only a single request and destory
        // Session::flash( 'sucess', 'Post published.');

        // Redirect to `posts.show` route
        // Use route:list to view the `Action` or where this routes going to
        return redirect()->route('posts.show', $post->id)->with('success', 'Post published');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail( $id );

        return view('admin.posts.show', [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail( $id );

        return view('admin.posts.edit', [ 'post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUdateRequest $request, $id)
    {
        // $this->validate($request, [
        //     'post_title'        => 'required',
            // 'post_slug'         => 'unique:posts,post_slug,'.$id,
        //     'post_content'      => 'required',
        //     'post_thumbnail'    => 'mimes:jpeg,png,bmp,tiff|max:4096',
        // ]);

        // You might prefer to use this one instead https://laravel.com/docs/5.4/queries#updates
        // You choose
        $post = Post::findOrFail($id);

        $post->author_ID        = $request->input('author_ID');
        $post->post_type        = $request->input('post_type');
        $post->post_title       = $request->input('post_title');
        $post->post_slug        = $request->input('post_slug');
        $post->post_content     = $request->input('post_content');
        $post->category_ID      = $request->input('category_ID');

        // Check if file is present
        if( $request->hasFile('post_thumbnail') ) {
            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = 'update.' . $post_thumbnail->getClientOriginalName();

            Image::make($post_thumbnail)->resize(600, 600)->save( public_path('/uploads/' . $filename ) );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
            $file = public_path('uploads/' . $post->post_thumbnail );
            // Do some checking here

            if (File::exists($file)) {
                unlink($file);
            }
        }

        $post->save();

        // Session::flash('success', 'Post updated.');

        return redirect()->route('posts.edit', $id)->with('success', 'Post updated');;
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
        $post = Post::findOrFail( $id );

        // https://laravel.com/docs/5.4/queries#deletes
        $post->delete();

        Session::flash('error', 'Post deleted');

        return redirect()->route('posts.index');
    }
}
