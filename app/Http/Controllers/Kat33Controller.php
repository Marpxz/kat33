<?php

namespace Kat33\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kat33\Kat33;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Kat33Controller extends Controller
{
    public function index()
    {

        $kat33s = Kat33::where('business_id','=',Auth::user()->business_id)->paginate(10);
        return view('kat33s.index',compact('kat33s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kat33s.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'imei' => 'required|unique:kat33s|integer',
        ]);

        $kat33 = new Kat33([
            'imei' => $request->get('imei'),
            'business_id' => Auth::user()->business_id,
        ]);

        $kat33->save();
        Session::flash('message', 'agregar');
        return redirect('/kat33s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat33 = Kat33::find($id);
        $kat33->delete();
        Session::flash('message','eliminar');
        return Redirect::to('kat33s');


    }
}
