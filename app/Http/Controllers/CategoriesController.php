<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Session;
use Alert;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch records in pagination so only 10 categories per page
        // To get all records you may use get() method
        $categories = Category::orderBy('created_at','desc')->latest()->paginate( 10 );
        $catsTrash = Category::onlyTrashed()->get();

        return view('admin.categories.index', compact('categories', 'catsTrash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $this->validate($request, [
        //     'category_name' => 'required|max:200',
        //     'category_slug' => 'required|alpha_dash|max:200|unique:categories,category_slug',
        // ]);

        $category = new Category;

        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;

        $category->save();

        if ($category->save()) {
            toastr()->success('!! Kategori berhasil dibuat !!');

            return redirect()->route('categories.index', $category->id);
        }

        toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');

        return back();

        // Session::flash('success', 'Category added.');

        // return redirect()->route('categories.show', $category->id)->with('success', 'Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail( $id );

        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail( $id );

        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        // $this->validate($request, [
        //     'category_name' => 'required|max:200',
            // 'category_slug' => 'unique:categories,category_slug,'.$id,
        // ]);

        // Instead of creating new Category Class initialization
        // We fetch the category to edit instead
        $category = Category::findOrFail( $id );

        $category->category_name = $request->input('category_name');
        $category->category_slug = $request->input('category_slug');

        $category->save();

        if ($category->save()) {
            toastr()->success('!! Kategori berhasil diedit !!');

            return redirect()->route('categories.index', $category->id);
        }

        toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');

        return back();


        // Session::flash('success', 'Category updated.');

        // return redirect()->route('categories.show', $id)->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail( $id );

        if ($category->delete()) {
            toastr()->info('!! Kategori berhasil dihapus !!');

            return redirect()->route('categories.index', $category->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');

        return back();
        }
    }

    public function trash()
    {
        $catsTrash = Category::onlyTrashed()->orderBy('updated_at','desc')->paginate(10);
        $categories = Category::get();
        // $trash = DB::table('cats')
        //             ->whereNotNull('deleted_at')
        //             ->paginate(10);

        return view('admin.categories.trash', compact('catsTrash','categories'));
    }

    public function restore($id)
    {
        $catsTrash = Category::onlyTrashed()->findOrFail($id);
        $cats = Category::paginate(10);

        if ($catsTrash->restore()) {
            toastr()->info('!! Artikel berhasil direstore !!');

            // return redirect()->route('cats.trash');
            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
        // return $trash;
    }

    public function forceDelete($id)
    {
        $catsTrash = Category::onlyTrashed()->where('id', $id);
        // dd($catsTrash);
        if ($catsTrash->forceDelete()) {
            toastr()->warning('Artikel berhasil dihapus secara permanen');
            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
