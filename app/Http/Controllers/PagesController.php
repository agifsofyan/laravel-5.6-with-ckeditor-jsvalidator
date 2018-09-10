<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;
use App\Reservation;
use Image;
use Session;
use File;
use DB;
use Alert;
// use Validator;

class PagesController extends Controller
{
    public function index()
    {
        // Fetch records in pagination so only 10 pages per page
        // To get all records you may use get() method
        $pages = Page::orderBy('created_at','desc')->latest()->paginate(10);
        $pagesTrash = Page::onlyTrashed()->get();
        return view('admin.pages.index', compact('pages', 'pagesTrash'));
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

        if ($page->save()) {
            toastr()->success('!! Halaman berhasil dibuat !!');

            return redirect()->route('pages.index', $page->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }

        // return redirect()->route('pages.show', $page->id)->with('success', 'Page created successfully!');
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

        if ($page->save()) {
            toastr()->success('!! Halaman berhasil diedit !!');

            return redirect()->route('pages.index', $page->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }

        // Session::flash('success', 'Page updated.');

        // return redirect()->route('pages.index', $page->id)->with('success', 'Page updated successfully!');
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
        // $page->delete();

        if ($page->delete()) {
            toastr()->info('!! Halaman berhasil dihapus !!');

            return redirect()->route('pages.index', $page->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }

        // Session::flash('success', 'Page deleted.');

        // return redirect()->route('pages.index')->with('error', 'Page deleted successfully!');
    }

    public function trash()
    {
        $pagesTrash = Page::onlyTrashed()->orderBy('updated_at','desc')->paginate(10);
        $pages = Page::get();
        // $trash = DB::table('posts')
        //             ->whereNotNull('deleted_at')
        //             ->paginate(10);

        return view('admin.pages.trash', compact('pagesTrash','pages'));
    }

    public function restore($id)
    {
        $pagesTrash = Page::onlyTrashed()->findOrFail($id);
        $page = Page::paginate(10);

        if ($pagesTrash->restore()) {
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
        $pagesTrash = Page::onlyTrashed()->where('id', $id);
        // dd($postsTrash);
        if ($pagesTrash->forceDelete()) {
            toastr()->warning('Artikel berhasil dihapus secara permanen');
            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
