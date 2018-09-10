<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use Image;
use Session;
use File;
use DB;
use Alert;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::find(1);
        // $posts->delete();

        // $posts = DB::table('categories')
        //         ->join('posts', 'categories.id', '=', 'posts.category_ID')
        //         ->select('categories.*', 'posts.*')
        //         ->orderBy('posts.created_at','desc')
        //         ->paginate(10);

        $posts = Post::latest()->get();
        $postsTrash = Post::onlyTrashed()->get();

        return view('admin.posts.index', compact('posts', 'postsTrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Directly display `posts.create` view blade file
        $catNow = Category::orderBy('category_name','asc')->latest()->get();

        return view('admin.posts.create', compact('catNow'));
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

            $path               = 'uploads/' . $filename;   // direktori gambar dengan nama uploads

            Image::make($post_thumbnail)->resize(600, 600)->save( $path );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();

        if ($post->save()) {
            toastr()->success('!! Artikel berhasil di buat !!');

            return redirect()->route('posts.index', $post->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }

        // return redirect()->route('posts.show', $post->id)->with('success', 'Post published');
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
            $filename           = time().'.'.$post_thumbnail->getClientOriginalName();


            $path               = 'uploads/' . $filename;   // direktori gambar dengan nama uploads

            Image::make($post_thumbnail)->resize(600, 600)->save( $path );

            // Set post-thumbnail url
            $post->post_thumbnail = $filename;
        }

        $post->save();

        if ($post->save()) {
            toastr()->success('!! Artikel berhasil diedit !!');

            return redirect()->route('posts.index', $post->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }

        // return redirect()->route('posts.edit', $id)->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail( $id );

        // $post->delete();

        // Session::flash('warning', 'Post deleted');

        // return redirect()->route('posts.index');

        if ($post->delete()) {
            toastr()->info('!! Artikel berhasil dihapus !!');

            return redirect()->route('posts.index', $post->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }

    public function trash()
    {
        $postsTrash = Post::onlyTrashed()->orderBy('updated_at','desc')->paginate(10);
        $posts = Post::get();
        // $trash = DB::table('posts')
        //             ->whereNotNull('deleted_at')
        //             ->paginate(10);

        return view('admin.posts.trash', compact('postsTrash','posts'));
    }

    public function restore($id)
    {
        $postsTrash = Post::onlyTrashed()->findOrFail($id);
        $posts = Post::paginate(10);

        if ($postsTrash->restore()) {
            toastr()->info('!! Artikel berhasil direstore !!');

            // return redirect()->route('posts.trash');
            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
        // return $trash;
    }

    public function forceDelete($id)
    {
        $postsTrash = Post::onlyTrashed()->where('id', $id);
        // dd($postsTrash);
        if ($postsTrash->forceDelete()) {
            toastr()->warning('Artikel berhasil dihapus secara permanen');
            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
