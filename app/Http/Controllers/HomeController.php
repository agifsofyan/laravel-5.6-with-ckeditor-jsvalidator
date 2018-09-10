<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reservation;
use App\Page;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        return view('pages.index');
    }

    // For Get Single Page
    public function getPage( $slug) {
        $page = Page::where('slug', $slug)->get();

    	return view('pages.parallax', ['page' => $page]);
    }

    // for Home User
    public function getHome( Request $request ) {

        $posts = \App\Post::where('post_type', 'post')
                 ->get();

            // It replaces the previous `index.blade.php` blade file that is now used in displaying lists of added pages
        return view('pages.index', [ 'posts' => $posts ]);
    }

    public function save_data(SiteRequest $request)
    {
        $reserv = Reservation::create($request->all());

        $reserv->save();

        if ($reserv->save()) {
            toastr()->success(' Data berhasil dikirim');

            return back();
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
