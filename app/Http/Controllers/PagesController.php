<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;
use Image;
use Session;
use File;
// use Validator;

class PagesController extends Controller
{
    public function index()
    {
        // Fetch records in pagination so only 10 pages per page
        // To get all records you may use get() method
        $pages = Page::paginate( 6 );

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
    public function store(PageRequest $request)
    {
        // Validate and filter user inputted data
        // Refer to `References` for more info
        // $this->validate($request, [
        //     'title'        => 'required',
        //     'slug'         => 'required|alpha_dash|max:200|unique:pages,slug',
        //     'content'      => 'required',
        //     'status'       => 'required',
        // ]);

        $page = new Page;

        $page->slug        = $request->slug;
        $page->title       = $request->title;
        $page->content     = $request->content;
        $page->status      = $request->status;


        $page->save();

        // Store data for only a single request and destory
        // Session::flash( 'sucess', 'Page created.' );

        // Redirect to `pages.show` route
        // Use route:list to view the `Action` or where this routes going to
        // return redirect()->route('pages.show', $page->id);
        return redirect()->route('pages.show', $page->id)->with('success', 'Page created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::findOrFail( $id );

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
        $page = Page::findOrFail( $id );

        return view('admin.pages.edit', [ 'page' => $page ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        // $this->validate($request, [
        //     'title'        => 'required',
            // 'slug'         => 'unique:pages,slug,'.$id,
        //     'content'      => 'required',
        //     'status'       => 'required',
        // ]);

        // You might prefer to use this one instead https://laravel.com/docs/5.4/queries#updates
        // You choose
        $page = Page::findOrFail($id);
        $page->slug        = $request->input('slug');
        $page->title       = $request->input('title');
        $page->content     = $request->input('content');
        $page->status      = $request->input('status');

        $page->save();

        // Session::flash('success', 'Page updated.');

        return redirect()->route('pages.index', $page->id)->with('success', 'Page updated successfully!');
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
        $page = Page::findOrFail( $id );

        // https://laravel.com/docs/5.4/queries#deletes
        $page->delete();

        // Session::flash('success', 'Page deleted.');

        return redirect()->route('pages.index')->with('error', 'Page deleted successfully!');
    }


    // For Get Single Page
    public function getPage( $slug) {
        $page = Page::where('slug', $slug)->get();

    	return view('pages.page', ['page' => $page]);
    }

    // for Home User
    public function getHome( Request $request ) {

        $posts = \App\Post::where('post_type', 'post')
                 ->get();

            // It replaces the previous `index.blade.php` blade file that is now used in displaying lists of added pages
        return view('pages.index', [ 'posts' => $posts ]);
    }
}
