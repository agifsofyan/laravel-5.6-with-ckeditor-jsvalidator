<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reservation;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        // $this->validate($request, [
        //     'name'      => 'required',
        //     'age'       => 'required|numeric|min:01|max:99|',
        //     'address'   => 'required',
        //     'phone'     => 'required|numeric|min:00000000001|max:9999999999999|',
        //     'complaint' => 'required',
        // ]);

        $reser = new Reservation;

        $reser->name      = $request->name;
        $reser->age       = $request->age;
        $reser->address   = $request->address;
        $reser->phone     = $request->phone;
        $reser->complaint = $request->complaint;

        $reser->save();

        if ($reser->save()) {
            toastr()->success('Data has been saved successfully!');

            return redirect()->route('reservations.show', $reser->id);
        }

        toastr()->error('An error has occurred please try again later.');

        return back();

        // return redirect()->route('reservations.show', $reser->id)->with('success', 'Your Reservation created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reser = Reservation::findOrFail( $id );

        return view('pages.index', [ 'reser' => $reser ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
