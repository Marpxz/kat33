<?php

namespace Kat33\Http\Controllers;

use Illuminate\Http\Request;
use Kat33\Kat33;
use Illuminate\Support\Facades\Session;
use Kat33\Business;
use Illuminate\Support\Facades\Redirect;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::paginate(10);
        return view('businesses.index',compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
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
            'name' => 'required|unique:businesses|max:20',
        ]);

        $business = new Business([
            'name' => $request->get('name'),
        ]);

        $business->save();
        Session::flash('message', 'agregar');
        return redirect('/businesses');
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
        $business = Business::find($id);
        return view('businesses.edit', compact('business'));
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
            'name' => 'required|unique:businesses|max:20',
        ]);

        $business = Business::find($id);
        $business->name = $request->name;
        $business->save();
        Session::flash('message', 'editar');
        return Redirect::to('businesses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::find($id);
        $business->delete();
        Session::flash('message','eliminar');
        return Redirect::to('businesses');


    }
}
